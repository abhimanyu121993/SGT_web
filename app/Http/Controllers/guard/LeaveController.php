<?php

namespace App\Http\Controllers\guard;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\SecurityGuard;
use App\Models\Status;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\Sanctum;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves=SecurityGuard::with('leaves')->find(Helper::getUserId());
        dd($leaves);
        return view('customer.guard.leave_management.manage_guard_leave',compact('leaves'));
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
        // dd($request->all());
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'desc' => 'required',
            'subject' => 'required',
        ]);
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
            $dateRange = CarbonPeriod::create($startDate, $endDate);
            foreach ($dateRange as $date) {
                $user = Auth::guard('sanctum')->user();
                $leave = $user->leaves()->create([
                    'subject' => $request->subject,
                    'desc' => $request->desc,
                    'leave_date' => $date->format('Y-m-d'),
                    'status' => Status::where('name', 'pending')->where('type', 'leave')->first()->id,
                ]);
            }
            if ($leave) {
                $result = [
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
