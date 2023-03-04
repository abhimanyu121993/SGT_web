<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\ImageUpload;
use App\Http\Controllers\Controller;
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
            'card_image' => 'required|image',
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
            'card_image' => $request->hasFile('card_image') ? ImageUpload::simpleUpload('card_image', $request->card_image, 'card') : '',
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
    public function state()
    {
        $data = State::state()->get();
        if ($data) {
            $res = response()->json([
                'data' => $data,
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'message' => 'no record found of state !',
            ]);
        }
        return $res;
    }
    public function city()
    {
        $data = City::city()->get();
        if ($data) {
            $res = response()->json([
                'data' => $data,
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'message' => 'no record found of City !',
            ]);
        }
        return $res;
    }
    public function country()
    {
        $data = Country::country()->get();
        if ($data) {
            $res = response()->json([
                'data' => $data,
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'message' => 'no record found of Country !',
            ]);
        }
        return $res;
    }
    public function change_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'new_confirm_password' => 'same:new_password',
        ]);
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

        return $res;
    }

    public function guard_properties(Request $request)
    {
        if ($request->guard_id) {

            $properies = GuardDuty::with('properties')->where('guard_id',$request->guard_id)->get();
            $res = response()->json([
                'status' => true,
                'data' => $properies,
                'message' => 'guard assigned properties',
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'data' => null,
                'message' => 'property not assigned',
            ]);
        }
        return $res;
    }
    public function guard_properties_details(Request $request)
    {
        if ($request->property_id) {

            $properies = Property::find($request->property_id);
            $res = response()->json([
                'status' => true,
                'data' => $properies,
                'message' => 'property details',
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Something went wrong !',
            ]);
        }
        return $res;
    }
    public function guard_properties_checkpoints(Request $request)
    {
        if ($request->property_id) {

            $checkpoints = Checkpoint::where('property_id',$request->property_id)->get();
            $res = response()->json([
                'status' => true,
                'data' => $checkpoints,
                'message' => 'property checkpoints',
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'data' => null,
                'message' => 'Something went wrong !',
            ]);
        }
        return $res;
    }
}
