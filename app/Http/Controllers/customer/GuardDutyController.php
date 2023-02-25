<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Property;
use App\Models\GuardDuty;
use App\Models\SecurityGuard;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class GuardDutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('owner_id',Helper::getOwner())->get();
        $guards = SecurityGuard::where('owner_id',Helper::getOwner())->get();
        return view('customer.guard.add_duty', compact('properties','guards'));
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
     //For store data in GuardDuty table.

     public function store(Request $request)
     {
         $request->validate([
            'property' => 'required',
             'route' => 'required',
             'guard' =>'required',
         ]);
         try{
            $res= GuardDuty::create([
                 'property_id' => $request->property,
                 'route_id' => $request->route,
                 'guard_id' => $request->guard,
             ]);
 if($res){
     Session::flash('success', 'Duty created successfully');
 
 }
 else{
     Session::flash('error', 'Duty not created');
 
 }
             return redirect()->back();
         }
         catch(Exception $ex){
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
     public function show($id)
     {
         return view('customer.property.view_property');
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
 
         $id=Crypt::decrypt($id);
         $properties = Property::where('owner_id',Helper::getOwner())->get();
         $duty=GuardDuty::find($id);
         if($duty)
         {
             return view('customer.property.add_property',compact('duty','properties'));
         }
         else
         {
             Session::flash('error','Something Went Wrong OR Data is Deleted');
             return redirect()->back();
         }    }
 
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
             'property' => 'required',
             'route' => 'required',
             'guard' =>'required',
         ]);
         try
         {
              $res=GuardDuty::find($id)->update([ 
              'property_id' => $request->property,
              'route_id' => $request->route,
              'guard_id' => $request->guard,

          
              
         ]);
         if($res)
         {
                 session()->flash('success','Duty updated sucessfully');
             }
             else
             {
                 session()->flash('error','Duty not updated ');
             }
         }
         catch(Exception $ex){
             Helper::handleError($ex);
         }
         return redirect()->back();    }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     //For deleting the data from GuardDuty table.
 
     public function destroy($id)
     {
         $id=Crypt::decrypt($id);
         try{
                 $res=GuardDuty::find($id)->delete();
                 if($res)
                 {
                     session()->flash('success','Property deleted sucessfully');
                 }
                 else
                 {
                     session()->flash('error','Property not deleted ');
                 }
             }
             catch(Exception $ex){
                 Helper::handleError($ex);
             }
             return redirect()->back();   
          }
}
