<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Activitylog\Models\Activity;

class ActivityController extends Controller
{
    public function admin_activity($id){
        $id=Crypt::decrypt($id);
         $activities=Activity::where('causer_type','App\Models\admin\Admin')->where('causer_id',$id)->get();
        return view('admin.activity',compact('activities'));
    }

    public function customer_activity($id){
        return view('admin.customer.activity');
    }

    public function staff_activity($id){
        return view('user.activity');
    }
}
