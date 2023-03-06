<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
   public function generalReport()
   {
  return view('test.general_report');
   }
} 
