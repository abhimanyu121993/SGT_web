<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CustomerMiddleware
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
        if(!Auth::guard('customer')->check()){
            Session::flash('error', 'Permission Denied ! Please Loggin as Customer');
            abort(403,'Permission Denied ! Please Login as Customer');
            return redirect()->route('auth.customer')->with('error','Permission Denied ! Please Loggin as Customer');
        }
        return $next($request);
    }
}
