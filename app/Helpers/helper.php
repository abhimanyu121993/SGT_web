<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\Currency;
use App\Models\ProjectError;
use App\Models\State;
use App\Models\TimeZone;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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

    public static function getUserId()
    {
        $logged_in_user_id = Auth::guard(Session::get('guard'))->user()->id;
        return $logged_in_user_id;
    }

    public static function getTimeZone()
    {
        return $timezones = TimeZone::where('is_active', true)->get();
    }

    public static function getCurrencies()
    {
        return $currencies = Currency::get();
    }

    public static function handleError($msg)
    {
        $url=URL::current();
        ProjectError::create(['url'=>$url,'message'=>$msg->getMessage()]);
        Session::flash('error','Server Error ');
    }
}