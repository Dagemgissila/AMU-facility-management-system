<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class StoreDashboard extends Controller
{
    public function index(){
        $items=Item::all();

        return view("storemanager.dashboard",compact("items"));
    }
}
