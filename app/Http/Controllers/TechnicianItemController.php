<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class TechnicianItemController extends Controller
{
    public function index(){
        if (auth()->user()->status == 2) {
            return redirect()->route("technician.changePassword");
        }
        $items=Item::query()->orderBy("created_at","desc")->get();
        return view('technician.requestItem',compact("items"));
    }

    public function requestItme(Request $request){
        $this->validate($request,[
            'material_required'=>'required',
            'unit'=>'required|numeric',
            'quantity'=>'required|numeric'
        ]);

    $item=new Item;
    $item->technician_id=auth()->user()->technician->id;
    $item->material_required=$request->material_required;
    $item->quantity=$request->quantity;
    $item->unit=$request->unit;
    $item->save();

    return back()->with("message","request send successfully");
    }
}
