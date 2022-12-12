<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavingsTransferRequest;
use App\Models\Deposit;
use App\Models\SavingsTransfer;
use App\Models\SavingsVault;
use App\Models\SavingsWithdraw;
use App\Option;
use App\Services\StakeCube;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavingsController extends Controller
{
    //
    public function withdraw() 
    {
        $user = User::findOrFail(auth()->user()->id);
        $currency_code = Option::where('key','currency')->first();
        $currency_value = json_decode($currency_code->value);
        $withdraws = $user->savingsWithdraw()->get();
        return view('savingsWithdraw', compact('currency_value', 'withdraws'));
    }
    public function deposit() 
    {
        $currency_code = Option::where('key','currency')->first();
        $currency_value = json_decode($currency_code->value);
        return view('deposit', compact('currency_value'));
    }

    public function addDeposit(Request $request)
    {
        DB::beginTransaction();

        return StakeCube::getSupportedCoins();
      
        $data =  $request->except('_token');
        $data['user_id'] = auth()->user()->id;
        $data['txn_id'] = uniqid('deposit');
        Deposit::create($data);
        DB::commit();
        $request->session()->flash('return_msg', "Your deposit of {$data['amount']} has been added");
        return back();
    }

    public function getSavingsVaults()
    {
        $user = User::findOrFail(auth()->user()->id);
        $vaults = $user->savingsVault()->whereStatus('active')->get();
        $vaults->map(function($v) {
            $v->interest = $this->getAcquiredInterest($v->id);
            $v->expected_interest = $this->getExpectedInterest($v->id);
            $v->expiry_period = $v->days_before_expiry.' '.$v->savingsProduct->interval;
            return $v;
        });

        return view('vault', compact('vaults'));
    }

    public function getAcquiredInterest($vault_id)
    {
        $vault = SavingsVault::findOrFail($vault_id);
        $product = $vault->savingsProduct;

        $annual_rate = $product->annual_rate;
        $days_in_year = Carbon::parse(today())->daysInYear;
        $daily_rate = $annual_rate/$days_in_year;

        $days_since_fixing = Carbon::parse($vault->created_at)->diffInDays(today());

        $interest = $daily_rate/100*$vault->amount*$days_since_fixing;

        return round($interest, 2);
    }

    public function getExpectedInterest($vault_id)
    {
        $vault = SavingsVault::findOrFail($vault_id);
        $product = $vault->savingsProduct;
        $amount = $vault->amount;
        $rate = $product->annual_rate;
        $frequency = $product->interval;
        $period = $product->duration;
        if ($frequency == 'months') {
            $rate = $rate/100/12;
        }

        if ($frequency == 'days') {
            $rate = $rate/100/today()->daysInYear;
        }

        $interest = $rate * $period * $amount;

        return round($interest, 2);
    }

    public function transfer()
    {
        return view('savingsTransfer');
    }

    public function transferSavings(SavingsTransferRequest $request) 
    {
        $data = $request->validated();
        $data['tx_id'] = uniqid('transfer');
        $data['user_id'] = auth()->user()->id;
        $data['receiver_id'] = User::whereUsername($data['receiver_username'])->first()->id;
        $balance = User::findOrFail($data['user_id'])->balance();

        if ($balance < $data['amount']) {
            request()->session()->flash('return_err', "Insufficient Balance to transfer amount");
        } else {
            SavingsTransfer::create($data);
            request()->session()->flash('return_msg', "You have successfully transfered");
        }
        return back();
    }

    public function withdrawFromVault($vault_id)
    {
        $vault = SavingsVault::findOrFail($vault_id);

        if (today()->lt($vault->expires_on)) {
            request()->session()->flash('return_err', 'Plan is not yet due for withdrawal');
        } else {
            $vault->status = 'withdrawn';
            $vault->save();
            request()->session()->flash('return_msg', 'Withdrawn From Vault To Account');
        }
        return back();
    }
}
