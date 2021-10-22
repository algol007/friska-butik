<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('/login');
        }
    }

    public function actionlogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == 'admin' && $password == 'password' || $username == 'admin2' && $password == 'password2') {
            return redirect('/');
        }else{
            Session::flash('error', 'Username atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
