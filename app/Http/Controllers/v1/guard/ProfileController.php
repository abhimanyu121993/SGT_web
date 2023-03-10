<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
use App\Http\Resources\SecurityGuardResource;
use App\Models\City;
use App\Models\Country;
use App\Models\customer\Checkpoint;
use App\Models\customer\Property;
use App\Models\GuardDuty;
use App\Models\State;
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
        if($request)
        {
            Auth::guard('sanctum')->user()->update([
            'card_image' => $request->hasFile('card_image') ? ImageUpload::simpleUpload('security_guard', $request->card_image, 'card-'.Auth::guard('sanctum')->id()) : '',
            ]);
        }
        if ($data) {
            $res =[
                'data' => new SecurityGuardResource(Auth::guard('sanctum')->user()),
                'message' => 'Profile Updated Successfully !',
                'error'=>NULL,
            ];
        } else {
            $res =[
                 'data' => NULL,
                'message' => 'Something Went Wrong !',
                'error'=>[
                    'code'=>503                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
                    ]   
                ];
            
        }                                                                                                                       
        return response()->json($res);
    }
   

    public function guard_properties(Request $request)
    {
        if ($request->guard_id) {

            $properies = GuardDuty::with('properties')->where('guard_id',$request->guard_id)->get();
            $res = [
                'data' => $properies,
                'message' => 'guard assigned properties',
            ];
        } else {
            $res =[
                'data' => null,
                'message' => 'property not assigned',
            ];
        }
        return response()->json($res);
    }
    public function guard_properties_details(Request $request)
    {
        if ($request->property_id) {

            $properies = Property::find($request->property_id);
            $res = [
                'data' => $properies,
                'message' => 'property details',
            ];
        } else {
            $res =[
                'data' => null,
                'message' => 'Something went wrong !',
            ];
        }
        return response()->json($res);
    }
     public function guard_properties_checkpoints(Request $request)
    {
        if ($request->property_id) {

            $checkpoints = Checkpoint::where('property_id',$request->property_id)->get();
            $res = [
                'data' => $checkpoints,
                'message' => 'property checkpoints',
            ];
        } else {
            $res = [
                'data' => null,
                'message' => 'Something went wrong !',
            ];
        }
        return response()->json($res);
    }
}
