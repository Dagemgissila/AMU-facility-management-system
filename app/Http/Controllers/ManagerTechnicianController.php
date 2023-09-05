<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workorder;
use App\Models\Technician;
use Illuminate\Http\Request;
use App\Models\WorkTechnician;
use Illuminate\Support\Facades\Hash;

class ManagerTechnicianController extends Controller
{
   public function index(){
    $technician=Technician::query()->orderBy("created_at","desc")->get();

    return view('facilityM.technician',compact('technician'));
   }

   public function addTechnician(Request $request){{
    $this->validate($request,[
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required|email|unique:users',
        'role'=>'required',
    ]);

    $user=new User;
    $user->email=$request->email;
    $user->password=Hash::make(12345678);
    $user->role="technician";
    $user->save();

    $technician=new Technician;
    $technician->user_id=$user->id;
    $technician->firstname=$request->firstname;
    $technician->lastname=$request->lastname;
    $technician->role=$request->role;
    $technician->save();

    return back()->with("message","Technician added succesfully");

   }

   }

   public function AssignTechnician(Request $request){
    $this->validate($request,[
        'technician_id'=>'required|exists:technicians,id',
        'work_id'=>'required'
    ]);

    $worktechnicain=new WorkTechnician;
    $worktechnicain->work_id=$request->work_id;
    $worktechnicain->technician_id=$request->technician_id;
    $worktechnicain->save();

    Workorder::whereId($request->work_id)->update([
      'status'=>1
    ]);

    return redirect()->route("manager.ViewApprovedWork")->with("message","technician assign successfully");

   }
}
