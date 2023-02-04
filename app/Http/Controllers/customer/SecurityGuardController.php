<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\SecurityGuard;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SecurityGuardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:security guard_read,customer')->only('index');
        $this->middleware('permission:security guard_create,customer')->only('store');
        $this->middleware('permission:security guard_delete,customer')->only('destroy');
        $this->middleware('permission:security guard_edit,customer')->only('edit','update');
    }
    
    public function index()
    {
        $countries = Country::get();
        return view('customer.guard.register_guard', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (Register property) page.
    public function create()
    {
        $status=Status::where('type','guard')->get();
        $guards = SecurityGuard::where('owner_id',Helper::getOwner())->get();
        return view('customer.guard.manage_guard', compact('guards','status'));
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
            'country' =>'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'cpassword' => 'required|same:password|min:6',
            'password' => 'required|min:6',
            'email'=>'required|email|unique:security_guards,email',
            'phone'=>'required|regex:/^[6-9][0-9]{9}$/',
            'gender'=>'required',
            'name'=>'required|string',

        ]);
        try{
            $images = '';
            if($request->hasFile('images'))
            {
                $images='guard-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/security_guard/images/'),$images);
                $images = 'upload/security_guard/images/'.$images;
            }
           $res= SecurityGuard::create([
                'created_by'=>Helper::getUserId(),
                'owner_id'=>Helper::getOwner(),
                'user_id'=>time().'@'.Helper::getOwner(),
                'name' => $request->name,
                'gender'=>$request->gender??'m',
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'images'=>$images,
                'country_id'=>$request->country,
                'state_id'=>$request->state,
                'city_id'=>$request->city,
                'status'=>1,
            ]);
if($res){
    Session::flash('success', 'Guard created successfully');

}
else{
    Session::flash('error', 'Guard not created');

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
    //For show the editing page.

    public function edit($id)
    {

        $id=Crypt::decrypt($id);
        $countries = Country::get();
        $guard=SecurityGuard::find($id);
        if($guard)
        {
            return view('customer.guard.register_guard',compact('guard','countries'));
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
            'country' =>'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'email'=>'required',
            'phone'=>'required|regex:/^[6-9][0-9]{9}$/',
            'gender'=>'required',
            'name'=>'required|string',       
         ]);
        try
        {
            if($request->hasFile('images'))
            {
                $image='guard-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/security_guard/images/'),$image);
                $oldimage=SecurityGuard::find($id)->pluck('images')[0];
                File::delete(public_path($oldimage));
                SecurityGuard::find($id)->update(['images'=>'upload/security_guard/images/'.$image]);
            }
             $res= SecurityGuard::find($id)->update([ 
             'name' => $request->name,
             'gender'=>$request->gender,
             'phone'=>$request->phone,
             'email'=>$request->email,
             'country_id'=>$request->country,
             'state_id'=>$request->state,
             'city_id'=>$request->city,
        ]);
        if($res)
        {
                session()->flash('success','Guard updated sucessfully');
            }
            else
            {
                session()->flash('error','Guard not updated ');
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
                $res=SecurityGuard::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Guard deleted sucessfully');
                }
                else
                {
                    session()->flash('error','Guard not deleted ');
                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            return redirect()->back();  
          }



          public function status(Request $request)
          {
        
            try
            {
                 $res= SecurityGuard::find($request->guard_id)->update([ 
                    'status' => $request->status_id,
               ]);
            if($res)
            {
                return response()->json([
                    'success' => 'Guard status upadted' // for status 200
                ]);

                }
                else
                {
                    return response()->json([
                        'success' => 'Guard status not upadted' // for status 503
                    ]);                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            // return response()
        }
    
       
}
