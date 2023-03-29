<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function load(Request $request)
    {
        $title = 'Корзина';


        session(['cart_count' => 10]);


        return view('cart',compact('title'));


    }

    public function addToCart(Request $request)
    {

        session(['carts' => [1,2]]);
            dd($request -> id);
        session()->push('carts',  $request -> id);

    }
}
