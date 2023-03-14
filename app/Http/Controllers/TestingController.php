<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
   public function generalReport()
   {
  return view('test.general_report');
   }
   public function NewgeneralReport()
   {
  return view('test.new_general_report');
   }


   public function guardtrack()
   {
  return view('test.track_guard');
   }

   
} 
