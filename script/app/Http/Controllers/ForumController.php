<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{


    public function view()
    {
        return view('addForum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $file = $request->file('image');
        $filepath = null;
		if (isset($file)) {
			$curentdate = Carbon::now()->toDateString();
			$imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


			$path = 'uploads/';
            ini_set("max_execution_time",6000);
            ini_set("max_input_time",5000);
            ini_set("upload_max_filesize","20M");
            ini_set("post_max_size","80M");
			$file->move($path, $imagename);

            $filepath = 'uploads/'.$imagename;
		}

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'thumbnail' => $filepath
        ];

        Forum::create($data);
        DB::commit();

        request()->session()->flash('return_msg', 'Your forum has been added');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit($forumId)
    {
        $forum = Forum::findOrFail($forumId);
        $categories = ForumCategory::get();
        return view('editForum', compact('forum', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $forumId)
    {
        DB::beginTransaction();

        $forum = Forum::findOrFail($forumId);

        $file = $request->file('image');
        $filepath = null;
		if (isset($file)) {
			$curentdate = Carbon::now()->toDateString();
			$imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


			$path = 'uploads/';
            ini_set("max_execution_time",6000);
            ini_set("max_input_time",5000);
            ini_set("upload_max_filesize","20M");
            ini_set("post_max_size","80M");
			$file->move($path, $imagename);

            $filepath = 'uploads/'.$imagename;
		}

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'thumbnail' => $filepath
        ];
        $forum->update($data);
        DB::commit();

        request()->session()->flash('return_msg', 'Your forum has been updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy($forumId)
    {
        DB::beginTransaction();

        $forum = Forum::findOrFail($forumId);
        $forum->delete();

        DB::commit();
        return redirect()->route('posts.index');
    }
}
