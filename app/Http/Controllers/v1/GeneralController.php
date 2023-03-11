<?php

namespace App\Http\Controllers\v1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\TimeZone;
use Exception;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function state(Request $req)
    {
        try { 
        $data = Helper::getStateByCountry($req->country_id);
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'State Fetch successfully',
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
    public function city(Request $req)
    {
        try { 
        $data = Helper::getCitiesByState($req->state_id);
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'city fetch successfully',
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
    public function country()
    {
        try{ 
        $data = Country::active()->get();
        if ($data) {
            $res = [
                'data' => $data,
                'message'=>'Record fetch successfully',
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

    public function time_zone()
    {
        try{ 
       $data=TimeZone::active()->get();
       if ($data) {
        $res = [
            'data' => $data,
            'message'=>'timezone fetch successfully',
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
