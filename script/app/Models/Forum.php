<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'user_id', 'thumbnail'];
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function discussions()
    {
        return $this->hasMany(ForumDiscussion::class, 'forum_id');
    }

    public function getOwnForumAttribute()
    {
        return (auth()->user()->id == $this->user_id);
    }
}
