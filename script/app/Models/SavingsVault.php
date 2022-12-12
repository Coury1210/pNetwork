<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SavingsVault extends Model
{
    protected $fillable = ['user_id', 'amount', 'savings_product_id', 'status'];

    public function savingsProduct() {
        return $this->belongsTo(SavingsProduct::class);
    }

    public function getExpiresOnAttribute() 
    {
        $freq = $this->savingsProduct->frequency;
        $duration = $this->savingsProduct->duration;

        if ($freq == 'days') {
            return Carbon::parse($this->created_at)->addDays($duration)->format('Y-m-d');
        }

        if ($freq == 'months') {
            return Carbon::parse($this->created_at)->addMonths($duration)->format('Y-m-d');
        }

        if ($freq = 'years') {
            return Carbon::parse($this->created_at)->addYears($duration)->format('Y-m-d');
        }
    }

    public function getDaysBeforeExpiryAttribute() {
        $expiry_date = Carbon::parse($this->expires_on);
        $days = $expiry_date->isPast() ? 0 : $expiry_date->diffInDays();
        return $days;
    }

    public function getStatusAttribute($status) {
        return ucfirst($status);
    }
}
