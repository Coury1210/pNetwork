<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'parent_id', 'link', 'body'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
