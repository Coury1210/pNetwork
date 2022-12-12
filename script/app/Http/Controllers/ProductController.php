<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Option;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        $settings =  Option::where('key','currency')->first();

        $currency = json_decode($settings->value)->code;
        return view('marketPlace', compact('products', 'currency'));
    }

    public function show(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $settings =  Option::where('key','currency')->first();

        $currency = json_decode($settings->value)->code;
        return view('product', compact('product', 'currency'));
    }

    public function addProductView()
    {
        return view('addProduct');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $data = $request->only('name', 'description', 'quantity', 'color', 'weight', 'units', 'price');

        $file = $request->file('image');
        $filepath = null;
		if (isset($file)) {
			$curentdate = Carbon::now()->toDateString();
			$imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


			$path = 'uploads/';
            ini_set("max_execution_time",6000);
            ini_set("max_input_time",5000);
            ini_set("upload_max_filesize","20M");
            ini_set("product_max_size","80M");
			$file->move($path, $imagename);

            $filepath = 'uploads/'.$imagename;
		}

        $data['image'] = $filepath;
        $data['seller_id'] = auth()->user()->id;

        Product::create($data);

        DB::commit();
        $request->session()->flash('return_msg', 'Your product has been created');
        return back();
    }

       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $product = Product::findOrFail($productId);
        request()->session()->flash('return_msg', 'Your product has been updated');
        return view('editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int   $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        DB::beginTransaction();

        $product = Product::findOrFail($productId);

        $file = $request->file('image');
        $filepath = null;
		if (isset($file)) {
			$curentdate = Carbon::now()->toDateString();
			$imagename =  $curentdate . '-' . uniqid() . '.' . $file->getClientOriginalExtension();


			$path = 'uploads/';
            ini_set("max_execution_time",6000);
            ini_set("max_input_time",5000);
            ini_set("upload_max_filesize","20M");
            ini_set("product_max_size","80M");
			$file->move($path, $imagename);

            $filepath = 'uploads/'.$imagename;
		}

        $data = [
            'name' => $request->name,
            'description' > $request->description, 
            'quantity' => $request->quantity,
            'color' => $request->color, 
            'weight' => $request->weight, 
            'units' => $request->units, 
            'price' => $request->price,
            'image' =>  $file ? $filepath : $product->image,
            'seller_id' => $product->seller_id
        ];
        $product->update($data);

        DB::commit();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        DB::beginTransaction();

        $product = Product::findOrFail($productId);
        $product->delete();

        DB::commit();
        return redirect()->route('products.index');
    }
}
