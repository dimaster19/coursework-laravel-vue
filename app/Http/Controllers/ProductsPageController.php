<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
        $products = Product::where('category_id', $cat[0]->id)->orderBy('price')->paginate(10);
        return view('products', compact('title', 'products'));


    }
}
