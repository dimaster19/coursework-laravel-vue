<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{

    public function load(Request $request)
    {
        $title = 'Интернет-магазин техники и электроники в Донецке (ДНР), купить в DNS';
        $carousel_imgs = Carousel::orderBy('id', 'desc')->take(4)->get();
        return view('home',compact('title', 'carousel_imgs'));


    }


    public function getPopular(Request $request)
    {

        return Product::latest('id')->take(5)->get();
    }
}
