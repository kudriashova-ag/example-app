<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $product = Product::find($request->id);
        $qty = $request->qty;

        if(Session::get('cart.' . $product->id)){
            $qty+= Session::get('cart.' . $product->id . '.qty');
        }

        $data = [
            'id' => $product->id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => $qty,
        ];

        Session::put('cart.' . $product->id, $data);
        $this->setTotalSum();
        return view('_mini-cart');
    }


    public function delete(Request $request)
    {
        Session::forget('cart.' . $request->id);
        $this->setTotalSum();
        return view('_mini-cart');
    }

    public function clear()
    {
        Session::forget('cart');
        Session::forget('totalSum');
        return view('_mini-cart');
    }

    public function setTotalSum()
    {
        $sum = 0;
        foreach(Session::get('cart') as $p){
            $sum+= $p['price'] * $p['qty'];
        }
        Session::put('totalSum', $sum);
    }
}
