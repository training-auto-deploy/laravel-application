<html lang="en" class="perfect-scrollbar-off"><head>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/admin-layout.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/icon.css') }}" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body class="">
  <div class="wrapper ">
    @include('admin.layout.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('admin.layout.header')
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>


</div> -->
      <div class="content">
        @yield('content')
      </div>
      @include('admin.layout.footer')
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/admin/admin-layout.js') }}" type="text/javascript"></script>



</body></html>