<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Roles = Role::where('created_by',Auth::guard('customer')->user()->id ?? '')->where('guard_name','customer')->get();
        return view('role_permission.role', compact('Roles'));
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
        $request->validate([
            'role' => 'required',
        ]);
        try{ 
       $res= Role::create([
            'name' => Auth::guard('customer')->user()->id.'_'.$request->role,
            'guard_name' => 'customer',
            'created_by'=>Auth::guard('customer')->user()->id
        ]);
        if($res){
           session()->flash('success','Role has been created successfully.');
        }
        else{
           session()->flash('success','Role not created.');
        }
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
        $id = Crypt::decrypt($id);
        $RoleEdit=Role::find($id);
        $Roles = Role::where('created_by',Auth::guard('customer')->user()->id)->where('guard_name','customer')->get();
        return view('role_permission.role', compact('Roles','RoleEdit'));
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
        $request->validate([
            'role' => 'required',
        ]);
        try{
       $res= Role::find($id)->update([
            'name' => $request->role
        ]);
        if($res){
            session()->flash('success','Role has been updated successfully.'); 
        }
        else{
            session()->flash('success','Role not updated.'); 
        }
    }
    catch(Exception $ex){
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
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        try{
        $data=Role::find($id);
        if($data->delete())
        {
           session()->flash('success','Data Deleted successfully.');
        }
        else
        {
           session()->flash('error','Data not deleted.');
        }  
    }
    catch(Exception $ex){
        Helper::handleError($ex);
    }
    return redirect()->back();  
    }
}