<?php

namespace App\Http\Controllers;

use App\Models\Workorder;
use App\Models\Technician;
use Illuminate\Http\Request;

class UserWorkorderController extends Controller
{
    public function index(){
        if (auth()->user()->status == 0) {
            return redirect()->route("user.changePassword");
        }
        return view('users.requestwork');
    }

    public function store(Request $request){

        $this->validate($request,[
            'work_type'=>'required',
            'work_required'=>'required'
        ]);

        $workorder=new Workorder();
        $workorder->staff_id=auth()->user()->staff->id;
        $workorder->work_type=$request->work_type;
        $workorder->work_required=$request->work_required;
        $workorder->status=0;
        $workorder->workapprove_status=0;
        $workorder->save();

        return back()->with("message","work order succesfully sent");

    }

    public function workorderStaus(){
        if (auth()->user()->status == 0) {
            return redirect()->route("user.changePassword");
        }
        $user = auth()->user()->staff;
        $staffID = $user->id;

        $workorder = Workorder::query()->where('staff_id', $staffID)->get();

        $technician_firstname = null;
        $technician_lastname = null;

        if ($workorder->isNotEmpty()) {
            $workorderW = $workorder->first()->workorderW;
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

        return view('users.workOrderStatus', compact("workorder", "technician_firstname", "technician_lastname"));
    }

    public function confirmWork(Request $request){

        Workorder::whereId($request->work_id)->update([
            'workapprove_status'=>1
        ]);

        return back()->with("message","Work is succesfully confirmed");
    }
}
