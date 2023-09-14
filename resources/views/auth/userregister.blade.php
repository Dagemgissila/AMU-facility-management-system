

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Facility Management System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">


  <style>
     body {
    max-width: 100%;
max-height: 100%
    height: 90vh;
    background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('img/photo_2019-11-03_16-12-19.jpg') repeat;
    background-size: cover;
    animation: slideshow 14s infinite;
  }

  @keyframes slideshow {
      0% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2019-12-23_11-11-12.jpg') }}');
      }
      20% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2021-11-14_10-23-42.jpg') }}');
      }
      40% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2021-04-09_11-23-04.jpg') }}');
      }
      60% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2021-05-09_09-42-14.jpg') }}');
      }
      80% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2021-05-09_09-41-29.jpg') }}');
      }
      100% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('img/photo_2021-06-03_03-22-32.jpg') }}');
      }
    }
    h1 {
    text-align: center;
    color: white;
     font-family: Arial, Helvetica, sans-serif;
     font-size: 100px;
    padding: 10px;
  }
  section.container {
    background-color: none;
  }

  section.container h1 {

    font-size: 44px;
    font-family: Arial, sans-serif;
  }
  .car{
    background: rgba(214, 208, 208, 0.5);

  }
  </style>

</head>

<body>
  <header class="py-1">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="{{asset('img/ArbaMinchUniversity-logo_0.gif')}}" alt="Logo" style="width:130px">
      <nav>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="{{route('home')}}" class="text-white">Home</a></li>
          <li class="list-inline-item"><a href="{{route('user.login')}}" class="text-white">Login</a></li>
          <li class="list-inline-item"><a href="{{route('user.register')}}" class="text-white">Register</a></li>

          <li class="list-inline-item"><a href="{{route('aboutus')}}" class="text-white">About Us</a></li>
        </ul>
      </nav>
    </div>
  </header>

 <section class="container mx-auto p-4">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="car o-hidden border-0 shadow-lg my-1">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row p-4">

                            <div class="col-lg-12">
                                <div class="p-3">

                                    <div class="text-center">

                                        <h1 class="h4 text-gray-900 mb-4">User Registration</h1>
                                    </div>
                                    @if(session()->has('message'))
                                    <div class="bg-info text-white">
                                        <p class="p-2 d-flex justify-content-center align-items-center">{{session('message')}}</p>
                                   </div>
                                    @endif

                                    <form action="{{ route('userRegister') }}" method="POST" enctype="multipart/form-data">
                                        @csrf



                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="firstname" class="text-white font-weight-bold">First Name</label>
                                                    <input type="text" class="form-control" value="{{ old('firstname') }}" name="firstname" id="firstname" placeholder="Enter first name">
                                                    @if ($errors->has('firstname'))
                                                    <div class="text-danger">{{ $errors->first('firstname') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="middlename" class="text-white font-weight-bold">Middle Name</label>
                                                    <input type="text" class="form-control" value="{{ old('middlename') }}" name="middlename" id="middlename" placeholder="Enter middle name">
                                                    @if ($errors->has('middlename'))
                                                    <div class="text-danger">{{ $errors->first('middlename') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname" class="text-white font-weight-bold">Last Name</label>
                                                    <input type="text" class="form-control" value="{{ old('lastname') }}" name="lastname" id="lastname" placeholder="Enter last name">
                                                    @if ($errors->has('lastname'))
                                                    <div class="text-danger">{{ $errors->first('lastname') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="phone_number" class="text-white font-weight-bold">Phone Number</label>
                                                    <input type="number" class="form-control" value="{{ old('phone_number')}}" name="phone_number" placeholder="enter yout phone number" id="phonenumber">
                                                </div>
                                                @if ($errors->has('phone_number'))
                                                     <div class="text-danger">{{$errors->first('phone_number')}}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="campus" class="text-white font-weight-bold">Campus</label>
                                                    <select class="form-control" required name="campus" id="campus">
                                                        <option value="">Select Your Campus</option>
                                                        <option value="main campus" {{ old('campus') == 'main campus' ? 'selected' : '' }}>Main Campus</option>
                                                        <option value="abaya campus" {{ old('campus') == 'abaya campus' ? 'selected' : '' }}>Abaya Campus</option>
                                                        <option value="kulfo campus" {{ old('campus') == 'kulfo campus' ? 'selected' : '' }}>Kulfo Campus</option>
                                                        <option value="chamo campus" {{ old('campus') == 'chamo campus' ? 'selected' : '' }}>Chamo Campus</option>
                                                        <option value="nechsar campus" {{ old('campus') == 'nechsar campus' ? 'selected' : '' }}>Nechsar Campus</option>

                                                    </select>
                                                    @if ($errors->has('colleage'))
                                                        <div class="text-danger">{{ $errors->first('colleage') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="building" class="text-white font-weight-bold">Building Name</label>
                                                    <select class="form-control" required name="building_name" id="building">
                                                        @if ($resilience->count() > 0)
                                                            <option value="">Select Your Building</option>
                                                            @foreach ($resilience as $res)
                                                                <option value="{{ $res->building_name }}" {{ old('building_name') == $res->building_name ? 'selected' : '' }}>{{ $res->building_name }}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="">No Building is Found</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('building_name'))
                                                        <div class="text-danger">{{ $errors->first('building_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="building" class="text-white font-weight-bold">Building Number</label>
                                                    <select class="form-control" required name="building_number"  id="building">
                                                        @if ($resilience->count() > 0)
                                                            <option value="">Select Your Building</option>
                                                            @foreach ($resilience as $res)
                                                                <option value="{{ $res->building_number }}" {{ old('building_number') == $res->building_number ? 'selected' : '' }}>{{ $res->building_number }}</option>
                                                            @endforeach
                                                        @else
                                                            <option value="">No Building Number Found</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('building_number'))
                                                        <div class="text-danger">{{ $errors->first('building_number') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group" >
                                                    <label for="email" class="text-white font-weight-bold">House Number</label>
                                                    <input type="number" class="form-control" min="1" value="{{old('house_number')}}" placeholder="house number" name="house_number" />
                                                </div>
                                                @if ($errors->has('house_number'))
                                                    <div class="text-danger">{{ $errors->first('house_number') }}</div>
                                                @endif

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="university_id" class="text-white font-weight-bold">University ID</label>
                                                    <input type="file" class="form-control-file" name="university_id" id="university_id" accept=".pdf, .jpg, .png">
                                                </div>
                                                @if ($errors->has('university_id'))
                                                    <div class="text-danger">{{ $errors->first('university_id') }}</div>
                                                @endif

                                            </div>



                                         </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group" >
                                                    <label for="email" class="text-white font-weight-bold">Email</label>
                                                    <input type="email" class="form-control" value="{{old('email')}}" placeholder="email" name="email" id="email"/>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                                @endif

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password" class="text-white font-weight-bold">Password</label>
                                                    <input type="password" class="form-control" placeholder="password" name="password" />
                                                </div>
                                                @if ($errors->has('password'))
                                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                                @endif

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password" class="text-white font-weight-bold">Confirm Password</label>
                                                    <input type="password" class="form-control" placeholder="confirm password" name="confirm_password" />
                                                </div>
                                                @if ($errors->has('confirm_password'))
                                                    <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                                                @endif

                                            </div>
                                         </div>

                                        <button class="btn btn-primary btn-lg">Register</button>
                                    </form>
                                </div>
                                <p class="bg-white p-1">Already a member? <a href="/">Sign In</a></p>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
 </section>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
