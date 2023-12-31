@extends('storemanager.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Request Item</h1>
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Id</th>
                                             <th>Requested BY</th>
                                             <th>Role</th>
                                             <th>Material Name</th>
                                             <th>Unit</th>
                                             <th>Quantity</th>
                                             <td>status</td>
                                             <th>action</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                  @if ($requestItem->count() > 0)
                                  @php
                                      $i=0
                                  @endphp
                                  @foreach ($requestItem as $item)


                                  <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->technician->firstname ." " . $item->technician->lastname}}</td>
                                    <td>{{$item->technician->role}}</td>
                                    <td>{{$item->items->material_name}}</td>
                                    <td>{{$item->items->unit}}</td>
                                    <td>{{$item->quantity}}</td>

                                    <td>
                                        @if($item->status == 0)
                                          <p class="text-danger font-weight-bold">pending</p>
                                        @elseif ($item->status == 2)
                                        <p class="text-danger font-weight-bold">Rejected</p>
                                        @else
                                           <p class="text-success font-weight-bold">Approved</p>
                                        @endif
                                    </td>
                                    <td>

                                        <button class="btn btn-primary">View</button>
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
