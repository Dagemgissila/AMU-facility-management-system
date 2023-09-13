@extends('facilityM.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Approve Work Order and Assign Technician</h1>

</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="">
                    @if(session()->has('message'))
                        <div class="bg-success text-white">
                            <p class="p-2 d-flex justify-content-center align-items-center">{{session('message')}}</p>
                        </div>
                    @endif
                    <h4>User Info</h4>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>Building Name</th>
                                    <th>Building Number</th>
                                    <th>location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staff as $st)
                                    <tr>
                                        <td>{{$st->firstname . ' ' . $st->lastname}}</td>
                                        <td>{{$st->building_name}}</td>
                                        <td>{{$st->building_number}}</td>
                                        <td>{{$st->location}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <div class="col-md-12 mt-4">
    <div class="card">
      <div class="card-body">
        <form action="{{route('manager.AssignTechnician')}}" method="POST" >
            @csrf

            <h4>Assign Technician</h4>
            <hr>
                <div class="row">

                   <div class="col-md-6">
                    <input type="hidden" name="work_id" value="{{$work_id}}" id="">
                       <div class="form-group">
                           <label for="">Technician Name/work role ::{{$work_type}}</label>
                           <input type="text" class="form-control" value="" name="technician_id" list="technician" >
                          <datalist id="technician">
                            @if ($technician->count() > 0)


                            @foreach ($technician as $tech)
                                 <option value="{{$tech->id}}">{{$tech->firstname . " " .$tech->lastname ." /  " . $tech->role}}</option>
                            @endforeach

                            @endif
                          </datalist>
                         </div>
                         @if ($errors->has('email'))
                         <div class="text-danger">{{ $errors->first('email') }}</div>
                     @endif
                   </div>

                </div>
                <button class="btn btn-success">Assign Technician and Approve Work</button>
           </form>

      </div>
    </div>
   </div>
</div>
@endsection
