<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Customer;
use App\Models\Leave;
use App\Models\Status;
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
        $leaves = Customer::with('leaves')->find(Helper::getOwner());
        return view('customer.leave_management.staff_leave', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Customer::with('leaves')->find(Helper::getUserId());

        return view('customer.leave_management.manage_staff_leave', compact('leaves'));
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
                'leave_start' => $request->leave_start,
                'leave_end' => $request->leave_start,
                'status' => Status::where('name', 'pending')->where('type', 'leave')->first()->id,
            ]);
            if ($res) {
                Session::flash('success', 'Leave Apply Successfully');
            } else {
                Session::flash('success', 'Leave Not Apply');
            }
            return redirect()->back();
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
