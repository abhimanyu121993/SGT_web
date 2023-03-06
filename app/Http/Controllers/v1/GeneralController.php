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
            $res = response()->json([
                'data' => $data,
            ]);
        } else {
            $res = response()->json([
                'status' => false,
                'message' => 'no record found of state !',
            ]);
        }
        return response()->json($res,200);
    }
    public function city(Request $req)
    {
        $data = Helper::getCitiesByState($req->state_id);
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
        return response()->json($res,200);
    }
    public function country()
    {
        $data = Country::active()->get();
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
        return response()->json($res,200);
    }

    public function time_zone()
    {
       $data=TimeZone::active()->get();
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
    return response()->json($res,200);
    }
}
