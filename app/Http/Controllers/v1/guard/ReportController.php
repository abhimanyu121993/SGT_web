<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralReportResource;
use App\Http\Resources\MaintainanceReportResource;
use App\Models\GeneralReport;
use App\Models\MaintenanceReport;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function general_report(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
            'title' => 'required',
            'notes' => 'required',
        ]);
        try {
            $mainpic=[];
            if($request->hasFile('record_sample'))
            {
                foreach($request->file('record_sample') as $file)
                {
                    $prop_name='gen-report-'.time().'-'.rand(0,99).'.'.$file->extension();
                    $path=$file->storeAs('report',$prop_name,'public');
                    $mainpic []=$path;
                }
            }
            $user = Auth::guard(Helper::getGuard())->user();
            $report = GeneralReport::create([
                'property_id'=>$request->property_id,
                'guard_id'=>Auth::guard('sanctum')->id(),
                'title'=>$request->title,
                'notes'=>$request->notes,
                'status_id'=>Status::where('name', 'pending')->where('type', 'report')->first()->id,
                'record_sample'=>json_encode($mainpic),
            ]);
            if ($report) {
                $result = [
                    'data'=>new GeneralReportResource($report),
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

    public function maintenance_report(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
            'title' => 'required',
            'notes' => 'required',
        ]);
        try {
            $mainpic=[];
            if($request->hasFile('record_sample'))
            {
                foreach($request->file('record_sample') as $file)
                {
                    $prop_name='main-report-'.time().'-'.rand(0,99).'.'.$file->extension();
                    $path=$file->storeAs('report',$prop_name,'public');
                    $mainpic []=$path;
                }
            }
            $user = Auth::guard(Helper::getGuard())->user();
            $report = MaintenanceReport::create([
                'property_id'=>$request->property_id,
                'guard_id'=>Auth::guard('sanctum')->id(),
                'title'=>$request->title,
                'notes'=>$request->notes,
                'status_id'=>Status::where('name', 'pending')->where('type', 'report')->first()->id,
                'record_sample'=>json_encode($mainpic),
            ]);
            if ($report) {
                $result = [
                    'data'=>new MaintainanceReportResource($report),
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
