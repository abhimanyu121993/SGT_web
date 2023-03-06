<?php

namespace App\Http\Controllers\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\SecurityGuardResource;
use App\Models\SecurityGuard;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function guard(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:security_guards,email',
            'password' => 'required|min:6'
        ]);

        try {
            $sguard = SecurityGuard::where('email', $req->email)->first();
            if (Auth::guard('security_guard')->attempt($req->only('email', 'password'))) {
                $abilities = $sguard->getAllPermissions()->pluck('name');
                $result = [
                    'status' => true,
                    'message' => 'Logged In Successfully',
                    'token' => $sguard->createToken('Api Token', $abilities->toArray())->plainTextToken,
                    'abilities' => $abilities,
                ];
            } else {
                $result = [
                    'status' => false,
                    'message' => 'Invalid Creadential',
                ];
            }
            return response()->json($result, 200);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => null,
                'error' => [
                    'code' => 500,
                    'msg' => 'Internal Server Error'
                ]
            ];
            return response()->json($result, 200);
        }
    }
    public function logged_in(Request $req)
    {
        return new SecurityGuardResource(Auth::guard('sanctum')->user());
    }
    public function logged_out()
    {
        try {
            if (Auth::guard('sanctum')->user()) {
                $data = Auth::guard('sanctum')->user()->currentAccessToken()->delete();
                if ($data) {
                    $result = [
                        'status' => true,
                        'msg' => 'SecurutyGuard logout Successfully !',
                    ];
                }
            } else {
                $result=[
                    'status'=>false,
                    'msg'=>'User Not Logged In'
                ];
            }
            return response()->json($result,200);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => null,
                'error' => [
                    'code' => 500,
                    'msg' => 'Internal Server Error'
                ]

            ];
            return response()->json($result, 200);
        }
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password',
        ]);
        try{
        if (Hash::check($request->old_password, Auth::guard('sanctum')->user()->password)) {
            $data = Auth::guard('sanctum')->user()->update([
                'password' => Hash::make($request->new_password),
            ]);
            $res = response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'your password is updated successfully !',
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'message' => 'your old password is not mached !',
            ]);
        }

        return response()->json($res,200);
    }
    catch(Exception $ex){
        Helper::handleError($ex);
        $result=[
            'data'=>null,
            'error'=>[
                'code'=>503,
                'msg'=>'Internal Server Error'
            ]
            ];
            return response()->json($result,200);
    }
    }
}
