<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class ProductsPageController extends Controller
{
    public function load(Request $request,  $category)
    {
        switch ($category) {
            case 'smartfony':
                $title = 'Смартфоны';
                break;
            case 'naushniko':
                $title = 'Наушники';
                break;
        }

        $cat =  DB::table('categories')->where('name', '=', $category)->get();
        $manufactures = Product::where('category_id', $cat[0]->id)->distinct()->pluck('manufacture_id');


        $brands = array();
        foreach ($manufactures as &$item) {
            $brands[] = DB::table('manufactures')->where('id', $item)->value('name');
        }
        $products = Product::where('category_id', $cat[0]->id)->orderBy('price')->paginate(10);


        $prices = Product::where('category_id', $cat[0]->id);

        $price_range = array();
        $price_range[] = $prices->min('price');
        $price_range[] = $prices->max('price');


        return view('products', compact('title',  'products', 'category', 'brands', 'price_range'));
    }

    public function sort(Request $request,  $category)
    {
        switch ($category) {
            case 'smartfony':
                $title = 'Смартфоны';
                break;
            case 'naushniko':
                $title = 'Наушники';
                break;
        }
        $cat =  DB::table('categories')->where('name', '=', $category)->get();
        $brands = 0;


        switch ($request->order_id) {
            case 1:
                $title = 'Смартфоны';
                break;
            case 2:
                $title = 'Наушники';
                break;
            case 3:
                $title = 'Наушники';
                break;
            case 4:
                $title = 'Наушники';
                break;
        }
        $products = Product::where('category_id', $cat[0]->id)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)->orderBy('price')->paginate(10)->withPath(URL::full());
        $price_range[] = $request->min_price;
        $price_range[] = $request->max_price;

        return view('products', compact('title',  'products', 'category', 'brands', 'price_range'));
    }
}
