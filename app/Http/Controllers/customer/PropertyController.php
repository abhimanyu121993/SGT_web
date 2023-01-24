<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\customer\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::get();
        return view('customer.property.manage_property', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        return view('customer.property.register_property', compact('countries'));
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
            'name' => 'required'
        ]);
        try{
           $res= Property::create([
                'created_by'=>Helper::getUserId(),
                'owner_id'=>Helper::getOwnerId(),
                'name' => $request->name,
                'country' => $request->country ?? '',
                'state' => $request->state ?? '',
                'city' => $request->city ?? '',
                'postcode' => $request->postcode ?? '',
                'address' => $request->address ?? '',
                'lattitude' => $request->lattitude ?? '',
                'longitude' => $request->longitude ?? '',
            ]);
if($res){
    Session::flash('success', 'Property created successfully');

}
else{
    Session::flash('error', 'Property not created');

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

        $id=Crypt::decrypt($id);
        $countries = Country::get();
        $propertyEdit=Property::find($id);
        if($propertyEdit)
        {
            return view('customer.property.register_property',compact('propertyEdit','countries'));
        }
        else
        {
            session::flash('error','Something Went Wrong OR Data is Deleted');
            return redirect()->back();
        }    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'name'=>'required',
            // 'email'=>'required',
        ]);
        try
        {
             $res= Property::find($id)->update([ 
             'name' => $request->name,
             'country' => $request->country ?? '',
             'state' => $request->state ?? '',
             'city' => $request->city ?? '',
             'postcode' => $request->postcode ?? '',
             'address' => $request->address ?? '',
             'lattitude' => $request->lattitude ?? '',
             'longitude' => $request->longitude ?? '',
             
        ]);
        if($res)
        {
                session()->flash('success','Property updated sucessfully');
            }
            else
            {
                session()->flash('error','Property not updated ');
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
    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=Property::find($id)->delete();
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
            return redirect()->back();    }
}
