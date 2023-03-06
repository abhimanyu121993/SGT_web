<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Customer;
use App\Models\SecurityGuard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ActivityController extends Controller
{
    public function admin_activity($id){
        $activities=Auth::guard(Helper::getGuard())->user()->activities;
        return view('activity',compact('activities'));
    }

    public function guard_activity($id){
        $id=Crypt::decrypt($id);
        $activities=SecurityGuard::find($id)->activities;
        return view('activity',compact('activities'));
    }

    public function staff_activity($id){
        $id=Crypt::decrypt($id);
        $activities=Customer::find($id)->activities;
        return view('activity',compact('activities'));
    }
}
