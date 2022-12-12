<?php

namespace App;

use App\Models\Deposit;
use App\Models\SavingsProduct;
use App\Models\SavingsTransfer;
use App\Models\SavingsVault;
use App\Models\SavingsWithdraw;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Option;

class User extends Authenticatable implements MustVerifyEmail
{
    use Followable;

    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','first_name','last_name','slug','country','value','username','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function favourite_videos()
    {
        return $this->belongsToMany('App\Video')->withTimestamps();
    }
    
    public function favourite_comments()
    {
        return $this->belongsToMany('App\Comment')->withTimestamps();
    }

    public function block_users()
    {
        return $this->belongsToMany('App\User','block_user','user_id','block_id');
    }

    public function sendEmailVerificationNotification()
    {
        $option = Option::where('key','user_value')->first();
        $user_value = json_decode($option->value);
        if($user_value->email_verification == 'enabled')
        {
            $this->notify(new VerifyEmail);
        }
    }

    public function getOwnAccountAttribute()
    {
        return (auth()->user()->id == $this->id);
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }

    public function savingsWithdraw()
    {
        return $this->hasMany(SavingsWithdraw::class);
    }


    public function savingsVault()
    {
        return $this->hasMany(SavingsVault::class);
    }

    public function transfersOut()
    {
        return $this->hasMany(SavingsTransfer::class, 'user_id', 'id');
    }

    public function transfersIn()
    {
        return $this->hasMany(SavingsTransfer::class, 'receiver_id', 'id');
    }

    public function scopeBalance()
    {
        $balance = $this->deposit()->sum('amount') + $this->transfersIn()->sum('amount') - 
        ($this->transfersOut()->sum('amount') + $this->savingsVault()->whereStatus('active')->sum('amount')
        + $this->savingsWithdraw()->sum('amount'));

        return $balance;
    }
}
