<?php

namespace App\Http\Controllers;

use App\Models\ForumDiscussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumDiscussionController extends Controller
{
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
    public function create($forumId)
    {
        return view('forumDiscussion', compact('forumId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $forumId)
    {
        DB::beginTransaction();
        $data = [
            'forum_id' => $forumId,
            'topic' => $request->topic,
            'description' => $request->description,
            'user_id' => auth()->user()->id
        ];
        ForumDiscussion::create($data);
        DB::commit();
        return $this->show($forumId);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $forumId
     * @return \Illuminate\Http\Response
     */
    public function show($forumId)
    {
        $discussions = ForumDiscussion::whereForumId($forumId)->get();
        return view('forumDiscussions', compact('discussions', 'forumId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $discussionId
     * @return \Illuminate\Http\Response
     */
    public function edit($forumId, $discussionId)
    {
        $discussion = ForumDiscussion::findOrFail($discussionId);
        return view('editForumDiscussion', compact('forumId', 'discussion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $discussionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $forumId, $discussionId)
    {
        DB::beginTransaction();

        $discussion = ForumDiscussion::findOrFail($discussionId);
        $discussion->update($request->all());
        DB::commit();
        request()->session()->flash('return_msg', 'Your discussion has been updated');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int       $discussionId
     * @return \Illuminate\Http\Response
     */
    public function destroy($discussionId)
    {
        $discussion = ForumDiscussion::findOrFail($discussionId);
        $discussion->delete();
        request()->session()->flash('return_msg', 'Your discussion has been deleted');
        return back();
    }
}
