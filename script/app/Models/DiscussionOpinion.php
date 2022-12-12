<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DiscussionOpinion extends Model
{
    protected $fillable = ['user_id', 'discussion_id', 'message'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
