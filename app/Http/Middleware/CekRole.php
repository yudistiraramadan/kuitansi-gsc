<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        // if(Auth::check() && Auth::user()->role_id == $role)
        // {
        //     return $next($request);
        // }

        // if(Auth::check() && Auth::user()->role_id == null){
        //     return redirect('/login');
        // }

        if(in_array($request->user()->role_id, $role)){
            return $next($request);
        }elseif(Auth::check() && Auth::user()->role_id == null){
            return redirect('/login');
        }else
        return redirect('/login')->with('error', 'User tidak terdaftar!!');
    }
}
