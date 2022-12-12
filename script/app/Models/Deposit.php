<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['amount', 'btc_address', 'paypal_email', 'method', 'user_id', 'txn_id'];
}
