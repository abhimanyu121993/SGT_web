<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\AssignedPropertyResource;
use App\Http\Resources\CheckpointCollection;
use App\Http\Resources\GeneralReportResource;
use App\Http\Resources\GuardPropertyResource;
use App\Http\Resources\jobCollection;
use App\Models\customer\Checkpoint;
use App\Models\customer\Property;
use App\Models\GeneralReport;
use App\Models\GuardDuty;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function guard_properties(Request $request)
    {
        try {
            $duties = GuardDuty::with('property')->where('guard_id', Auth::guard('sanctum')->id())->get();
            if ($duties) {
                $res = [
                    'data' => new jobCollection($duties),
                    'message' => 'guard assigned properties',
                    'success' => true
                ];
            }
            return response()->json($res);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => NULL,
                'message' => $ex->getMessage(),
                'success' => false,

            ];
            return response()->json($result);
        }
    }
    public function guard_properties_details(Request $request)
    {
        try {
            if ($request->duty_id) {
                $properties = GuardDuty::with('property')->with('shift')->find($request->duty_id);
                $res = [
                    'data' => new AssignedPropertyResource($properties),
                    'message' => 'property details',
                    'success' => true
                ];
            }
            return response()->json($res);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => NULL,
                'message' => $ex->getMessage(),
                'success' => false,

            ];
            return response()->json($result);
        }
    }
    public function guard_properties_checkpoints(Request $request)
    {
        try {
            if ($request->property_id) {

                $checkpoints = Checkpoint::where('property_id', $request->property_id)->get();
                $res = [
                    'data' => new CheckpointCollection($checkpoints),
                    'message' => 'property checkpoints',
                    'success' => true
                ];
            }
            return response()->json($res);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result = [
                'data' => NULL,
                'message' => $ex->getMessage(),
                'success' => false,

            ];
            return response()->json($result);
        }
    }
}
