<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;



class AdminPanelController extends Controller
{
    public function load(Request $request)
    {

        if (auth()->user()->role == 'true') {
            $title = 'Админ панель';

            return view('adminpanel', compact('title'));
        } else {

            return redirect('/');
        }
    }


    public function getColumns(Request $request)
    {
        // $query =  DB::select('SELECT column_name  FROM information_schema.columns  WHERE  table_name = ?', [$request->id]);
        $query =  Schema::getColumnListing($request->id);



        return $query;
    }

    public function getData(Request $request, $db)
    {

        $title = ucfirst($db);

        $query =   DB::table($db)->orderBy('id')->paginate(30);

        $columns =  Schema::getColumnListing($db);

        return view('viewdb', compact('query',  'columns', 'title'));

    }

    public function getUpdateData(Request $request)
    {

        $query =  DB::table( $request->db)->find($request->id);

        return $query;

    }

    public function adminAction(Request $request)
    {


        if($request->action == 'create') {
            DB::table($request->db)->insert([
                array_combine($request->input_header, $request->input_data)
            ]);
        }
        else if ($request->action == 'update') {
             DB::table($request->db)
            ->where('id', $request->update_id)
            ->update(array_combine($request->input_header, $request->input_data)
        );
        }
        else if ($request->action == 'remove') {
            DB::table($request->db)->where('id', $request->remove_id )->delete();

        }


    }


}
