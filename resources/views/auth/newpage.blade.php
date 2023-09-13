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

<body class="" style="background-color: rgb(228, 238, 240)">

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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>

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
                                    <form class="user" action="{{route('user.login')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                placeholder="Enter email...">
                                        </div>
                                        @if ($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        @if ($errors->has('password'))
                                        <div class="text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <div class="text-center mt-4">
                                        <a class="small" href="{{route('user.register')}}">Not registered? Sign up here!</a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 d-none d-lg-flex  align-items-center justify-content-center ">
                                <img src="img/ArbaMinchUniversity-logo_0.gif" class="img-fluid" style="width:80%;height:70%" alt="img">
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
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


  <style>
     body {
    max-width: 100%;
max-height: 100%
    height: 90vh;
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVZBuXEAAAA8v.jpg') repeat;
    background-size: cover;
    animation: slideshow 15s infinite;
  }

    @keyframes slideshow {
      0% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVYLYXYAE-Set.jpg');
      }
      20% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('');
      }
      40% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVZBuXEAAAA8v.jpg');
      }
      60% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVZBuXEAAAA8v.jpg');
      }
      80% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVZBuXEAAAA8v.jpg');
      }
      100% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://pbs.twimg.com/media/EuHVZBuXEAAAA8v.jpg');
      }
    }
    h1 {
    text-align: center;
    color: white;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 10px;
  }
  section.container {
    background-color: none;
  }

  section.container h1 {

    font-size: 44px;
    font-family: Arial, sans-serif;
  }
  </style>

</head>

<body>
  <header class="py-1">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="img/ArbaMinchUniversity-logo_0.gif" alt="Logo" style="width:130px">
      <nav>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#" class="text-white">Login</a></li>
          <li class="list-inline-item"><a href="#" class="text-white">Register</a></li>
          <li class="list-inline-item"><a href="#" class="text-white">Contact us</a></li>
          <li class="list-inline-item"><a href="#" class="text-white">About Us</a></li>
        </ul>
      </nav>
    </div>
  </header>

 <section class="container mx-auto p-4 mt-5 bg-none">
      <div class="d-flex flex-column justify-content-center align-items-center">
          <h1>Arba minch University </h1>
           <h1>facility management system</h1>
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

