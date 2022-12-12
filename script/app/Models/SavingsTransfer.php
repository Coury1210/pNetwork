<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsTransfer extends Model
{
    protected $fillable = ['user_id', 'receiver_id', 'amount', 'tx_id', 'reason'];
}
