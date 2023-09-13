<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreManagerDashboard extends Controller
{
  public function index(){

    if (auth()->user()->status == 0) {

        return redirect()->route("storeM.changepassword");
    }

    return view("storemanager.dashboard");
  }
}
