<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;
use App\Models\WorkTechnician;

class TechnicianAssignWorkController extends Controller
{
    public function index(){
        $myId=auth()->user()->technician->id;


        $WorkTechnician=WorkTechnician::query()->
          where("technician_id",$myId)->get();

               foreach($WorkTechnician as $rr){
                dd($rr->work_id);
          $workorders=Workorder::query()->where("status",1)->where("id","1")->get();


          dd($workorders);
        }

        return view('technician.assignedWork');
    }
}
