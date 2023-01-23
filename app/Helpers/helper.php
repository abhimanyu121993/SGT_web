<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\State;
use App\Models\TimeZone;
use Exception;

class Helper
{
    public static function getStateByCountry($id)
    {
        try {
            $states = State::where('country_id', $id)->get();
            return $states;
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501); 
        }
    }
    public static function getCitiesByState($id)
    {
        try {
            $cities = City::where('state_id', $id)->get();
            return $cities;
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501); 
        }
    }

    public static function getTimeZone(){
        return $timezones = TimeZone::where('is_active', true)->get();
    }
}
