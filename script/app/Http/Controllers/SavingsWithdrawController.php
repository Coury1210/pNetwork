<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavingsWithdrawRequest;
use App\Models\SavingsWithdraw;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SavingsWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(auth()->user()->id);
        $withdraws = $user->savingsWithdraw()->latest()->paginate(20);
        return view('withdraw',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavingsWithdrawRequest $request)
    {
        $data = $request->validated();
       
        $data['tx_id'] = uniqid('withdraw');
        $data['user_id'] = auth()->user()->id;
        $balance = User::findOrFail($data['user_id'])->balance();

        if ($balance < $data['amount']) {
            request()->session()->flash('return_err', "Insufficient Balance to withdraw amount");
        } else {
            SavingsWithdraw::create($data);
            request()->session()->flash('return_msg', "You have successfully withdrawn");
        }
        return back();


        $user = auth()->user();
        $user_data = json_decode($user->value);

        if ($request->type == 'paypal')
        {
        	if ($user_data->wallet >= 50)
            {
                if ($user_data->wallet >= $request->amount)
                {
                    $withdraw = new SavingsWithdraw();
                    $withdraw->user_id =  $user->id;
                    $withdraw->withdraw_id = rand(1,900000000000);
                    $withdraw->type = $request->type;
                    $withdraw->amount = $request->amount;
                    $withdraw->email = $request->email;
                    $withdraw->save();
                    $author =  User::findOrFail($user->id); 
                    $author_data = json_decode($author->value);
                    $author_data->wallet = $author_data->wallet - $request->amount; 
                    $author->value = json_encode($author_data);
                    $author->save();

                    return response()->json('ok');
                } else {
                    return response()->json('wallet_error');
                }
            } else {
                return response()->json('wallet_not');
            }
        }

        if ($request->type == 'swift')
        {
            if ($user_data->wallet >= 50)
            {
                if ($user_data->wallet >= $request->amount)
                {

                    $validator = Validator::make($request->all(), [
                        'amount' => 'required|numeric',
                        'email' => 'required',
                        'account_holder_name' => 'required',
                        'account_number' => 'required',
                        'bank_branch_city' => 'required',
                        'bank_branch_country' => 'required',
                        'bank_full_name' => 'required',
                        'billing_address_1' => 'required',
                        'city' => 'required',
                        'country' => 'required',
                        'name' => 'required',
                        'postal_code' => 'required',
                        'swift_code' => 'required'
                    ]);

                    if ($validator->fails())
                    {
                        return response()->json(['errors'=>$validator->errors()->all()[0]]);
                    }

                    $data = [
                        'account_holder_name' => $request->account_holder_name,
                        'account_number' => $request->account_number,
                        'bank_branch_city' => $request->bank_branch_city,
                        'bank_branch_country' => $request->bank_branch_country,
                        'bank_full_name' => $request->bank_full_name,
                        'billing_address_1' => $request->billing_address_1,
                        'billing_address_2' => $request->billing_address_2,
                        'city' => $request->city,
                        'country' => $request->country,
                        'intermediary_bank_city' => $request->intermediary_bank_city,
                        'intermediary_bank_code' => $request->intermediary_bank_code,
                        'intermediary_bank_country' => $request->intermediary_bank_country,
                        'intermediary_bank_name' => $request->intermediary_bank_name,
                        'name' => $request->name,
                        'postal_code' => $request->postal_code,
                        'state' => $request->state,
                        'swift_code' => $request->swift_code,
                    ];

                    $withdraw = new SavingsWithdraw();
                    $withdraw->user_id = Auth::User()->id;
                    $withdraw->withdraw_id = rand(1,900000000000);
                    $withdraw->type = $request->type;
                    $withdraw->amount = $request->amount;
                    $withdraw->email = $request->email;
                    $withdraw->value = json_encode($data);
                    $withdraw->save();
                    $author = Auth::User();
                    $author_data = json_decode($author->value);
                    $author_data->wallet = $author_data->wallet - $request->amount; 
                    $author->value = json_encode($author_data);
                    $author->save();

                    return response()->json('ok');
                }else{
                    return response()->json('wallet_error');
                }
            }else{
                return response()->json('wallet_not');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingsWithdraw  $savingsWithdraw
     * @return \Illuminate\Http\Response
     */
    public function show(SavingsWithdraw $savingsWithdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsWithdraw  $savingsWithdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingsWithdraw $savingsWithdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsWithdraw  $savingsWithdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavingsWithdraw $savingsWithdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsWithdraw  $savingsWithdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingsWithdraw $savingsWithdraw)
    {
        //
    }
}
