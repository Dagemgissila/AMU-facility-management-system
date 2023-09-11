<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;
use App\Models\WorkTechnician;

class TechnicianAssignWorkController extends Controller
{
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        $myId=auth()->user()->technician->id;


        $WorkTechnician=WorkTechnician::query()->
          where("technician_id",$myId)->get();

               foreach($WorkTechnician as $rr){

          $workorders[]=Workorder::query()->where("status",1)->where("id",$rr->work_id)->get();


        }

        return view('technician.assignedWork',compact("workorders"));
    }
}
