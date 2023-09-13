<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use Illuminate\Http\Request;
use App\Models\WorkTechnician;

class TechnicianAssignWorkController extends Controller
{
    public function index()
    {
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        $myId = auth()->user()->technician->id;

        $WorkTechnician = WorkTechnician::where("technician_id", $myId)->get();
        $workorders = []; // Initialize an empty array

        foreach ($WorkTechnician as $rr) {
            $workorder = Workorder::where("status", 1)->where("id", $rr->work_id)->first();
            if ($workorder) {
                $workorders[] = $workorder;
            }
        }

        return view('technician.assignedWork', compact("workorders"));
    }
}
