<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{trans('app.direction')}}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="adminId" content="{{ auth()->check() ? auth()->id() : '' }}">
    <script>
    var _token = "{{csrf_token()}}";
    var base_url = "{{asset('')}}";
    </script>
    <title>{{ trans('app.dashboard')}} | {{ isset($title) ? $title : 'reset' }}</title>
    <link href="{{asset('dashboard_files/ar')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Cairo&fbclid=IwAR1dWlNfJPO7eWgbf8pekeT3tJjnEOqDybhiAl-1YdyCJ26s3SiTJ7XDwoA">
    @if (app()->getLocale() == 'ar')
    <link href="{{asset('dashboard_files/ar')}}/css/sb-admin-2.css" rel="stylesheet">
    @else
    <link href="{{asset('dashboard_files/ar')}}/css/sb-admin-2 -Orginal.css" rel="stylesheet">
    @endif
    <link rel="shortcut icon" href="{{asset('')}}front_files/img/logo.png" />
    @stack('css') 
    <style>
        @media only screen and (max-width: 600px) {
            .zom {
                width: 100% !important;
            }
        }

        .activeb{
            background-color: #dddfeb;
        }
       
    </style>
    @if (app()->getLocale() == 'ar')
        <style>
            div.dataTables_wrapper div.dataTables_filter {
                text-align: left;
            }
        </style>
    @endif

</head>

<body id="page-top">
    <div id="app">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.dashboard._aside')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layouts.dashboard._top')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            @yield('content')
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © {{ date('Y', strtotime(now())) . ' ' . env('APP_NAME')}}</span>
            </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <script src="{{ asset('js/app.js') }}"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('dashboard_files/ar')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('dashboard_files/ar')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('dashboard_files/ar')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('dashboard_files/ar')}}/js/sb-admin-2.min.js"></script>
  <script>
  $(".gggg").click(function(){
    $(".fff").toggleClass("show").toggleClass("collapsed");
  });

  $(".kkk").click(function(){
    $(".bbb").toggleClass("show").toggleClass("collapsed");
  });
</script>
@stack('js')
</body>

</html>
