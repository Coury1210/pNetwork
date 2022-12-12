<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsProduct extends Model
{
    protected $fillable = ['name', 'min_savings_amount', 'max_savings_amount', 'annual_rate', 'duration', 'interval'];

    public $timestamps = false;
    //
}
