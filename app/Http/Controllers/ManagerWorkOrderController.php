<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Workorder;
use App\Models\Technician;
use Illuminate\Http\Request;

class ManagerWorkOrderController extends Controller
{
    public function index(){
        if (auth()->user()->status == 0) {
            return redirect()->route("manager.changepassword");
        }
        $works = Workorder::query()
        ->where("status", 0)
        ->orderBy("created_at", 'desc')
        ->with('staff') // Eager load the staff relationship
        ->get();


        return view('facilityM.viewRequestWork',compact("works"));
    }

    public function viewApprovePage(Request $request){
        if(auth()->user()->status==0){
            return redirect()->route('manager.changepassword');
         }
        $work_id=$request->work_id;
        $work_type=$request->work_type;
        $staff_id=$request->staff_id;
        $work_id=$request->work_id;

        $staff=Staff::query()->where('id',$staff_id)->first();

        $technician=Technician::all();

         return view('facilityM.approveWorkOrder',compact('staff','technician','work_type','work_id'));
    }

    public function ViewApprovedWork(){
        if (auth()->user()->status == 0) {
            return redirect()->route("manager.changepassword");
        }
        $works = Workorder::query()->where("status", 1)->get();
    $technician_firstname = null;
    $technician_lastname = null;

    if ($works->isNotEmpty()) {
        $workorderW = $works->first()->workorderW;
        if ($workorderW->isNotEmpty()) {
            $technician_id = $workorderW->first()->technician_id;
            if ($technician_id) {
                $technician = Technician::find($technician_id);
                if ($technician) {
                    $technician_firstname = $technician->firstname;
                    $technician_lastname = $technician->lastname;
                }
            }
        }
    }

    return view('facilityM.ViewApproveWork', compact('works', 'technician_firstname', 'technician_lastname'));


    }
    public function ViewCompleteWork()
    {
        if (auth()->user()->status == 0) {
            return redirect()->route("manager.changepassword");
        }
        $works = Workorder::query()->where("status", 1)->where("workapprove_status", 1)->get();

        $technician_firstname = null;
        $technician_lastname = null;

        if ($works->isNotEmpty()) {
            $workorderW = $works->first()->workorderW;
            if ($workorderW->isNotEmpty()) {
                $technician_id = $workorderW->first()->technician_id;
                if ($technician_id) {
                    $technician = Technician::find($technician_id);
                    if ($technician) {
                        $technician_firstname = $technician->firstname;
                        $technician_lastname = $technician->lastname;
                    }
                }
            }
        }

        return view('facilityM.ViewApproveWork', compact('works', 'technician_firstname', 'technician_lastname'));
    }
}
