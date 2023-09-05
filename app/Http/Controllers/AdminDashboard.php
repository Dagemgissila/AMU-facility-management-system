<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index(){
        $user=User::count();
        $admin=User::query()->where("role","admin")->count();
        $manager=User::query()->where("role","facility manager")->count();
        $technician=User::query()->where("role","technician")->count();
        $storeManager=User::query()->where("role","store manager")->count();
        return view('admin.dashboard',compact('user','admin',"manager","technician","storeManager"));
    }

    public function createaccount(){
       return view('admin.createaccount');
    }
}
