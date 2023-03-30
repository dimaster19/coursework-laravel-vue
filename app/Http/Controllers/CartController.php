<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function load(Request $request)
    {
        $title = 'Корзина';
        $products = array();
        $totalprice = 0;
        if (session('carts') != 0)
        {
            $arr = session('carts');
            foreach ($arr as &$value) {
                $product = Product::find($value);
                $products[] =  $product;
                $totalprice +=  $product -> price;
             }
             return view('cart',compact('title', 'products', 'totalprice'));

        }


        return view('cart',compact('title', 'products', 'totalprice'));


    }

    public function addToCart(Request $request)
    {
        if (session('carts') != 0)
        {
        $arr = session('carts');
        foreach ($arr as &$value) {
            if ($value == $request->id) return false;
         }
        }

        session()->push('carts',  $request -> id);
        session(['cart_count' => count(session('carts'))]);

        return session('cart_count');
    }

    public function removeFromCart(Request $request) {

    }
}
