<!doctype html>
<html lang="en">

<head>
    <title>PEMERINTAHAN DESA NAGASARI</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/linearicons/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}assets/vendor/DataTables/datatables.min.css" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/css/main.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/">Sistem Bantuan Sosial Nagasari</a>
        
        <!-- Links -->
        <!--<ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('petugas')}}">Petugas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url ('kriteria')}}">Kriteria</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{url ('keputusan')}}">Keputusan</a>
          </li>
        </ul>-->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <!-- Button trigger modal -->
              
              <li class="nav-item">
                <a class="nav-link" href="{{url ('login')}}">Login</a>
              </li>
            
            </li>
          </ul>
    </nav>
    <!--content-->
    <div class="main">
      <div class="main-content">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>

    <script src="{{ asset('') }}assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('') }}assets/scripts/klorofil-common.js"></script>
    <script src="{{ asset('') }}assets/vendor/DataTables/datatables.min.js"></script>

    @yield('script')
</body>

</html>