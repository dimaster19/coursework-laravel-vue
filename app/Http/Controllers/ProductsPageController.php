<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsPageController extends Controller
{
    public function load(Request $request)
    {

        $title = 'Category';

        return view('products', compact('title'));


    }
}
