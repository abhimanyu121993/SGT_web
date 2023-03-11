<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\GeneralReport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'leave_start' => 'required',
           
        ]);
        try {
            $user = Auth::guard(Helper::getGuard())->user();
            $res = GeneralReport::create([
                'subject' => $request->subject,
               
            ]);
            if ($res) {
                $result = [
                    'data'=>new LeaveResource($res),
                    'message' => 'Report submitted successfully',
                    'success' => True,
                ];
            } 
            return response()->json($result);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result=[
                'data'=>null,
                'message' => $ex->getMessage(),
                'success'=>false,

            ];
                return response()->json($result,200);
        }
    }
}
