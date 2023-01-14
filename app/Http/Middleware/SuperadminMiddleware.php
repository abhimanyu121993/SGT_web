<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperadminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('superadmin')->check()){
            Session::flash('error', 'Permission Denied ! Please Loggin as superadmin');
            abort(403,'Permission Denied ! Please Login as Superadmin');
            return redirect()->route('auth.superadmin')->with('error','Permission Denied ! Please Loggin as superadmin');
        }
        return $next($request);
    }
}
