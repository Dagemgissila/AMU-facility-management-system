<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $user=User::count();
        if($user<1){
            return redirect()->route('admin.register');
        }
        return view("auth.home");
    }
}
