@extends('technician.layouts.app')
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
                                             <th>User PhoneNumber</th>
                                             <th>Building Name</th>
                                             <th>Building Number</th>
                                             <th>Work type</th>
                                             <th>Work Required</th>

                                             <th>Approved By User?</th>



                                        </tr>

                                    </thead>
                                    <tbody>
                                        @if(count($workorders) > 0)
                                        @php
                                        $i = 0;
                                        @endphp
                                       @foreach ($workorders as $work)
                                       <tr>
                                           <td>{{ ++$i }}</td>
                                           <td>{{ $work->first()->staff->firstname . " " . $work->first()->staff->lastname }}</td>
                                           <td>{{ $work->first()->staff->phone_number }}</td>
                                           <td> {{$work->first()->staff->building_name }}</td>
                                           <td> {{$work->first()->staff->building_number }}</td>
                                           <td>{{ $work->first()->work_type }}</td>
                                           <td>{{ $work->first()->work_required }}</td>
                                           <td>
                                               @if ($work->first()->workapprove_status == 0)
                                                     <p class="btn btn-danger">No</p>
                                               @else
                                                    <p class="btn btn-success">Yes</p>
                                               @endif
                                           </td>
                                       </tr>
                                   @endforeach
                                        @else
                                        <tr>
                                            <td colspan="5">No assigned Work</td>
                                        </tr>
                                        @endif
                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


@endsection
