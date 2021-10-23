<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }  
    

    public function login(Request $request)
    {
        $username = User::where('username', '=', $request->username)->first();
        if ($username) {
            $password = $username->password;
            if (Hash::check($request->password, $password)) {
                $request->session()->regenerate();
                return redirect('/'); 
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');   
    }

}