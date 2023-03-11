<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\Helper;
use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Resources\CheckpointCollection;
use App\Http\Resources\CheckpointResource;
use App\Http\Resources\DutyCollection;
use App\Http\Resources\GuardPropertyCollection;
use App\Http\Resources\GuardPropertyResource;
use App\Http\Resources\jobCollection;
use App\Http\Resources\SecurityGuardResource;
use App\Models\City;
use App\Models\Country;
use App\Models\customer\Checkpoint;
use App\Models\customer\Property;
use App\Models\GuardDuty;
use App\Models\State;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile_image(Request $request)
    {

        $request->validate([
            'profile_image' => 'required|image',
        ]);
        $data = Auth::guard('sanctum')->user()->update([
            'images' => $request->hasFile('profile_image') ? ImageUpload::simpleUpload('security_guard/images', $request->profile_image, 'profile') : '',
        ]);
        if ($data) {
            $res = response()->json([
                'status' => true,
                'data' => $data,
                'message' => 'Profile Updated Successfully !',
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'data' => $data,
                'message' => 'Something Went Wrong !',
            ]);
        }
        return $res;
    }
    public function update_profile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required|regex:/^[6-9][0-9]{9}$/',
            'street' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'pincode' => 'required|numeric',
            'card_image' => 'nullable|image|max:1024',
        ]);

        $data = Auth::guard('sanctum')->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'street' => $request->street,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
            'pincode' => $request->pincode,
            'country_id' => $request->country_id,
        ]);
        if ($request) {
            Auth::guard('sanctum')->user()->update([
                'card_image' => $request->hasFile('card_image') ? ImageUpload::simpleUpload('security_guard', $request->card_image, 'card-' . Auth::guard('sanctum')->id()) : '',
            ]);
        }
        if ($data) {
            $res = [
                'data' => new SecurityGuardResource(Auth::guard('sanctum')->user()),
                'message' => 'Profile Updated Successfully !',
                'error' => NULL,
            ];
        } else {
            $res = [
                'data' => NULL,
                'message' => 'Something Went Wrong !',
                'error' => [
                    'code' => 503
                ]
            ];
        }
        return response()->json($res);
    }


    public function guard_properties(Request $request)
    {
        try {
            $duties = GuardDuty::with('property')->where('guard_id', Auth::guard('sanctum')->id())->get();
            if ($duties) {
                $res = [
                    'data' => new jobCollection($duties),
                    'message' => 'guard assigned properties',
                    'success' => true
                ];
            }
            return response()->json($res);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => NULL,
                'message' => $ex->getMessage(),
                'success' => false,

            ];
            return response()->json($result);
        }
    }
    public function guard_properties_details(Request $request)
    { try{
        if ($request->property_id) {

            $properties = Property::find($request->property_id);
            $res = [
                'data' => new GuardPropertyResource($properties),
                'message' => 'property details',
                'success'=>true
            ];
        } 
        return response()->json($res);
    }
    catch (Exception $ex) {
        Helper::handleError($ex);
        $result = [
            'data' => NULL,
            'message' => $ex->getMessage(),
            'success' => false,

        ];
        return response()->json($result);
    }
    }
    public function guard_properties_checkpoints(Request $request)
    {
        try{ 
        if ($request->property_id) {

            $checkpoints = Checkpoint::where('property_id', $request->property_id)->get();
            $res = [
                'data' =>new CheckpointCollection($checkpoints),
                'message' => 'property checkpoints',
                'success'=>true
            ];
        } 
        return response()->json($res);
    }
    catch (Exception $ex) {
        Helper::handleError($ex);
        $result = [
            'data' => NULL,
            'message' => $ex->getMessage(),
            'success' => false,

        ];
        return response()->json($result);
    }
}
}
