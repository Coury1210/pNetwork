<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'content', 'thumbnail', 'audio'];


    public function comments()
    {
        return $this->hasMany(PostComment::class)->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getOwnPostAttribute()
    {
        return (auth()->user()->id == $this->user->id);
    }
}
