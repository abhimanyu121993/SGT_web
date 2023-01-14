<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PermissionName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    // open view for create permission made by super admin
    public function rolePermission()
    {
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id)->where('guard_name','admin')->get();
        return view('role_permission.role_permission',compact('roles'));
    }

    public function fetchPermission(Request $request)
    {
        $selectrole=Role::find($request->role);
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id)->where('guard_name','admin')->get();
        $permissionnames=PermissionName::where('guard_name','admin')->get();
        return view('role_permission.role_permission',compact('roles','permissionnames','selectrole'));
    }

    public function assignPermission(Request $request)
    {
        $request->validate([
            'roleid'=>'required',
            'rolepermissions'=>'required'
        ]);
        $role=Role::find($request->roleid);
        $role->syncPermissions($request->rolepermissions);
        return redirect()->route('superadmin.role-permission.role-has-permission')->with('success','Permission Assigned Successfully');
    }
}
