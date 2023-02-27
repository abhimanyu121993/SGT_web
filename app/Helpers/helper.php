<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\customer\Checkpoint;
use App\Models\customer\Customer;
use App\Models\customer\Property;
use App\Models\customer\Route;
use App\Models\PermissionName;
use App\Models\ProjectError;
use App\Models\SecurityGuard;
use App\Models\Shift;
use App\Models\State;
use App\Models\TimeZone;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        if(Auth::guard(PermissionName::$customer)->check()){
            if(Auth::guard(PermissionName::$customer)->user()->type==Customer::$owner){
                return Helper::getUserId();
            }
            else if(Auth::guard(PermissionName::$customer)->user()->type==Customer::$employee)
            {
                return Auth::guard(PermissionName::$customer)->user()->owner_id;
            }
        }
    }

    public static function getGuard()
    {
        if(Auth::guard(PermissionName::$admin)->check())
        {
            return 'admin';
        }
        else if(Auth::guard(PermissionName::$customer)->check()){
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

    public static function getCheckpointByProperty($id)
    {
        try {
           $property=Property::find($id);
           return $checkpoints=$property->checkpoints;
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501);
        }
    }
    public static function getRouteByProperty($id)
    {
        try {
            $routes = Route::where('property_id', $id)->get();
            return $routes;
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501);
        }
    }

    public static function getShiftByProperty($id)
    {
        try {
            $shifts = Shift::where('property_id', $id)->get();
            return $shifts;
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501);
        }
    }

    public static function role_name($name)
    {
         $role=explode('_',$name);
         return $role[1];
    }

    public static function getCustomerBySession()
    {
        if(Session::has('customer')){
            $id=Crypt::decrypt(Session::get('customer'));
            $customer=Customer::findOrFail($id);
            return $customer;
        }        
            Session::flash('warning','Customer Not Selected');
            return redirect()->back();
        
    }
}
