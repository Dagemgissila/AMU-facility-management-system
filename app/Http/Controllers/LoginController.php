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
            if(auth()->user()->status==2){
                return back()->with("error","your account is not approved");
             }

             else{
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
                      return redirect()->route("storeM.dashboard");
                }
                else if(auth()->user()->role == 'facility manager'){

                   return redirect()->route('manager.dashboard');
                }
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
            'phone_number' => 'required|numeric|digits:10|unique:staff|unique:staff',
            'colleage' => 'required',
            'building_name' => 'required',
            'building_number' => 'required',
            'faculty' => 'required',
            'university_id' => 'required|image|mimes:jpeg,png,gif',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirm_password' => 'required|min:8|same:password'
        ], [
            'email.required' => 'Please enter an email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Please enter a password.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password must include at least one lowercase letter, one uppercase letter, one numeric digit, and one special character.',
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.min' => 'The confirm password must be at least 8 characters long.',
            'confirm_password.same' => 'The confirm password does not match the password.',
        ]);

        $user=new User;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role="user";
        $user->status=2;
        $user->save();

        $filename = $this->uploadUniversityId($request);
       $staff=new Staff;
       $staff->user_id=$user->id;
       $staff->firstname=$request->firstname;
       $staff->middlename=$request->middlename;
       $staff->lastname=$request->lastname;
       $staff->phone_number=$request->phone_number;
       $staff->colleage=$request->colleage;
       $staff->faculty=$request->faculty;
       $staff->building_name=$request->building_name;
       $staff->building_number=$request->building_number;
       $staff->university_id=$filename;
       $staff->save();



        return redirect()->route("user.login")->with('message', 'You have registered successfully. Please wait until your account is approved.');
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
