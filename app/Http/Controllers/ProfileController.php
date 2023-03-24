<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function load(Request $request)
    {
        $title = 'Мой аккаунт';

        return view('profile',compact('title'));


    }
}
