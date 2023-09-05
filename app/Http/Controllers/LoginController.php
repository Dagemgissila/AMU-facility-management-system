<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Resilience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        $user=User::count();
        if($user<1){
            return redirect()->route('admin.register');
        }
        return view('auth.login');
    }

    public function UserLogin(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if(auth()->user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }

            else if(auth()->user()->role == 'technician'){
                return redirect()->route('technician.dashboard');
            }

            else if(auth()->user()->role == 'user'){

                    return redirect()->route('staff.dashboard');
            }

            else if(auth()->user()->role == 'store manager'){

            }
            else if(auth()->user()->role == 'facility manager'){
               return redirect()->route('manager.dashboard');
            }

        }

        else{
            return redirect()->back()->with('error','Invalid login detail');
        }
    }

    public function registerPage(){
        $user=User::count();
        if($user<1){
            return redirect()->route('admin.register');
        }
        $resilience=Resilience::all();
        return view('auth.userregister',compact('resilience'));
    }
    public function useRegister(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'phone_number' => 'required|numeric|digits:10|unique:staff',
            'colleage' => 'required',
            'building_name' => 'required',
            'building_number' => 'required',
            'faculty' => 'required',
            'university_id' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'email' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 0
        ]);

        $filename = $this->uploadUniversityId($request);

        $staff = Staff::create([
            'user_id' => $user->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            'colleage' => $request->colleage,
            'faculty' => $request->faculty,
            'building_name' => $request->building_name,
            'building_number' => $request->building_number,
            'university_id' => $filename
        ]);

        return back()->with('message', 'You have registered successfully. Please wait until your account is approved.');
    }

    private function uploadUniversityId(Request $request)
    {
        if ($request->hasFile('university_id')) {
            $file = $request->file('university_id');
            if ($file->isValid()) {
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/userID', $filename);
                return $filename;
            } else {
                // Handle the case when the uploaded file is not valid
                // You can display an error message or take appropriate action here
                dd("Invalid file");
            }
        } else {
            // Handle the case when the 'university_id' file is not uploaded
            // You can display an error message or take appropriate action here
            dd("No file uploaded");
        }
    }
}
