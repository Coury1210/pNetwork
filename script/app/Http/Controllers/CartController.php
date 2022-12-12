<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Option;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show()
    {
        $cart_items = request()->session()->get('products');

        $cart_items = collect($cart_items);
        $settings =  Option::where('key','currency')->first();

        $currency = json_decode($settings->value)->code;
        $payment_method = json_decode(auth()->user()->value)->payment_method ?? 'Flutter Wave';

        $tax = 0;

        $sub_total = (collect($cart_items)->sum('price'));
        
        return view('checkout', compact('cart_items', 'currency', 'sub_total', 'tax', 'payment_method'));
    }

    public function addItem(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product['order_quantity'] = $request->quantity;
       // $collection->put('order_quantity', $request->quantity);
        if ($this->doesCartItemExist($product_id)) {
            $request->session()->flash('return_msg', 'Item is already in your cart');
        } else {
            $request->session()->push('products', $product);
            $request->session()->flash('return_msg', 'Item has been added to cart');
        }
        return redirect()->route('products.index');
    }

    public function removeItem(Request $request, $index)
    {
        $cart_items = request()->session()->get('products');
        unset($cart_items[$index]);

        $request->session()->forget('products');

        foreach ($cart_items as $product)
        {
            $request->session()->push('products', $product);
        }
        $request->session()->flash('return_msg', 'Item has been removed from cart');

        return redirect()->route('cart.show');
    }

    public function checkout(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $request->session()->push('products', $product);

        return redirect()->route('products.index');
    }

    private function doesCartItemExist($product_id)
    {
        $cart_items = request()->session()->get('products');
        $exists = collect($cart_items)->where('id', $product_id)->first();
        return $exists ? true : false;
    }
}
