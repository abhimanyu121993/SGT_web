<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Customer;
use App\Models\Leave;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;

class LeaveManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $status = Status::where('type', 'leave')->get();
        $customers=Customer::where('owner_id', Helper::getOwner())->pluck('id')->toArray();
        $leaves=Leave::with('leaveable')->where('leaveable_type','App\Models\customer\Customer')->whereIn('leaveable_id',$customers)->get(); 
        return view('customer.leave_management.manage_leave',compact('leaves','status'));   
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
        //
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

      //For change the status of Leave
      public function status(Request $request)
      {
  
          try {
              $res = Leave::find($request->leave_id)->update([
                  'status' => $request->status_id,
              ]);
              if ($res) {
                  return response()->json([
                      'success' => 'Leave status upadted' // for status 200
                  ]);
              } else {
                  return response()->json([
                      'success' => 'Leave status not upadted' // for status 503
                  ]);
              }
          } catch (Exception $ex) {
              Helper::handleError($ex);
          }
      }
}
