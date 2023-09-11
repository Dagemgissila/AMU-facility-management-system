<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreManagerDashboard extends Controller
{
  public function index(){
    return view("storemanager.dashboard");
  }
}
