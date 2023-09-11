<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workorder;
use App\Models\Resilience;
use App\Models\Technician;
use Illuminate\Http\Request;

class ManagerDashboardController extends Controller
{
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("manager.changepassword");
        }
        $user=User::query()->where("role","user")->count();
        $activeuser=User::query()->where("role","user")->where("status",1)->count();
        $inactiveUser=User::query()->where("role","user")->where("status",0)->count();
        $totalworkorder=Workorder::count();
        $resilience=Resilience::count();
        $completedReselence=Resilience::query()->where("status",1)->count();
        $incompleteResilience=Resilience::query()->where("status",0)->count();
         $technician=Technician::count();
        return view('facilityM.dashboard'
        ,compact("user","totalworkorder",
        "resilience","technician","activeuser","inactiveUser","completedReselence","incompleteResilience"));
    }

    public function deleteT(Request $request)
{
    $userId = $request->id;
    $user = User::find($userId);

    if ($user) {
        $user->delete();
        return back()->with("message", "User deleted successfully");
    } else {
        return back()->with("message", "User not found");
    }
}
}
