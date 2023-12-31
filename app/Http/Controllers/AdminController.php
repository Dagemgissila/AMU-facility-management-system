<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();

        if ($userCount > 0) {
            return redirect()->route('user.login');
        }

        return view('auth.adminregister');
    }

    public function registeradmin(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/',
            'confirm_password' => 'required|min:8|same:password',
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
        $user->role="admin";
        $user->status=1;
        $user->save();

        return redirect('/')->with('message', 'You have registered successfully');
    }

    public function createaccount(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|max:255',
            'role' => 'required|unique:users',
        ], [
            'role.unique' => 'The account is already created for ' . $request->role,
        ]);

        $user=new User;
        $user->role=$request->role;
        $user->email=$request->email;
        $user->password=Hash::make(12345678);
        $user->status=0;
        $user->save();

        return back()->with('message', 'Account created successfully,default password 12345678');
    }

    public function viewaccount()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin.viewaccount', compact('users'));
    }

    public function resetpassword(Request $request)
    {
        User::whereId($request->userid)->update([
            'password' => Hash::make(12345678),
            'status'=>0
        ]);

        return back()->with('message', 'Password reset successfully to 12345678');
    }

    public function deleteaccount(Request $request)
    {
        $user = User::find($request->userid);

        $user->delete();

        return back()->with('message', 'User account deleted successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("user.login");
    }
}
