<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Video;
use App\Comment;
use App\Models\Post;
use App\Models\PostComment;
use App\Notification;
use App\Traits\HelperTrait;

class LikeController extends Controller
{
    use HelperTrait;

    public function like(Request $request)
    {
    	$video = Video::find($request->id);
    	$user = Auth::User();
    	$isFavourite = $user->favourite_videos()->where('video_id',$request->id)->count();

    	if($isFavourite == 0)
    	{
    		$user->favourite_videos()->attach($video);
            $link = 'video/'.$video->slug;

            $this->saveNotification($video->user_id, 'Liked Your Video', $link);

    		return "like";
    	}else{
    		$user->favourite_videos()->detach($video);
    		return "dislike";
    	}
    }

    public function comment_like(Request $request)
    {
        $comment = Comment::find($request->id);
        $user = Auth::User();
        $isFavourite = $user->favourite_comments()->where('comment_id',$request->id)->count();

        if($isFavourite == 0)
        {
            $user->favourite_comments()->attach($comment);
            return $comment->favourite_to_user->count();
        }else{
            $user->favourite_comments()->detach($comment);
            return $comment->favourite_to_user->count();
        }
    }

    public function post_like(Request $request)
    {
        $post = Post::find($request->id);

        $post->likes = $post->likes +1;
        $post->save();

        Notification::create(
            [
                'user_id' => auth()->user()->id, 
                'parent_id' => $post->user_id, 
                'body' => 'Liked your post', 
                'link' => route('post.single.view', $post->id) 
            ]
        );

        return $post->likes;
    }

    public function video_like(Request $request)
    {
    	$video = Video::findOrFail($request->id);
		$video->likes = $video->likes + 1;
		$video->save();

		return $video->likes;
    }

    public function post_comment_like(Request $request)
    {
        $comment = PostComment::find($request->id);

        $comment->likes = $comment->likes +1;
        $comment->save();

        Notification::create(
            [
                'user_id' => auth()->user()->id, 
                'parent_id' => $comment->user_id, 
                'body' => 'Liked your comment', 
                'link' => route('post.single.view', $comment->post_id) 
            ]
        );
        return $comment->likes;
    }
}
