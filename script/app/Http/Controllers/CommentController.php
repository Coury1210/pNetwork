<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Models\DiscussionOpinion;
use App\Models\ForumDiscussion;
use App\Models\Post;
use App\Models\PostComment;
use App\Video;
use Auth;

class CommentController extends Controller
{
	public function store(Request $request)
	{

		$video = $video = Video::with('user')->where('id', $request->video_id)->first();
		$comment = new Comment();
		$comment->user_id = Auth::User()->id;
		$comment->video_id = $request->video_id;
		if ($request->parent_id != null) {
			$comment->parent_id = $request->parent_id;
		}
		if ($request->mention_id != null) {
			$comment->mention_id = $request->mention_id;
		}
		$comment->message = $request->comment;
		$comment->save();
		return view('comment', compact('video'));
	}

	public function reply(Request $request, $comment_id)
	{
		$comment = PostComment::findOrFail($comment_id);
		$comment->replies()->create(
			[
				'user_id' => auth()->user()->id,
				'comment_id' => $comment_id,
				'content' => $request->content
			]
		);
		request()->session()->flash('return_msg', 'You replied to the comment');
		return back();
	}

	public function postComment(Request $request, $post_id)
	{
		$post = Post::findOrFail($post_id);
		$post->comments()->create(
			[
				'user_id' => auth()->user()->id,
				'content' => $request->content
			]
		);
		request()->session()->flash('return_msg', 'Your comment has been added');
		return redirect()->route('post.single.view', $post_id);
	}

	public function forumTopicComment(Request $request, $topic_id)
	{
		$topic = ForumDiscussion::findOrFail($topic_id);
		DiscussionOpinion::create(
			[
				'user_id' => auth()->user()->id,
				'discussion_id' => $topic->id,
				'message' => $request->message
			]
		);
		request()->session()->flash('return_msg', 'Your opinion has been added');
		return redirect()->back();
	}
}
