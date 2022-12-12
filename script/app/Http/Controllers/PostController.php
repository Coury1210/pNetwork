<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Product;
use App\Notification;
use App\Option;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $products = Product::get();
        $forums = Forum::get();
        $settings =  Option::where('key', 'currency')->first();

        $currency = json_decode($settings->value)->code;

        return view('posts', compact('posts', 'products', 'currency', 'forums'));
    }

    // public function update($post_id)
    // {
    //     $posts = Post::get();
    // 	return view('posts', compact('posts'));
    // }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $image_file = $request->file('image_upload');
        $audio_file = $request->file('audio_upload');
        $audio_uploaded = isset($audio_file);
        $file = $audio_uploaded ? $audio_file : $image_file;

        $mediapath = null;
        if (isset($file)) {
            $curentdate = Carbon::now()->toDateString();
            $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

            $path = 'uploads/';

            $file->move($path, $imagename);

            $mediapath = $path . $imagename;
        }

        $post = Post::create(
            [
                'content' => $request->content,
                'user_id' => auth()->user()->id,
                'thumbnail' => $audio_uploaded ? null : $mediapath,
                'audio' => $audio_uploaded ? $mediapath : null
            ]
        );
        //send notification to followers
        foreach (User::findOrFail(auth()->user()->id)->followers as $follower) {
            Notification::create(
                [
                    'user_id' => $follower->id,
                    'parent_id' => auth()->user()->id,
                    'body' => auth()->user()->username . ' added a new post',
                    'link' =>  route('post.single', $post->refresh()->slug)
                ]
            );
        }

        DB::commit();

        $request->session()->flash('return_msg', 'Your post has been added');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post = Post::findOrFail($postId);
        return view('editPost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int   $postId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {
        DB::beginTransaction();
        $post = Post::findOrFail($postId);

        $file = $request->file('image');
        $filepath = null;
        if (isset($file)) {
            $curentdate = Carbon::now()->toDateString();
            $imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


            $path = 'uploads/';
            ini_set("max_execution_time", 6000);
            ini_set("max_input_time", 5000);
            ini_set("upload_max_filesize", "20M");
            ini_set("post_max_size", "80M");
            $file->move($path, $imagename);

            $filepath = 'uploads/' . $imagename;
        }

        $data = [
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'thumbnail' => $filepath ? $filepath : $post->thumbnail
        ];
        $post->update($data);

        DB::commit();
        $request->session()->flash('return_msg', 'Your post has been updated');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function destroy($postId)
    {
        DB::beginTransaction();

        $post = Post::findOrFail($postId);
        $post->delete();

        DB::commiy();
        return redirect()->route('posts.index');
    }

    public function singleView($post_id)
    {
        $post = Post::findOrFail($post_id);
        return view('singlePost', compact('post'));
    }
}
