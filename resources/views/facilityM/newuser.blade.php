@extends('facilityM.layouts.app')
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr> <th>Id</th>
                                             <th>Email</th>
                                             <th>Fullname</th>
                                             <th>Colleage</th>
                                             <th>Faculty</th>
                                             <th>Building Name</th>
                                             <th>Building Number</th>
                                             <th>Identity Card</th>

                                             <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                  @if ($staffs->count() > 0)
                                  @php
                                      $i=0
                                  @endphp

                                   @foreach ($staffs as $staff)
                                   <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$staff->user->email}}</td>
                                    <td>{{$staff->firstname. " " . $staff->middlename ." ".$staff->lastname}}</td>
                                    <td>{{$staff->colleage}}</td>
                                    <td>{{$staff->faculty}}</td>
                                    <td>{{$staff->building_name}}</td>
                                    <td>{{$staff->building_number}}</td>
                                    <td>
                                        <a href="{{ asset('storage/userID/' . $staff->university_id) }}" target="_blank" class="d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('storage/userID/' . $staff->university_id) }}" class="img-fluid" style="width:30%;height:10%" alt="img">
                                    </a>
                                    </td>


                                    <td class="">
                                        <div class="d-flex">
                                            <form class="mx-2" action="{{route("manager.rejectUser")}}"  method="post" >
                                                @csrf
                                                <input type="hidden" hidden name="staff_id" value="{{$staff->id}}" id="">
                                                <input type="hidden" hidden name="user_id" value="{{$staff->user->id}}">
                                                <button class="btn btn-danger">Rejecct </button>
                                            </form>
                                            <form class="mx-2" action="{{route('manager.approveUser')}}" method="post">
                                                @csrf
                                                <input type="hidden" hidden name="staff_id" value="{{$staff->id}}" id="">
                                                <input type="hidden" hidden name="user_id" value="{{$staff->user->id}}">
                                                <button class="btn btn-danger">Approve</button>
                                            </form>
                                        </div>
                                    </td>
                                   </tr>
                                   @endforeach()


                                  @endif





                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


@endsection
