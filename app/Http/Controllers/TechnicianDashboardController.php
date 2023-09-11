<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnicianDashboardController extends Controller
{
    //
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        return view('technician.dashboard');
    }

    public function changePpage(){

        return view("technician.changepassword");
    }
}
