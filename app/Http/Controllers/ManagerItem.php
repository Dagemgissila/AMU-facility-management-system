<?php

namespace App\Http\Controllers;

use App\Models\Requestitem;
use Illuminate\Http\Request;

class ManagerItem extends Controller
{
    public function index(){
        $requestItem=Requestitem::query()->orderBy("created_at","desc")->get();

        return view("facilityM.ViewRequestItem",compact("requestItem"));
    }

    public function approveItem(Request $request){
        $item=Requestitem::find($request->item_id);

        Requestitem::whereId($request->item_id)->update([
            "status"=>1
        ]);

        return back()->with("message","item approved succesfully");

    }

    public function rejectItem(Request $request){
        Requestitem::whereId($request->item_id)->update([
            "status"=>2
        ]);

        return back()->with("message","request is rejected");
    }
}
