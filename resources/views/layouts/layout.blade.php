<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title') - CAC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

     <!-- Datatables -->
  <link rel="stylesheet" href="{{asset('css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.jqueryui.min.css')}}">
 @livewireStyles
    <!-- modernizr css -->
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>


</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        @include('layouts.partials.sidemenu')
        <div class="main-content">
            @include('layouts.partials.header')
                 <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    {{-- @yield('content') --}}
                    @section('content')
                        
                    @show
                </div>
            </div>
        </div>
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright {{ date('Y') }}. All right reserved. Developed by <a href="https://colorlib.com/wp/">Fadlu</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    @include('layouts.partials.offsetarea')

     @livewireScripts
    <!-- jquery latest version -->
    <script type="text/javascript" src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/metisMenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.slicknav.min.js')}}"></script>

         <!-- Datatables -->
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('js/responsive.jqueryui.min.js')}}"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <!-- all line chart activation -->
    <script src="{{asset('js/line-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{asset('js/pie-chart.js')}}"></script>
    <!-- others plugins -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/scripts.js')}}"></script>

    {{-- custom javascript --}}
    {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
</body>

</html>
