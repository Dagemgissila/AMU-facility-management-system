<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerStaffController extends Controller
{
    public function addstaff(){
        return view('facilityM.addstaff');
    }

    public function store(Request $request){
        $this->validate($request,[
            'username'=>'required|unique:users',
            'fullname'=>'required',
            'location'=>'required',
            'floornumber'=>'required|numeric',
            'roomnumber'=>'required|numeric',
            'colleage'=>'required',
            'faculty'=>'required'
        ]);

        $user=new User;
        $user->username=$request->username;
        $user->password=Hash::make(12345678);
        $user->role='staff';
        $user->save();

        $staff=new Staff;
        $staff->user_id=$user->id;
        $staff->fullname=$request->fullname;
        $staff->location=$request->location;
        $staff->floornumber=$request->floornumber;
        $staff->roomnumber=$request->roomnumber;
        $staff->colleage=$request->colleage;
        $staff->faculty=$request->faculty;
        $staff->save();

        return back()->with('message','user added succesfully');

    }

    public function viewstaff(){
          $staffs=Staff::query()->where('status',1)->get();

          return view('facilityM.viewstaff',compact('staffs'));
    }

    public function newUser(){
        $staffs=Staff::query()->where('status',0)->get();

        return view('facilityM.newuser',compact('staffs'));
    }
     public function appproveUser(Request $request){

           Staff::whereId($request->staff_id)->update([
            'status'=>1
           ]);

           return redirect()->route('viewstaff')->with("message","approved succesfull");
     }
    public function show($id){
       $user=User::find($id);

      return view('facilityM.editsatff',compact('user'));
    }

    public function editstaff(Request $request,$id){
        $staff=Staff::find($id);
        $this->validate($request,[
            'username'=>'required',
            'fullname'=>'required',
            'location'=>'required',
            'floornumber'=>'required|numeric',
            'roomnumber'=>'required|numeric',
            'colleage'=>'required',
            'faculty'=>'required'
        ]);

        User::whereId($staff->user->id)->update([
            'username'=>$request->username
        ]);

        $staff->fullname=$request->fullname;
        $staff->location=$request->location;
        $staff->floornumber=$request->floornumber;
        $staff->roomnumber=$request->roomnumber;
        $staff->colleage=$request->colleage;
        $staff->faculty=$request->faculty;
        $staff->save();
        return redirect()->route('viewstaff')->with('message','update succesfully');

    }

    public function deletestaff(Request $request){

          $user=User::find($request->userid);

          $user->delete();
          return back()->with('message','user delete succesfully');

    }
}
