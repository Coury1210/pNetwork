<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = ['user_id', 'comment_id', 'content'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(CommentsReply::class, 'comment_id', 'id');
    }

    public function getOwnCommentAttribute()
    {
        return (auth()->user()->id == $this->user_id);
    }
}
