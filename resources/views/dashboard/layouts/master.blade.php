<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="adminId" content="{{ auth()->check() ? auth()->id() : '' }}">
    <script>
        var _token = "{{ csrf_token() }}";
        var base_url = "{{ asset('') }}";
    </script>
    <!-- Title -->
    <title>{{ trans('app.dashboard') }} | {{ isset($title) ? $title : 'reset' }}</title>
    <link rel="stylesheet" href="{{ asset('dashboard_files/theme_rtl/select2/select2.min.css') }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('') }}dashboard_files/img/aladdin-logo.jpg" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ URL::asset('dashboard_files/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ URL::asset('dashboard_files/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ URL::asset('dashboard_files/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ URL::asset('dashboard_files/css-rtl/sidemenu.css') }}">
    @else
        <link rel="stylesheet" href="{{ URL::asset('dashboard_files/css/sidemenu.css') }}">
    @endif
    <!--- Style css -->
    @if (app()->getLocale() == 'ar')
        <link href="{{ URL::asset('dashboard_files/css-rtl/style.css') }}" rel="stylesheet">
        <!--- Dark-mode css -->
        <link href="{{ URL::asset('dashboard_files/css-rtl/style-dark.css') }}" rel="stylesheet">
        <!---Skinmodes css-->
        <link href="{{ URL::asset('dashboard_files/css-rtl/skin-modes.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('dashboard_files/css/style.css') }}" rel="stylesheet">
        <!--- Dark-mode css -->
        <link href="{{ URL::asset('dashboard_files/css/style-dark.css') }}" rel="stylesheet">
        <!---Skinmodes css-->
        <link href="{{ URL::asset('dashboard_files/css/skin-modes.css') }}" rel="stylesheet">
    @endif

    <link href="{{ URL::asset('dashboard_files/css/tableexport.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard_files/css/global1.css') }}" rel="stylesheet">
    <!---notification view css-->
    <link href="{{asset('dashboard_files/css/notification_view.css')}}" rel="stylesheet">
    @stack('css')

</head>

<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <!-- <div id="global-loader">
   <img style="top:200px !important;" src="{{ URL::asset('dashboard_files/img/loading (2).gif') }}" class="loader-img" alt="Loader">
  </div> -->
    <!-- /Loader -->
    @if (auth()->check() and
            in_array(auth()->user()->getType(),
                ['office', 'vendor']))
        @include('layouts.dashboard.main-sidebar-user')
    @elseif(auth()->user()->hasRole(['callcenter', 'finance']))
        @include('layouts.dashboard.main-sidebar-callcenter')
    @else
        @include('layouts.dashboard.main-sidebar')
    @endif

    <!-- main-content -->
    <div class="main-content app-content" id="app">
        @include('layouts.dashboard.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('layouts.dashboard.footer')
            @include('layouts.dashboard.footer-scripts')
            @stack('js')
        </div>
    </div>
</body>

</html>
