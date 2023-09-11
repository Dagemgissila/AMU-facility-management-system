@extends("storemanager.layouts.app")
@section("content")
<h1>edit</h1>
<div class="row container-fluid bg-white">
    <div class="col-6">
        <form action="{{route('storeM.edit')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="">Item Name</label>
                <input type="text" class="form-control" value="{{$item->material_name}}" required name="item_name" id="">
            </div>
            <div class="form-group">
                <label for="">Unit</label>
                <input type="text" class="form-control" value="{{$item->unit}}" required name="unit" id="">
            </div>
            <div class="form-group">
                <label for="">amount</label>
                <input type="number" class="form-control" value="{{$item->amount}}" min="1"  required name="amount" id="">
            </div>
            <input type="hidden" name="item_id" value="{{$item->id}}">

            <button type="submit" class="btn btn-primary">save</button>
        </form>
    </div>
</div>
@endsection
