<?php

namespace App\Helpers;

use App\Models\State;
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
}
