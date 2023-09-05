@extends('facilityM.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Approved Work</h1>
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
                                             <th>Work type</th>
                                             <th>Work Required</th>
                                             <th>Work Status</th>

                                             <th>Assigned Technician</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                  @if ($works->count() > 0)
                                  @php
                                      $i=0
                                  @endphp
                                  @foreach ($works as $work)


                                  <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$work->staff->firstname ." " . $work->staff->middlename}}</td>
                                    <td>{{$work->work_type}}</td>
                                    <td>{{$work->work_required}}</td>
                                    <td>
                                        @if($work->status == 0 && $work->workapprove_status == 0)
                                          <p class="text-danger font-weight-bold">incomplete</p>
                                        @else
                                           <p class="text-success font-weight-bold">completed</p>
                                        @endif
                                    </td>
                                    <td>
                                      {{$technician_firstname ." " . $technician_lastname}}
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
