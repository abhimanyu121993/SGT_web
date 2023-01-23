<?php

namespace App\Helpers;

use App\Models\State;

class Helper
{
    public static function getStateByCountry($id)
    {
        $states =  State::where('country_id', $id)->get();
        return response()->json(['status' => 200, 'states' => $states]) ;
    }
}
