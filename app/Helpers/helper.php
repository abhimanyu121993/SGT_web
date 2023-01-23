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
            if (!empty($states)) {
                return response()->json(['states' => $states, 'message' => 'fetch successsfully'], 200);
            } else {
                return response()->json(['states' => NULL, 'message' => 'No States Found'], 200);
            }
        }
        catch(Exception $ex){
            return response()->json(['message' => $ex->getMessage()],501); 
        }
    }
}
