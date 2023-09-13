<?php

namespace App\Http\Controllers;

use App\Models\Requestitem;
use Illuminate\Http\Request;

class TechnicianDashboardController extends Controller
{
    //
    public function index(){
        if (auth()->user()->status == 0) {
            return redirect()->route("technician.changePassword");
        }

        $requestItem=Requestitem::query()->where("technician_id",auth()->user()->technician->userr->id)->count();

        return view('technician.dashboard',compact('requestItem'));
    }

    public function changePpage(){

        return view("technician.changepassword");
    }
}
