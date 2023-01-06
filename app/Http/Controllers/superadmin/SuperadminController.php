<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SuperadminController extends Controller
{
    public function dashboard()
    {
        App::setLocale('hi');
        echo base_path('view.lang.en.sidebar.php');
        // return view('superadmin.dashboard');
    }
}
