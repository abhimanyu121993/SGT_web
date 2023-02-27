<?php

namespace App\Http\Controllers\customer;
use App\Helpers\ImageUpload;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\customer\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;
class PropertyController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (manage property) page.

    public function __construct()
    {
        $this->middleware('permission:property_read,customer')->only('index');
        $this->middleware('permission:property_create,customer')->only('store');
        $this->middleware('permission:property_delete,customer')->only('destroy');
        $this->middleware('permission:property_edit,customer')->only('edit','update');
    }

    public function index()
    {
        $properties = Property::where('owner_id',Helper::getOwner())->get();
        return view('customer.property.manage_property', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (Register property) page.
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
    //For store data in property table.

    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|exists:cities,id',
            'state' => 'required|exists:states,id',
            'country' =>'required|exists:countries,id',
            'name' => 'required',
            'postcode'=>'required|size:6',
            'lattitude'=>'required',
            'longitude'=>'required'
        ]);
        try{
           
           $res= Property::create([
                'created_by'=>Helper::getUserId(),
                'owner_id'=>Helper::getOwner(),
                'name' => $request->name,
                'country' => $request->country ?? '',
                'state' => $request->state ?? '',
                'city' => $request->city ?? '',
                'postcode' => $request->postcode ?? '',
                'address' => $request->address ?? '',
                'lattitude' => $request->lattitude ?? '',
                'longitude' => $request->longitude ?? '',
                'file'=>$request->hasFile('images')?ImageUpload::simpleUpload('property',$request->images,'property'):'',
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
     //For update the the edited data.

    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required',
            'state' => 'required',
            'country' =>'required',
            'name' => 'required',
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
        $request->hasFile('images')?Property::find($id)->update(['file'=>ImageUpload::simpleUpload('property',$request->images,'property')]):'';
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
    //For deleting the data from property table.

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
            return redirect()->back();   
         }
     //Fetch route by properties.
     public function routes_in_property(Request $request)
     {
         $request->validate([
             'property_id'=>'required|numeric'
         ]);
         $routes=Helper::getRouteByProperty($request->property_id); //Fetch route by properties from helper.
         $html = '';
         $html .= "<option value=''>--Select Route</option>";
         foreach($routes as $route){
             $html .= "<option value='" . $route->id . "'>" . $route->name . "</option>";
         }
         return $html;
     }

          //Fetch route by properties.
          public function shifts_in_property(Request $request)
          {
              $request->validate([
                  'property_id'=>'required|numeric'
              ]);
              $shifts=Helper::getShiftByProperty($request->property_id); //Fetch shift by properties from helper.
              $html = '';
              $html .= "<option value=''>--Select Shift</option>";
              foreach($shifts as $shift){
                  $html .= "<option value='" . $shift->id . "'>" . $shift->name . "</option>";
              }
              return $html;
          }
}
