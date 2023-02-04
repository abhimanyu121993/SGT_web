<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\customer\Customer;
use App\Models\ProjectError;
use App\Models\State;
use App\Models\TimeZone;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function getCountries()
    {
        return $countries = Country::get();
    } 
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

    public static function getOwner(){
        if(Auth::guard(Role::$customer)->check()){
            if(Auth::guard(Role::$customer)->user()->type==Customer::$owner){
                return Helper::getUserId();
            }
            else if(Auth::guard(Role::$customer)->user()->type==Customer::$employee)
            {
                return Auth::guard(Role::$customer)->user()->owner_id;
            }
        }
    }

    public static function getGuard()
    {
        if(Auth::guard(Role::$admin)->check())
        {
            return 'admin';
        }
        else if(Auth::guard(Role::$customer)->check()){
            return 'customer';
        }
    }

    public function sendError($message,$errors=[],$code=401)
    {
        $response = ['success' => false, 'message' => $message];
        if(!empty($errors)){
            $response['data'] = $errors;
        }
        throw new HttpResponseException(response()->json($response, $code));
    }
}
