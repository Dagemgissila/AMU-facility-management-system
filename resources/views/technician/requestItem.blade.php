@extends('technician.layouts.app')
@section('content')
<div class="modal fade" id="addresilience" tabindex="-1" role="dialog" arian-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-titl"> Request New Item</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('technician.request')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Material required</label>
                         <select name="material_id" id="" class="form-control">
                            @if ($material->count()>0)
                            @foreach ($material as $item)
                            <option value="{{$item->id}}">{{$item->material_name . " (" . $item->unit .")"}}</option>
                            @endforeach
                            @else
                            <option value="" disabled>no item found</option>
                          @endif
                         </select>

                    </div>

                    <div class="form-group">
                        <label for="building">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="">

                    </div>
                    <button type="submit" class="btn btn-primary">Request</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Request  Item</h1>
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
                        <div class="card-header bg-white">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addresilience">
                                <i class="fa fa-plus-circle mr-1"></i>Request New Item</button>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Id</th>
                                             <th>Material Required</th>
                                             <th>Unit</th>
                                             <th>Quantity</th>
                                             <th>status</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($items->count() > 0)
                                             @php
                                                 $i=0;
                                             @endphp

                                             @foreach ($items as $item)
                                                  <tr>
                                                    <td>{{++$i}}</td>
                                                    <td>{{$item->items->material_name}}</td>
                                                    <td>{{$item->items->unit}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>
                                                        @if ($item->status ==0)
                                                             <p class="text-danger font-weight-bold">pending</p>
                                                        @elseif ($item->status == 0 )
                                                        <p class="text-danger font-weight-bold">reject</p>
                                                        @else
                                                        <p class="text-success font-weight-bold">approved</p>
                                                        @endif
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


@endsection
