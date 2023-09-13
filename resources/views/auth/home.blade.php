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
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2019-11-03_16-12-19.jpg') repeat;
    background-size: cover;
    animation: slideshow 14s infinite;
  }

    @keyframes slideshow {
      0% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-06-16_07-52-35.jpg');
      }
      20% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-04-09_11-23-04.jpg');
      }
      40% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-04-09_11-23-04.jpg');
      }
      60% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-05-09_09-41-29.jpg');
      }
      80% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-05-09_09-41-29.jpg');
      }
      100% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/photo_2021-06-03_03-22-32.jpg');
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
  </style>

</head>

<body>
  <header class="py-1">
    <div class="container d-flex justify-content-between align-items-center">
      <img src="img/ArbaMinchUniversity-logo_0.gif" alt="Logo" style="width:130px">
      <nav>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="{{route('home')}}" class="text-white">Home</a></li>
          <li class="list-inline-item"><a href="{{route('user.login')}}" class="text-white">Login</a></li>
          <li class="list-inline-item"><a href="{{route('user.register')}}" class="text-white">Register</a></li>

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
