<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class StoreDashboard extends Controller
{
    public function index(){
        if (auth()->user()->status == 0) {

            return redirect()->route("storeM.changepassword");
        }


        $items=Item::all();

        return view("storemanager.dashboard",compact("items"));
    }
}
