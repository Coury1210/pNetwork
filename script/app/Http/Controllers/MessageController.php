<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Notification;
use App\Option;

class MessageController extends Controller
{
    public function store(Request $request, $user_id)
    {

        $receiver = User::findOrFail($user_id);

        return view('message', compact('receiver'));
    }

    public function send(Request $request, $receiver_id)
    {
        Message::create(['receiver_id' => $receiver_id, 'content' => $request->message, 'sender_id' => auth()->user()->id]);
        Notification::create(
            [
                'user_id' => auth()->user()->id,
                'parent_id' => $receiver_id,
                'body' => 'Sent you a new message',
                'link' => route('inbox')
            ]
        );
        return back();
    }

    public function inbox(Request $request)
    {
        $messages = Message::whereReceiverId(auth()->user()->id)->get();
        $outbox = Message::whereSenderId(auth()->user()->id)->get();
        return view('inbox', compact('messages', 'outbox'));
    }

    public function read($msg_id)
    {
        $msg = Message::findOrFail($msg_id);
        $msg->read_at = now();
        $msg->read = 1;
        return back();
    }
}
