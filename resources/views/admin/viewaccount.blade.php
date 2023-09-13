@extends('admin.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">View Account</h1>
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
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>role</th>
                                            <th>action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                   @if ($users->count() > 0)

                                    @php
                                        $i=0;
                                    @endphp

                                   @foreach ($users as $user)
                                   <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td class="d-flex"> <form action="{{route('admin.resetpassword')}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="userid" value="{{$user->id}}" id="">
                                        <button class="btn btn-primary">Reset Password</button>
                                    </form>
                                    <form class="mx-2" action="{{route('admin.deleteaccount')}}" method="post">
                                        @csrf
                                        <input type="text" hidden name="userid" value="{{$user->id}}" id="">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </tr>
                                   @endforeach ()



                                   @endif



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


@endsection
