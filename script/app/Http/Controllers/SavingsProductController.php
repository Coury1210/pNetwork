<?php

namespace App\Http\Controllers;

use App\Models\SavingsProduct;
use Illuminate\Http\Request;

class SavingsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = SavingsProduct::get();
        return view('savingProducts', compact('products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SavingsProduct $savingsProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingsProduct $savingsProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SavingsProduct $savingsProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingsProduct $savingsProduct)
    {
        //
    }
}
