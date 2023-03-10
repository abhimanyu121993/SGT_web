<?php

namespace App\Http\Controllers\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\TimeZone;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function state(Request $req)
    {
        $data = Helper::getStateByCountry($req->country_id);
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'State Fetch successfully',
                'error'=>NULL
            ];
        } else {
            $res = [
                'data'=>null,
                'message' => 'no record found of state !',
                'error'=>[
                    'code'=>'305',
                    'message'=>'Soemthing Went Wrong'
                ]
                ];
        }
        return response()->json($res);
    }
    public function city(Request $req)
    {
        $data = Helper::getCitiesByState($req->state_id);
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'city fetch successfully',
                'error'=>NULL
            ];
        } else {
            $res = [
                'data'=>null,
                'message' => 'no record found of city !',
                'error'=>[
                    'code'=>'305',
                    'message'=>'Something Went Wrong'
                ]
                ];
        }
        return response()->json($res);
    }
    public function country()
    {
        $data = Country::active()->get();
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'Record fetch successfully',
                'error'=>null
            ];
        } else {
            $res = [
                'data'=>null,
                'message' => 'no record found of Country !',
                'error'=>[
                    'code'=>'305',
                    'message'=>'Something Went Wrong'
                ]
            ];
        }
        return response()->json($res);
    }

    public function time_zone()
    {
       $data=TimeZone::active()->get();
       if ($data) {
        $res = [
            'data' => $data,
            'message'=>'timezone fetch successfully',
            'error'=>Null
        ];
    } else {
        $res = [
            'data'=>null,
            'message' => 'no record found of Country !',
            'error'=>[
                'code'=>'305',
                'message'=>'Something Went Wrong'
            ]
        ];
    }
    return response()->json($res);
    }
}
