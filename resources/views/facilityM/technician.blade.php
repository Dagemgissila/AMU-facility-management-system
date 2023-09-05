@extends('facilityM.layouts.app')
@section('content')
<div class="modal fade" id="addresilience" tabindex="-1" role="dialog" arian-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-titl"> Add New Technician</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('manager.addTechnician')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Fistname</label>
                        <input type="text" class="form-control" required name="firstname" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" required name="lastname" id="">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="email" class="form-control"  required name="email" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role"  required class="form-control">
                            <option value="">Select work type</option>
                            <option value="Electrician ">Electrician </option>
                            <option value="Plumber ">Plumber </option>
                            <option value="Carpenter ">Carpenter </option>
                            <option value="Metalworker ">Metalworker </option>
                            <option value="Mason  ">Mason </option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Technician</h1>
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
                                <i class="fa fa-plus-circle mr-1"></i>New Technician</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Technician Name</th>
                                            <th>Email</th>
                                            <th>Technician Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($technician->count() > 0)
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($technician as $tech)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $tech->firstname . " " . $tech->lastname }}</td>
                                                    <td>{{ $tech->userr->email }}</td>
                                                    <td>{{ $tech->role }}</td>
                                                    <td>

                                                        <form action="{{ route('manager.deleteTechnician') }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $tech->userr->id }}">
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">No technicians found.</td>
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
