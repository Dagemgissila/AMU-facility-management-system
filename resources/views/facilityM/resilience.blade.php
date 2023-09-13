@extends('facilityM.layouts.app')
@section('content')
<div class="modal fade" id="addresilience" tabindex="-1" role="dialog" arian-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-titl"> Add New Resilience</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('manager.addResilience')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Building Name</label>
                        <input type="text" class="form-control" name="building_name" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Building Number</label>
                        <input type="number" class="form-control" name="building_number" required id="">
                    </div>
                    <div class="form-group">
                        <label for="">Location</label>
                        <input type="text" class="form-control" name="location" required id="">
                    </div>
                    <div class="form-group">
                        <label for="building">Building Status</label>
                        <select class="form-control" required name="status" id="building">
                            <option value="">Select Your Bulding Status</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>

                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Staff</h1>
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
                                <i class="fa fa-plus-circle mr-1"></i>New Resilience</button>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Id</th>
                                             <th>Building Name</th>
                                             <th>Building Number</th>
                                             <th>Location</th>
                                             <th>Staus</th>
                                             <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if ($resilience->count() > 0)
                                      @php
                                          $i=0;
                                      @endphp
                                      @foreach ($resilience as  $res)
                                      <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$res->building_name}}</td>
                                        <td>{{$res->building_number}}</td>
                                        <td>{{$res->location}}</td>
                                        <td>
                                           @if ($res->status=="pending")
                                              <p class="text-danger font-weight-bold">pending</p>
                                           @else
                                              <p class="text-success font-weight-bold">completed</p>
                                           @endif
                                    </td>
                                        <td>
                                            <form action="{{route('deleteResilience')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="resilience_id" value="{{$res->id}}" id="">
                                                <button type="submit" class="btn btn-danger">delete</button>
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


@endsection
