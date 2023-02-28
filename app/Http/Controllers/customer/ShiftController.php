<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Shift;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For view the (Create Shift) page.
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show the (Manage Shift ) page.
    public function create()
    {
        //code 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in Shift table.
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'nullable',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);
        try {
            $res = Shift::create([
                'property_id' => $request->property_id,
                'name'=>$request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'is_active' => 1,
            ]);

            if ($res) {
                session()->flash('success', 'Shift Added Sucessfully');
            } else {
                session()->flash('error', 'Shift not added ');
            }
        } catch (Exception $ex) {
            Helper::handleError($ex);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For show the shift of property
    public function show($id)
    {
        $property_id = $id;
        $shifts = Shift::where('property_id', $id)->get();
        return view('customer.property.shift', compact('property_id', 'shifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For show the editing page.
    public function edit($id)
    {
        $id = Crypt::decrypt($id);           //Decrypting the Encrypted id.
        $shifts = Shift::find($id);
        if ($shifts) {
            return view('admin.property.shift', compact('shifts'));
        } else {
            Session::flash('error', 'Something Went Wrong OR Data is Deleted');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For update the the edited data.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'nullable',
            'start_time' => 'required',
            'end_time' => 'required',

        ]);
        try {
            $res = Shift::find($id)->update([
                'name'=>$request->name,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
            if ($res) {
                session()->flash('success', 'Shift Updated Sucessfully');
            } else {
                session()->flash('error', 'Shift not Update ');
            }
        } catch (Exception $ex) {
            Helper::handleError($ex);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For deleting the data from Shift table.
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        try {
            $res = Shift::find($id)->delete();
            if ($res) {
                session()->flash('success', 'Shift deleted Sucessfully');
            } else {
                session()->flash('error', 'Shift not deleted ');
            }
        } catch (Exception $ex) {
            Helper::handleError($ex);
        }
        return redirect()->back();
    }

    //For Activate and deactivate shift.

    public function is_active($id)
    {
        $is_active = Shift::find($id);

        if ($is_active->is_active == 1) {
            $is_active->is_active = 0;
        } else {
            $is_active->is_active = true;
        }
        if ($is_active->update()) {
            return 1;
        } else {
            return 0;
        }
    }
}
