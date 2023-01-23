<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function states_in_country(Request $request)
    {
        $request->validate([
            'country_id'=>'required|numeric'
        ]);
        $states=Helper::getStateByCountry($request->country_id);
        $html = '';
        $html .= "<option value=''>--Select States</option>";
        foreach($states as $state){
            $html .= "<option value='" . $state->id . "'>" . $state->name . "</option>";
        }
        return $html;
    }
}
