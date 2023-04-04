<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $title = 'Регистрация';

        return view('signup', compact('title'));
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function signup(RegisterRequest $request)
    {
         $user = User::create(['name' => $request->name,
       'email' => $request->email,
        'password' =>bcrypt($request->password),
        'role' => false
        ]);
        //$user = User::create($request->validated());
        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
