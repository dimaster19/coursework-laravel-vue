<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function load(Request $request)
    {
        $title = 'Интернет-магазин техники и электроники в Донецке (ДНР), купить в DNS';

        return view('home',compact('title'));


    }


    public function getPopular(Request $request)
    {

        return Product::latest('id')->take(5)->get();
    }
}
