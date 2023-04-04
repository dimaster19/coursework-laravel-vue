<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;



class AdminPanelController extends Controller
{
    public function load(Request $request)
    {

        if (auth()->user()->role == 'tue') {
            $title = 'Интернет-магазин техники и электроники в Донецке (ДНР), купить в DNS';

            return view('adminpanel', compact('title'));
        } else {
            $title = 'Интернет-магазин техники и электроники в Донецке (ДНР), купить в DNS';

            return view('adminpanel', compact('title'));
        }
    }


    public function getColumns(Request $request)
    {
        // $query =  DB::select('SELECT column_name  FROM information_schema.columns  WHERE  table_name = ?', [$request->id]);
        $query =  Schema::getColumnListing($request->id);



        return $query;
    }

    public function getData(Request $request)
    {


        $query =  DB::table($request->dbname)->orderBy('id', 'desc')->paginate(20);
        $columns =  Schema::getColumnListing($request->dbname);

        return [$query, $columns];
    }
}
