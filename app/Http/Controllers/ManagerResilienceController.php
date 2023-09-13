<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resilience;
class ManagerResilienceController extends Controller
{
   public function viewResilience(){
    if (auth()->user()->status == 0) {
        return redirect()->route("manager.changepassword");
    }
    $resilience=Resilience::all();
    return view('facilityM.resilience',compact('resilience'));
   }

   public function addResilience(Request $request){

       $this->validate($request,[
        'building_name'=>'required',
        'building_number'=>'required',
        'status'=>'required'
       ]);

       $resilience=new Resilience();
       $resilience->building_name=$request->building_name;
       $resilience->building_number=$request->building_number;
       $resilience->status=$request->status;
       $resilience->save();

       return back()->with("message","Resilience add Sucessfully");


   }

   public function deleteResilience(Request $request){

        $resilience=Resilience::find($request->resilience_id);
        $resilience->delete();

        return back()->with('message','resilience delete succesfully');
   }
}
