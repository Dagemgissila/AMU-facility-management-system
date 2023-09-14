@extends('users.layouts.app')
@section('content')
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
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Id</th>

                                             <th>Work Type</th>
                                             <th>Work Required</th>

                                             <th>Status</th>
                                             <th>action</th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                  
                                    
                                          @if($me->count() > 0)
                               @php
                               
                                   $i=0;
                               @endphp
                       @foreach ($me as $work)
                       <tr>
                                <td>{{++$i}}</td>
                                <td>{{$work->work_type}}</td>
                                <td>{{$work->work_required}}</td>
                                <td>
                                    @if ($work->status ==0)
                                         <p class="text-danger">pending</p>
                                    @else
                                         <p class="text-success">approved</p>
                                         <p class="text-success font-weight-bold"> Assigned Technician is  {{$technician_firstname . " " .$technician_lastname}}</p>
                                    @endif
                                </td>
                                <td>

                                    <form action="{{route('user.confirmWork')}}" method="post">
                                        @csrf
                                              <input type="hidden"

                                               name="work_id" value="{{$work->id}}" id="">
                                              @if ($work->status == 0)
                                              <button disabled type="submit" class="btn btn-warning">pending</button>
                                              @elseif ($work->status == 1 && $work->workapprove_status == 1)
                                              <button disabled  type="submit" class="btn btn-primary">Work is confirmed</button>
                                              @else
                                              <button  type="submit" class="btn btn-success">confirm Work</button>
                                              @endif
                                    </form>
                                </td>
                            </tr>
                       @endforeach

                                    </tbody>
                                    @else

                                    
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


@endsection
