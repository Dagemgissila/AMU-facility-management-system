@extends('storemanager.layouts.app')
@section('content')
<h1>change Password</h1>
<div class="container-fluid">
    <h4>Password Requirements:</h4>
    <ul class="list-group">
      <li class="list-group-item">Should be at least 8 characters long.</li>
      <li class="list-group-item">Must include at least one uppercase letter (A-Z).</li>
      <li class="list-group-item">Must include at least one lowercase letter (a-z).</li>
      <li class="list-group-item">Must include at least one number (0-9).</li>
      <li class="list-group-item">Must include at least one special character, such as !@#$%^&*()_+=-{}[]|\:;"'<>,.?/~`.</li>
    </ul>
  </div>
<div class="row bg-white container-fluid mt-2">

     <div class="col-8">
        @if(session()->has('error'))
        <div class="bg-danger text-white">
             <p class="p-2 d-flex justify-content-center align-items-center">{{session('error')}}</p>
        </div>
       @endif
     @if(session()->has('message'))
       <div class="bg-success text-white">
             <p class="p-2 d-flex justify-content-center align-items-center">{{session('message')}}</p>
  </div>
   @endif
        <form class="user" action="{{route('storeM.changePss')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Old Password</label>
                <input type="password" name="oldpassword" class="form-control form-control-user"
                    placeholder="old password">
            </div>
            @if ($errors->has('oldpassword'))
            <div class="text-danger">{{ $errors->first('oldpassword') }}</div>
        @endif
            <div class="form-group">
                <label for="">new Password</label>
                <input type="password" name="password" class="form-control form-control-user"
                    id="exampleInputPassword" placeholder="new password">
            </div>
            @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
        @endif
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control form-control-user"
                id="exampleInputPassword" placeholder="confirm password">
        </div>
        @if ($errors->has('confirm_password'))
        <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
    @endif
            <button class="btn btn-primary btn-user btn-block">
                change Password
            </button>
        </form>
     </div>
</div>

@endsection
