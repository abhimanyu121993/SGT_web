<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    // open view for create permission made by super admin
    public function permission()
    {
        return view('role_permission.permission');
    }
}
