<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerPasswordchange extends Controller
{
    public function index(){

        return view("facilityM.changePassword");
    }

    public function changePassword(Request $request){

        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirm_password' => 'required|same:password'
        ]);

        if(!Hash::check($request->oldpassword,auth()->user()->password)){
            return back()->with("error","incorrect old password");
        }

        User::whereId(auth()->user()->id)->update([
            "password"=>Hash::make($request->password),
            'status'=>1
        ]);

        return redirect()->route("manager.dashboard")->with("message","password change succesfuly");
    }
}
