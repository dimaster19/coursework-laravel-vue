<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductsPageController extends Controller
{
    public function load(Request $request,  $category)
    {

        $title = $category;
        $cat =  DB::table('categories')->where('name', '=', $category)->get();
        $products = Product::where('category_id', $cat[0]->id)->orderBy('price')->get();
        return view('products', compact('title', 'products'));


    }
}
