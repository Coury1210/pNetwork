<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'quantity', 'color', 'weight', 'units', 'seller_id', 'price'];



    public function setAvailableAttribute($value)
    {
        $this->attributes['available'] = ($value == true) ? 1 : 0;
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
