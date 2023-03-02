<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function admin_activity($id){
        return view('admin.activity');
    }

    public function guard_activity($id){
        return view('customer.guard.activity');
    }

    public function staff_activity($id){
        return view('customer.user.activity');
    }
}
