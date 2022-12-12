<?php

namespace App\Http\Controllers\Admin;

use App\Models\SavingsProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.products.savings.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.savings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        SavingsProduct::create($data);
        request()->session()->flash('return_msg', 'Product has been added');
        return back();
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
    public function edit($id)
    {
        $product = SavingsProduct::findOrFail($id);
        return view('admin.products.savings.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = SavingsProduct::findOrFail($id);
        $product->update($data);
        request()->session()->flash('return_msg', 'Product has been updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $product = SavingsProduct::findOrFail($id);
        $product->status = 'inactive';
        $product->save();

        request()->session()->flash('return_msg', 'Product has been deactivated');
        return $this->index();
    }

      /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingsProduct  $savingsProduct
     * @return \Illuminate\Http\Response
     */
    public function activate($id)
    {
        $product = SavingsProduct::findOrFail($id);
        $product->status = 'active';
        $product->save();

        request()->session()->flash('return_msg', 'Product has been activated');
        return $this->index();
    }
}
