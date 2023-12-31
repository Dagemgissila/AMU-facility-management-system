<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserrPasswordchange extends Controller
{
    public function index(){
        return view('users.changepassword');
    }

    public function changepassword(Request $request){
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

        return back()->with("message","password change succesfuly");
    }
}
