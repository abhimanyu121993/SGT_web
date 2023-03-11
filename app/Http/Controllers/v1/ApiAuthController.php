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
                    'message' => 'Logged In Successfully',
                    'token' => $sguard->createToken('Api Token', $abilities->toArray())->plainTextToken,
                    'success' => TRUE,
                    // 'abilities' => $abilities,
                    'data' => new SecurityGuardResource($sguard)
                ];
            } else {
                $result = [
                    'success' => false,
                    'message' => 'Invalid Creadential',
                ];
            }
            return response()->json($result);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => null,
                'success' => false,
                'error' => [
                    'code' => 500,
                    'msg' => 'Internal Server Error'
                ]
            ];
            return response()->json($result);
        }
    }
    public function logged_in(Request $req)
    {
        try{
        if (Auth::guard('sanctum')->user()) {
            $result = [

                'data' => new SecurityGuardResource(Auth::guard('sanctum')->user()),
                'message' => 'logged in guard details fetch successfully',
                'success' => true
            ];
        } else {
            $result = [
                'data' => NULL,
                'message' => 'Invalid User',
                'success'=>true,
            ];
        }
        return response()->json($result);
    }
    catch(Exception $ex){
        Helper::handleError($ex);
        return response()->json([
            'data'=>NULL,
            'message'=>$ex->getMessage(),
            'success'=>false,
        ]);
    }

    }
    public function logged_out()
    {
        try {
            if (Auth::guard('sanctum')->user()) {
                $data = Auth::guard('sanctum')->user()->currentAccessToken()->delete();
                if ($data) {
                    $result = [
                        'success' => true,
                        'msg' => 'SecurutyGuard logout Successfully !',
                    ];
                }
            } else {
                $result = [
                    'status' => false,
                    'msg' => 'User Not Logged In'
                ];
            }
            return response()->json($result);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => null,
                'error' => [
                    'code' => 500,
                    'msg' => 'Internal Server Error'
                ]

            ];
            return response()->json($result);
        }
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password',
        ]);
        try {
            if (Hash::check($request->old_password, Auth::guard('sanctum')->user()->password)) {
                $data = Auth::guard('sanctum')->user()->update([
                    'password' => Hash::make($request->new_password),
                ]);
                $res = [
                    'message' => 'your password is updated successfully !',
                    'success' => true
                ];
            } else {
                $res = [

                    'message' => 'your old password is not mached !',
                    'success' => false
                ];
            }

            return response()->json($res);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'error' => [
                    'code' => 503,
                    'msg' => 'Internal Server Error'
                ]
            ];
            return response()->json($result);
        }
    }
}
