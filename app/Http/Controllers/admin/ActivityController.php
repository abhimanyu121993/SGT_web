<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\customer\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function admin_activity($id){
       
        $activities=Auth::guard(Helper::getGuard())->user()->activities;
        return view('activity',compact('activities'));
    }

    public function customer_activity($id){
        $id=Crypt::decrypt($id);
        $activities=Customer::find($id)->activities;
        return view('activity',compact('activities'));
    }

    public function staff_activity($id){
        $id=Crypt::decrypt($id);
        $activities=Admin::find($id)->activities;
        return view('activity',compact('activities'));
    }
}
