<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function index(){
        if (auth()->user()->status == 0) {
            return redirect()->route("user.changePassword");
        }

        $workorder=Workorder::query()->where("staff_id",auth()->user()->staff->id)->count();
        return view('users.dashboard',compact("workorder"));
    }
}
