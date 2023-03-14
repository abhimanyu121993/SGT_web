<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\PermissionName;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role_read,customer')->only('index');
        $this->middleware('permission:role_create,customer')->only('store');
        $this->middleware('permission:role_delete,customer')->only('destroy');
        $this->middleware('permission:role_edit,customer')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //for view the (Role) page.
    public function index()
    {
        $roles = Role::where('created_by',Auth::guard('customer')->user()->id)->where('guard_name',PermissionName::$customer)->get();
        return view('role_permission.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role_permission.role_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   //For store data in role table.
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
     //For show the editing page.

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $RoleEdit=Role::find($id);
        $Roles = Role::where('created_by',Auth::guard('customer')->user()->id)->where('guard_name','customer')->get();
        return view('role_permission.role_create', compact('Roles','RoleEdit'));
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
            'role' => 'required',
        ]);
        try{
       $res= Role::find($id)->update([
            'name' =>Helper::getOwner().'_'.$request->role
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
     //For deleting the data from role table.

     public function destroy($id)
     {
         $id = Crypt::decrypt($id);
      try{
        $role= Role::findOrFail($id);
         if($role->delete())
         {
             return redirect()->back()->with('success','Data Deleted successfully.');
         }
         else
         {
             return redirect()->back()->with('error','Data not deleted.');
         }  
     }
     catch(Exception $ex){
         Helper::handleError($ex);
     }
     return redirect()->back();
     }
       //For assigning the permission.
    public function assign_permission()
    {
        $admin = Auth::guard('customer')->user();
        $admin->givePermissionTo(Permission::where('guard_name', 'customer')->get());
    }

    //for active inactive roles
    public function is_active($id)
    {
        $is_active = Role::find($id);

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