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
        if (Auth::guard('security_guard')->attempt($req->only('email', 'password'))) {
            $abilities = $sguard->getAllPermissions()->pluck('name');
            return response()->json([
                'status' => true,
                'message' => 'Logged In Successfully',
                'token' => $sguard->createToken('Api Token', $abilities->toArray())->plainTextToken,
                'abilities' => $abilities,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Invalid Creadential',
            ]);
        }

    }
    public function logged_in(Request $req)
    {
            return new SecurityGuardResource(Auth::guard('sanctum')->user());

    }
    public function logged_out()
    {
            $data = Auth::guard('sanctum')->user()->currentAccessToken()->delete();
            if($data)
            {
                return response()->json([
                    'status'=>true,
                    'message'=>'SecurutyGuard logout Successfully !',
                ]);
            }

    }
}
