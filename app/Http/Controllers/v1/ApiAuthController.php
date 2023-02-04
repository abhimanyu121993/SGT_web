<?php

namespace App\Http\Controllers\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\SecurityGuardResource;
use App\Models\SecurityGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function guard(Request $req)
    {
        $req->validate([
            'email'=>'required|email|exists:security_guards,email',
            'password'=>'required|min:6'
        ]);
      
            $sguard = SecurityGuard::where('email', $req->email)->first();
        $abilities = $sguard->getAllPermissions()->pluck('name');
            return response()->json([
                'status' => true,
                'message'=>'Logged In Successfully',
                'token'=>$sguard->createToken('Api Token',$abilities->toArray())->plainTextToken,
                'abilities'=>$abilities,
            ]);
       
    }
    public function logged_in(Request $req)
    {
            return new SecurityGuardResource(Auth::guard('sanctum')->user());
        
    }
    public function logged_out()
    {
     
            return Auth::guard('sanctum')->user()->currentAccessToken()->delete();
        
      
    }
}
