@extends('facilityM.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Staff</h1>

</div>
<div class="row">

   <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form action="{{route('addstaff')}}" method="POST" >
            @csrf

            @if(session()->has('message'))
            <div class="bg-success text-white">
              <p class="p-2 d-flex justify-content-center align-items-center">   {{session('message')}}</p>
            </div>
            @endif
                <div class="row">

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="username">User Name</label>
                           <input type="text" class="form-control" value="{{ old('username') }}" name="username" id="username" placeholder=" enter user name" >
                         </div>
                         @if ($errors->has('username'))
                         <div class="text-danger">{{ $errors->first('username') }}</div>
                     @endif
                   </div>

                   <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Full Name</label>
                        <input type="text" class="form-control" value="{{ old('fullname') }}" name="fullname" id="username" placeholder=" enter fullname" >
                      </div>
                      @if ($errors->has('fullname'))
                      <div class="text-danger">{{ $errors->first('fullname') }}</div>
                  @endif

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Location</label>
                        <input type="text" class="form-control" value="{{ old('location') }}" name="location" id="username" placeholder=" enter location" >
                      </div>
                      @if ($errors->has('location'))
                      <div class="text-danger">{{ $errors->first('location') }}</div>
                  @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Floor Number</label>
                        <input type="number" class="form-control" value="{{ old('floornumber') }}" name="floornumber" id="username" placeholder=" enter number floor" >
                      </div>
                      @if ($errors->has('floornumber'))
                      <div class="text-danger">{{ $errors->first('floornumber') }}</div>
                  @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Room Number</label>
                        <input type="number" class="form-control" value="{{ old('roomnumber') }}" name="roomnumber" id="username" placeholder=" enter number room" >
                      </div>
                      @if ($errors->has('roomnumber'))
                      <div class="text-danger">{{ $errors->first('roomnumber') }}</div>
                  @endif
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="campus">Colleage</label>
                        <select name="colleage"  value="{{old('colleage')}}" class="form-control" style="width: 100%;" id="role-select" required>
                            <option value="amit">Amit</option>
                            <option value="amit">Awit</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="campus">Faculty</label>
                        <select name="faculty"  value="{{old('faculty')}}" class="form-control" style="width: 100%;" id="role-select" required>
                            <option value="Faculty of Computing & Software Enginering">Faculty of Computing & Software Enginering</option>
                            <option value="Electrical & Computing Engineering">Electrical & Computing Engineering</option>
                        </select>
                    </div>
                </div>


             </div>

                <button class="btn btn-primary">Add Staff</button>
           </form>

      </div>
    </div>
   </div>
</div>
@endsection
