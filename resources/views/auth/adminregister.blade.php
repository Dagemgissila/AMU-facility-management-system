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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row p-4">

                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Facility Management System For Amu</h1>
                                        <h1 class="h4 text-gray-900 mb-4">Admin Registration Page</h1>
                                    </div>


                                    <form class="user" action="{{route('admin.register')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"

                                                placeholder="Enter your email address...">
                                        </div>
                                        @if ($errors->has('email'))
                                        <div class="text-danger ">{{ $errors->first('email') }}</div>
                                    @endif
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        @if ($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="confirm password">
                                    </div>
                                    @if ($errors->has('confirm_password'))
                                    <div class="text-danger">{{ $errors->first('confirm_password') }}</div>
                                @endif

                                        <button class="btn btn-primary btn-user btn-block my-2">
                                            Register
                                        </button>

                                    </form>

                                </div>
                            </div>

                            <div class="col-6 py-4">
                                <img src="img/ArbaMinchUniversity-logo_0.gif" class="img-fluid " style="width:90%;height:80%" alt="img" >
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
