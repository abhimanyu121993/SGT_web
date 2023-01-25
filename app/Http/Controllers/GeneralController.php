<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //Fetch states by countries.
    public function states_in_country(Request $request)
    {
        $request->validate([
            'country_id'=>'required|numeric'
        ]);
        $states=Helper::getStateByCountry($request->country_id); //Fetch state by countries from helper.
        $html = '';
        $html .= "<option value=''>--Select States</option>";
        foreach($states as $state){
            $html .= "<option value='" . $state->id . "'>" . $state->name . "</option>";
        }
        return $html;
    }

    //Fetch city by state
    public function cities_in_state(Request $req)
    {
        $req->validate([
            'state_id'=>'required|numeric'
        ]);
        $states=Helper::getCitiesByState($req->state_id); //Fetch city by states from helper.
        $html = '';
        $html .= "<option value=''>--Select city</option>";
        foreach($states as $state){
            $html .= "<option value='" . $state->id . "'>" . $state->name . "</option>";
        }
        return $html;
    }
}
