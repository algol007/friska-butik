<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // $datauser = User::where('username', $request->username)
        // ->where('password', $request->password)
        // ->first();
        // if ($datauser) { // actived
        //     return redirect('login');
        // }
        dd($request->session());
        if ($request->session()) {
            return $next($request);
        }
    }
}
