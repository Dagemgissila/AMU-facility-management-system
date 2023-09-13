<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Requestitem;
use Illuminate\Http\Request;

class TechnicianItemController extends Controller
{
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        $material=Item::query()->orderBy("created_at","desc")->get();
        $items=Requestitem::query()->where("technician_id",auth()->user()->technician->id)->orderBy("created_at","desc")->get();
        return view('technician.requestItem',compact("items","material"));
    }

    public function requestItme(Request $request){
        $this->validate($request,[
            'material_id'=>'required',
            'quantity'=>'required|numeric'
        ]);


    $item=new Requestitem;
    $item->technician_id=auth()->user()->technician->id;
    $item->item_id=$request->material_id;
    $item->quantity=$request->quantity;

    $item->save();

    return back()->with("message","request send successfully");
    }



    }

