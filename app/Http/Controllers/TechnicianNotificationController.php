<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TechnicianNotificationController;

class TechnicianNotificationController extends Controller
{
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        return view('technician.notification');
    }
}
