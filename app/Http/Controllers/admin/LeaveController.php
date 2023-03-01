<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\Leave;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves=Admin::with('leaves')->find(Helper::getOwner());
        return view('admin.leave_management.staff_leave',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves=Admin::with('leaves')->find(Helper::getUserId());
        return view('admin.leave_management.manage_staff_leave',compact('leaves')); 
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

        ]);
        try {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->leave_start);
             $endDate = Carbon::createFromFormat('Y-m-d', $request->leave_end);
        $dateRange = CarbonPeriod::create($startDate, $endDate);
                    foreach ($dateRange as $date)
                    {
                        $user=Auth::guard(Helper::getGuard())->user();
                        $r=$user->leaves()->create([
                            'subject' => $request->subject,
                            'desc' => $request->desc,
                            'leave_date' => $date->format('Y-m-d'),
                            'status' => false
                        ]);
                    }
                    Session::flash('success','Leave Apply Successfully');
                    return redirect()->back();
            }
        catch (Exception $ex) {
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
