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
            case 'naushniki':
                $title = 'Наушники';
                break;
        }

        $cat =  DB::table('categories')->where('name', '=', $category)->get();
        $manufactures = Product::where('category_id', $cat[0]->id)->distinct()->pluck('manufacture_id');


        $brands = array();
        foreach ($manufactures as &$item) {
            $brands[] = DB::table('manufactures')->where('id', $item)->get();
        }
        $products = Product::where('category_id', $cat[0]->id)->orderBy('price')->paginate(10);


        $prices = Product::where('category_id', $cat[0]->id);

        $price_range = array();
        $price_range[] = $prices->min('price');
        $price_range[] = $prices->max('price');
        $checked_brands = $brands;

        return view('products', compact('title',  'products', 'category', 'brands', 'checked_brands','price_range'));
    }

    public function sort(Request $request,  $category)
    {
        //  определяем title
        switch ($category) {
            case 'smartfony':
                $title = 'Смартфоны';
                break;
            case 'naushniko':
                $title = 'Наушники';
                break;
        }
        $cat =  DB::table('categories')->where('name', '=', $category)->get();


        $brands = array();
        $manufactures = Product::where('category_id', $cat[0]->id)->distinct()->pluck('manufacture_id');
        foreach ($manufactures as &$item) {
            $brands[] = DB::table('manufactures')->where('id', $item)->get();
        }
        $checked_brands = array();
        if ($request->brands != null) {
            $checked_brands = array_map(function ($value) {
                return intval($value);
            },  explode(',', $request->brands));
            $products = Product::where('category_id', $cat[0]->id)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price)->whereIn('manufacture_id', $checked_brands);
        } else {
            $checked_brands = $brands;
            $products = Product::where('category_id', $cat[0]->id)->where('price', '>=', $request->min_price)->where('price', '<=', $request->max_price);
        }



        switch ($request->order_id) {
            case 1:
                $products = $products->orderBy('price', 'ask')->paginate(10)->withPath(URL::full());

                break;
            case 2:
                $products = $products->orderBy('price', 'desc')->paginate(10)->withPath(URL::full());
                break;
            case 3:
                $products = $products->orderBy('name', 'ask')->paginate(10)->withPath(URL::full());
                break;
            case 4:
                $products = $products->orderBy('name', 'desc')->paginate(10)->withPath(URL::full());
                break;
        }


        $price_range[] = $request->min_price;
        $price_range[] = $request->max_price;

        return view('products', compact('title',  'products', 'category', 'brands', 'checked_brands', 'price_range'));
    }
}
