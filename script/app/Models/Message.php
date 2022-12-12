<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'content', 'read_at'];

    public $timestamps = true;

    public function sender() {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getReadAttribute($value) {
        return $value == 0 ? false : true;
    }

    public function getReadAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
    
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
