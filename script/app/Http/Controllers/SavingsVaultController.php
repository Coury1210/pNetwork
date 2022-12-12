<?php

namespace App\Http\Controllers;

use App\Models\SavingsProduct;
use App\Models\SavingsVault;
use App\User;
use Illuminate\Http\Request;

class SavingsVaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $product = SavingsProduct::findOrFail($id);
        return view('singleSavingsProduct', compact('product'));           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['savings_product_id'] = $product_id;

        $user = User::findOrFail( $data['user_id']);
        if ($user->balance() > $data['amount']) {
            SavingsVault::create($data);
            request()->session()->flash('return_msg', 'Savings Plan Added to Your Vault');
        } else {
            request()->session()->flash('return_err', 'Insufficient Account Balance');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingsVault  $savingsVault
     * @return \Illuminate\Http\Response
     */
    public function show(SavingsVault $savingsVault)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsVault  $savingsVault
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingsVault $savingsVault)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsVault  $savingsVault
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavingsVault $savingsVault)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsVault  $savingsVault
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingsVault $savingsVault)
    {
        //
    }
}
