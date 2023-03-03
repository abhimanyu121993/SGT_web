<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function admin_activity($id){
        return view('admin.activity');
    }

    public function customer_activity($id){
        return view('admin.customer.activity');
    }

    public function staff_activity($id){
        return view('user.activity');
    }
}
