<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CommentsReply extends Model
{
    protected $fillable = ['user_id', 'comment_id', 'content'];


    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
