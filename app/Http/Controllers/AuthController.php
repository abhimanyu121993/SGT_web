<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\customer\Customer;
use App\Models\PermissionName;
use App\Models\ProjectError;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;

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
            Session::put('guard', 'superadmin');
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
            Session::put('guard', 'admin');
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
            Session::put('guard', 'customer');
            return redirect()->route('customer.dashboard');
        }
        else
        {
            Session::flash('error', 'Invalid Credential');
            return redirect()->back();
        }
    }
    // For Logout All Guards
    public function logout()
    {
        $route = 'home';
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

// For change the password.
public function update_Password(Request $request)
{
    $request->validate([
        'old_password'=>'required',
        'new_password'=>'required',
        'cnew_password'=>'required|same:new_password'
    ]);
    try
    {
       if(Auth::guard('admin')->check()){
        $admin=Admin::find(Helper::getUserId());
        if(Hash::check($request->old_password,$admin->password)){
           $res=$admin->update(['password' => Hash::make($request->new_password)]);
           if($res){
            return redirect()->route('auth.logout');
            Session::flash('success','Password Upadated Successfully');
           }
           else{
            Session::flash('error','Password Not Update right now');
           }
        }
        else{
            Session::flash('error','Old password not matched');
        }
       }
      else if(Auth::guard('customer')->check()){
        $customer=Customer::find(Helper::getUserId());
        if(Hash::check($request->old_password,$customer->password)){
          $res= $customer->update(['password' => Hash::make($request->new_password)]);
            if($res){
            return redirect()->route('auth.logout');
            Session::flash('success','Password Upadated Successfully');
           }
           else{
            Session::flash('error','Password Not Update right now');
           }
        }
        else{
            Session::flash('error','Old password not matched');
        }
       }
       else{
        Session::flash('error','Something went wrong! Please Try agin');

       }
    }
    catch(Exception $ex)
    {
        $url=URL::current();
        ProjectError::create(['url'=>$url,'message'=>$ex->getMessage()]);
        Session::flash('error','Server Error ');
    }
        return redirect()->back();
}
//Lock screen 
public function lock()
{
        $user =(object)[];
    if (Auth::guard('superadmin')->check()) {
        $user = Auth::guard('superadmin')->user();

    }
    else if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();

    }
    else if (Auth::guard('customer')->check()) {
        $user = Auth::guard('customer')->user();
    }
    Auth::guard('superadmin')->logout();
    Auth::guard('admin')->logout();
    Auth::guard('customer')->logout();
    Session::put('user',$user);
        abort(201);
}

// create password 
public function admin_create_password($token,$email)
{
    if($dt=DB::table('password_resets')
    ->where([
      'email' => $email, 
      'token' => $token
    ])
    ->first())
    {
        return view('auth.generate_password',['token'=>$token,'return'=>route('auth.admin-create-password')]);
    }
    else
    {
        return redirect()->back()->with(['msg'=>'Not Found']);
    }
   return view('auth.generate_password');
}
public function admin_create_password_code(Request $req)
{
    $req->validate([
        'password'=>'required|min:8',
        'cnpassword'=>'same:password',
        'token'=>'required|exists:password_resets,token'
    ]);
   
    $dt=DB::table('password_resets')
    ->where([
      'token' => $req->token
    ])
    ->first();
       $res= Admin::where('email',$dt->email)->update(['password'=>Hash::make($req->password)]);
       if($res){
        $admin=Admin::where('email',$dt->email)->first();
        Auth::guard('admin')->loginUsingId($admin->id);
        return redirect()->route('admin.dashboard');
       }
       else
       {
        Session::flash('warning','Invalid Token');
        return redirect()->back();
       }
        
}

public function customer_create_password($token,$email)
{
    if($dt=DB::table('password_resets')
    ->where([
      'email' => $email, 
      'token' => $token
    ])
    ->first())
    {
        return view('auth.generate_password',['token'=>$token,'return'=>route('auth.customer-create-password')]);
    }
    else
    {
        return redirect()->back()->with(['msg'=>'Not Found']);
    }
   return view('auth.generate_password');
}
public function customer_create_password_code(Request $req)
{

    $req->validate([
        'password'=>'required|min:8',
        'cnpassword'=>'same:password',
        'token'=>'required|exists:password_resets,token'
    ]);
   
    $dt=DB::table('password_resets')
    ->where([
      'token' => $req->token
    ])
    ->first();
       $res=Customer::where('email',$dt->email)->update(['password'=>Hash::make($req->password)]);
       if($res){
        $customer=Customer::where('email',$dt->email)->first();
        Auth::guard('customer')->loginUsingId($customer->id);
        return redirect()->route('customer.dashboard');
       }
       else
       {
        Session::flash('warning','Invalid Token');
        return redirect()->back();
       }
        
}
}
