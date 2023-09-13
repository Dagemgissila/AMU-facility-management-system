@extends('admin.layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create Account</h1>

</div>
<div class="row">

   <div class="col-md-10">
    <div class="card">
      <div class="card-body">
        <form action="{{route('admin.createaccount')}}" method="POST" >
            @csrf

            @if(session()->has('message'))
            <div class="bg-success text-white">
              <p class="p-2 d-flex justify-content-center align-items-center">   {{session('message')}}</p>
            </div>
            @endif
                <div class="row">

                   <div class="col-md-6">
                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder=" enter your email" >
                         </div>
                         @if ($errors->has('email'))
                         <div class="text-danger">{{ $errors->first('email') }}</div>
                     @endif
                   </div>
                   <div class="col-md-6">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" style="width: 100%;" id="role" >
                            <option value="">select the role</option>

                            <option value="facility manager" {{ old('role') == 'facility_manager' ? 'selected' : '' }}>Facility Manager</option>
                            <option value="store manager" {{ old('role') == 'store_manager' ? 'selected' : '' }}>Store Manager</option>
                        </select>
                    </div>

                    @if ($errors->has('role'))
                        <div class="text-danger">{{ $errors->first('role') }}</div>
                    @endif
                </div>
                </div>
                <button class="btn btn-primary">create account</button>
           </form>

      </div>
    </div>
   </div>
</div>
@endsection
