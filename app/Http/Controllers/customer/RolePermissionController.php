<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\PermissionName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    // open view for create permission made by super admin
    public function role_has_permission()
    {
        $roles=PermissionName::IsActiveCustomerRole()->get();
        return view('role_permission.role_permission',compact('roles'));
    }
    //For fetching the permission.

    public function fetch_permission(Request $request)
    {
        $selectrole=Role::find($request->role);
        $roles=Role::where('created_by',Auth::guard('customer')->user()->id)->where('guard_name',PermissionName::$customer)->get();
        $permissionnames=PermissionName::where('guard_name',PermissionName::$customer)->get();
        return view('role_permission.role_has_permission',compact('roles','permissionnames','selectrole'));
    }
    //For assigning the permission.

    public function assign_permission(Request $request)
    {
        $request->validate([
            'roleid'=>'required',
            'rolepermissions'=>'required'
        ]);
        $role=Role::find($request->roleid);
        $role->syncPermissions($request->rolepermissions);
        return redirect()->back()->with('success','Permission Assigned Successfully');
    }
//fetch permission accourding roles
public function all_permission($id){
    $id=Crypt::decrypt($id);
    $roles=PermissionName::IsActiveCustomerRole()->get();
    $role=Role::find($id);
    return view('role_permission.role_permission',compact('role','roles'));
 }

}
