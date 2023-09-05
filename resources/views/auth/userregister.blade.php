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
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row p-4">

                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Facility Management System For Amu</h1>
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
                                                    <label for="firstname">First Name</label>
                                                    <input type="text" class="form-control" value="{{ old('firstname') }}" name="firstname" id="firstname" placeholder="Enter first name">
                                                    @if ($errors->has('firstname'))
                                                    <div class="text-danger">{{ $errors->first('firstname') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="middlename">Middle Name</label>
                                                    <input type="text" class="form-control" value="{{ old('middlename') }}" name="middlename" id="middlename" placeholder="Enter middle name">
                                                    @if ($errors->has('middlename'))
                                                    <div class="text-danger">{{ $errors->first('middlename') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="lastname">Last Name</label>
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
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="number" class="form-control" name="phone_number" placeholder="enter yout phone number" id="phonenumber">
                                                </div>
                                                @if ($errors->has('phone_number'))
                                                     <div class="text-danger">{{$errors->first('phone_number')}}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="colleage">Colleage</label>
                                                    <select class="form-control" required name="colleage" id="colleage">
                                                        <option value="">Select Your Colleage</option>
                                                        <option value="Amit">Amit</option>
                                                        <option value="Amit">Awit</option>

                                                    </select>
                                                    @if ($errors->has('colleage'))
                                                        <div class="text-danger">{{ $errors->first('colleage') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="building">Building Name</label>
                                                    <select class="form-control" required name="building_name" id="building">
                                                        @if ($resilience->count()> 0)
                                                        <option value="">Select Your Building</option>
                                                             @foreach ($resilience as $res)

                                                        <option value="{{$res->building_name}}">{{$res->building_name}}</option>

                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('building'))
                                                        <div class="text-danger">{{ $errors->first('building') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="building">Building Number</label>
                                                    <select class="form-control" required name="building_number" id="building">
                                                        @if ($resilience->count()> 0)
                                                        <option value="">Select Your Building</option>
                                                             @foreach ($resilience as $res)

                                                        <option value="{{$res->building_name}}">{{$res->building_number}}</option>

                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('building'))
                                                        <div class="text-danger">{{ $errors->first('building') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <label for="faculty">Faculty</label>
                                                        <select name="faculty"  value="{{old('faculty')}}" class="form-control" required>
                                                            <option value="">Select Your faculty</option>
                                                            <option value="Faculty of Computing & Software Enginering">Faculty of Computing & Software Enginering</option>
                                                            <option value="Electrical & Computing Engineering">Electrical & Computing Engineering</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('faculty'))
                                                    <div class="text-danger">{{ $errors->first('faculty') }}</div>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="university_id">University ID</label>
                                                    <input type="file" class="form-control-file" name="university_id" id="university_id" accept=".pdf, .jpg, .png">
                                                </div>
                                                @if ($errors->has('university_id'))
                                                    <div class="text-danger">{{ $errors->first('university_id') }}</div>
                                                @endif

                                            </div>


                                         </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" placeholder="email" name="email" id="email"/>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                                @endif

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" placeholder="password" name="password" />
                                                </div>
                                                @if ($errors->has('password'))
                                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                                @endif

                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password">Confirm Password</label>
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
                                <p>Already a member? <a href="/">Sign In</a></p>
                            </div>


                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
