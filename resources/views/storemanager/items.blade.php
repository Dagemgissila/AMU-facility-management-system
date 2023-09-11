@extends("storemanager.layouts.app")
@section("content")
<div class="modal fade" id="addresilience" tabindex="-1" role="dialog" arian-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-titl"> Add New Item</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('storeM.addItem')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Item Name</label>
                        <input type="text" class="form-control" required name="item_name" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Unit</label>
                        <input type="text" class="form-control" required name="unit" id="">
                    </div>
                    <div class="form-group">
                        <label for="">amount</label>
                        <input type="number" class="form-control" min="1"  required name="amount" id="">
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Item</h1>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        @if(session()->has('message'))
                        <div class="bg-success text-white">
                          <p class="p-2 d-flex justify-content-center align-items-center">   {{session('message')}}</p>
                        </div>
                        @endif

                        @if(session()->has('error'))
                        <div class="bg-danger text-white">
                          <p class="p-2 d-flex justify-content-center align-items-center">   {{session('error')}}</p>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="bg-danger text-white">
                          @foreach ($errors->all() as $error)
                          <p class="px-2 py-1 my-0 d-flex justify-content-center align-items-center">   {{$error}}</p>
                          @endforeach
                        </div>
                      @endif

                        <div class="card-header bg-white">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresilience">
                                <i class="fa fa-plus-circle mr-1"></i>Add New Item</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Unit</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($items->count()>0)
                                        @php
                                            $i=0;
                                        @endphp

                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$item->material_name}}</td>
                                            <td>{{$item->unit}}</td>
                                            <td>{{$item->amount}}</td>
                                            <td>
                                                <form action="{{route('storeM.editItem')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="item_id" value="{{$item->id}}">

                                                    <button type="submit" class="btn btn-primary">edit</button>
                                                </form>

                                            </td>
                                        </tr>
                                        @endforeach

                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <!-- /.container-fluid -->
@endsection
