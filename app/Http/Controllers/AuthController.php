<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Login for superadmin with superadmin Auth
    public function superadmin()
    {
        $guard = 'superadmin';
        return view('auth.login',compact('guard'));
    }
    public function superadmin_login(Request $req)
    {
        $req->validate([
            'username'=>'required|min:8',
            'password'=>'required'
        ]);
        if(Auth::guard('superadmin')->attempt(['email' => $req->username, 'password' => $req->password],$req->remember)){
            return redirect()->route('superadmin.dashboard');
        }
        else
        {
            Session::flash('error', 'Invalid Credential');
            return redirect()->back();
        }
    }
    // Login for Admin with admin Auth
    public function admin()
    {
        $guard = 'admin';
        return view('auth.login',compact('guard'));
    }
    public function admin_login(Request $req)
    {
        $req->validate([
            'username'=>'required|min:8',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt(['email' => $req->username, 'password' => $req->password],$req->remember)){
            return redirect()->route('admin.dashboard');
        }
        else
        {
            Session::flash('error', 'Invalid Credential');
            return redirect()->back();
        }
    }
    //Login for Customer with customer auth
    public function customer()
    {
        $guard = 'customer';
        return view('auth.login',compact('guard'));
    }
    public function customer_login(Request $req)
    {
        $req->validate([
            'username'=>'required|min:8',
            'password'=>'required'
        ]);
        if(Auth::guard('customer')->attempt(['email' => $req->username, 'password' => $req->password],$req->remember)){
            // return 123;
            return redirect()->route('customer.dashboard');
        }
        else
        {
            Session::flash('error', 'Invalid Credential');
            return redirect()->back();
        }
    }
    // Logout All Guards
    public function logout()
    {
        if (Auth::guard('superadmin')->check()) {
            $route = 'auth.superadmin';
           
        }
        else if (Auth::guard('admin')->check()) {
            $route = 'auth.admin';
           
        }
        else if (Auth::guard('customer')->check()) {
            $route = 'auth.customer';
            
        }
        Auth::guard('superadmin')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('customer')->logout();
        return redirect()->route($route);

    }
}
