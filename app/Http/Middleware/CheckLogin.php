<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect('/home')->with('alert', 'You have not logined yet!');;
        }
        $user = Auth::user();
        if ($user->role != "admin") {
            return redirect('/home')->with('alert','You are not authorized. Try logging in with an admin account!');
        }
        return $next($request);

    }
}
