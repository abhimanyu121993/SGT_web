<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function dashboard()
    {
        return view('superadmin.dashboard');
    }
}
