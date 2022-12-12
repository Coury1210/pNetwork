<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ForumDiscussion extends Model
{
    protected $fillable = ['forum_id', 'topic', 'description', 'user_id'];
    public function opinions()
    {
        return $this->hasMany(DiscussionOpinion::class, 'discussion_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getIsOwnerAttribute()
    {
        return auth()->user()->id == $this->user->id;
    }
}
