<?php

namespace App\Http\Controllers\v1\guard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Resources\LeaveResource;
use App\Models\SecurityGuard;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $leaves=SecurityGuard::with('leaves')->find(Helper::getUserId());
            if ($leaves) {
                $result = [
                    'data'=>$leaves,
                    'message' => 'Found leave details',
                    'status' => 200,
                    'error' => NULL
                ];
            } else {
                $result = [
                    'data' => NULL,
                    'message' => 'Leave details not found',
                    'status' => 200,
                    'error' => [
                        'message' => 'Server Error',
                        'code' => 305,
                    ]
                ];
            }
            return response()->json($result);
        } catch (Exception $ex) {
            Helper::handleError($ex);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'leave_start' => 'required',
            'leave_end' => 'required',
            'desc' => 'required',
            'subject' => 'required',
        ]);
        try {
            $user = Auth::guard(Helper::getGuard())->user();
            $res = $user->leaves()->create([
                'subject' => $request->subject,
                'desc' => $request->desc,
                'leave_start' => Helper::saveUtc(Carbon::createFromFormat('d-m-Y',$request->leave_start)->format('Y-m-d h:i')),
                'leave_end' => Helper::saveUtc(Carbon::createFromFormat('d-m-Y',$request->leave_end)->format('Y-m-d h:i')),
                'status' => Status::where('name', 'pending')->where('type', 'leave')->first()->id,
            ]);
            if ($res) {
                $result = [
                    'data'=>new LeaveResource($res),
                    // 'data'=>$res,
                    'message' => 'Leave Request send successfully',
                    'status' => 200,
                    'error' => NULL
                ];
            } else {
                $result = [
                    'data' => NULL,
                    'message' => 'Leave Request not send',
                    'status' => 200,
                    'error' => [
                        'message' => 'Server Error',
                        'code' => 305,
                    ]
                ];
            }
            return response()->json($result);
        } catch (Exception $ex) {
            Helper::handleError($ex);
            $result=[
                'data'=>null,
                'error'=>[
                    'code'=>503,
                    'msg'=>'Internal Server Error'
                ]
                ];
                return response()->json($result,200);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
