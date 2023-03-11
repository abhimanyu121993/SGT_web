<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUpload;
use App\Models\Country;
use App\Models\customer\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:property_read,admin')->only('index');
        $this->middleware('permission:property_create,admin')->only('store');
        $this->middleware('permission:property_delete,admin')->only('destroy');
        $this->middleware('permission:property_edit,admin')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::get();
        return view('admin.customer.add_property', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (Register property) page.
    public function create()
    {
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
            'longitude'=>'required',
            'images'=>'required',
        ]);
        try{

            $mainpic=[];
            if($request->hasFile('property_pic'))
            {
                foreach($request->file('property_pic') as $file)
                {
                    $prop_name='prop-'.time().'-'.rand(0,99).'.'.$file->extension();
                    $path=$file->storeAs('property',$prop_name,'public');

                    $mainpic []=$path;
                }
            }
           
           $res= Property::create([
                'created_by'=>Helper::getCustomerBySession()->id,
                'owner_id'=>Helper::getCustomerBySession()->id,
                'name' => $request->name,
                'country' => $request->country ?? '',
                'state' => $request->state ?? '',
                'city' => $request->city ?? '',
                'postcode' => $request->postcode ?? '',
                'address' => $request->address ?? '',
                'lattitude' => $request->lattitude ?? '',
                'longitude' => $request->longitude ?? '',
                'file'=>$request->hasFile('images')?ImageUpload::simpleUpload('property',$request->images,'property'):'',
                'property_pics' => json_encode($mainpic),


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
    Session::put('customer',$id);
        $properties = Property::where('owner_id',Helper::getCustomerBySession()->id)->get();
        return view('admin.customer.property', compact('properties'));
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
            return view('admin.customer.add_property',compact('propertyEdit','countries'));
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
            'city' => 'required',
            'state' => 'required',
            'country' =>'required',
            'name' => 'required',
        ]);
        try
        {
            if($request->hasFile('property_pic'))
        {
            foreach($request->file('property_pic') as $file)
            {
                $prop_name='prop-'.time().'-'.rand(0,99).'.'.$file->extension();
                $path=$file->storeAs('property',$prop_name,'public');
                $mainpic[]=$path;
            }
        }
           if (count($mainpic) > 0) {
            Property::find($id)->update(['property_pics' => json_encode($mainpic)]);
            }
          
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
        public function add_property($id){
            $id=Crypt::decrypt($id);
            $owner_id=$id;
            $countries = Country::get();
            return view('admin.customer.add_property', compact('countries','owner_id'));
        }
        
        }
