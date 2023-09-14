<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Requestitem;
use Illuminate\Http\Request;

class StoreManagerItem extends Controller
{
    public function index(){

    if (auth()->user()->status == 0) {

        return redirect()->route("storeM.changepassword");
    }
        $items=Item::all();
        return view("storemanager.items",compact("items"));
    }

    public function addItem(Request $request){
        $this->validate($request,[
            'item_name'=>'required',

            'amount'=>'required'
        ]);

        $item=new Item;
        $item->material_name=$request->item_name;
        $item->unit=$request->unit;
        $item->amount=$request->amount;
        $item->save();

        return back()->with("message","item added succesfully");
    }

    public function editItem(Request $request){

        $item=Item::find($request->item_id);

        return view("storemanager.editItem",compact("item"));
    }

    public function edit(Request $request){
        $this->validate($request,[
            'item_name'=>'required',
            'unit'=>'required',
            'amount'=>'required'
        ]);


        Item::whereId($request->item_id)->update([
            "material_name"=>$request->item_name,
            'unit'=>$request->unit,
            "amount"=>$request->amount
        ]);

        return redirect()->route("storeM.viewItem")->with("message","update succesfully");
    }

    public function viewApproveItem(){

    if (auth()->user()->status == 0) {

        return redirect()->route("storeM.changepassword");
    }

        $requestItem=Requestitem::query()->where("status",1)->orderBy("created_at","desc")->get();

        return view("storemanager.approveditem",compact("requestItem"));
    }
}
