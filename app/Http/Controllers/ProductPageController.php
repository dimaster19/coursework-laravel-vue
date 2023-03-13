<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductPageController extends Controller
{
    public function load(Request $request, $name)
    {
        $id = null;
        // get id from url
        foreach (str_split($name) as $char) {
            if ($char == '-') break;
            else $id += $char;
        }

        // get title from url
        $temp = (string)$id.'-';
        $title = str_replace($temp, "", $name);
        $title = str_replace("-", " ", $title);
        // --

        $product = Product::findOrFail($id);
        return view('product', compact('product', 'title'));


    }
}
