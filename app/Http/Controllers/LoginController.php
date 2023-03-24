<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        $title = 'Вход';

        return view('signin', compact('title'));

    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // $credentials = ['email' => $request->email, 'password' => $request->password];
        // if(!Auth::attempt($credentials)):

        //         $user = Auth::getProvider()->retrieveByCredentials($credentials);

        //         Auth::login($user);

        //         return $this->authenticated($request, $user);

        // endif;
        // return redirect()->to('signin')
        // ->withErrors(['msg' => 'Пользователь не найден']);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна...

            return redirect('/');
        }

        dd(Auth::attempt($credentials));
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
