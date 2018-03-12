<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>TurAcenta | Otomasyon Programı</title>

    <link rel="apple-touch-icon" href="{{asset('admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('adminsrc/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/assets/css/site.min.css')}}">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/assets/examples/css/pages/login-v3.css')}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('adminsrc/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="{{asset('adminsrc/global/vendor/html5shiv/html5shiv.min.js')}}"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="{{asset('adminsrc/global/vendor/media-match/media.match.min.js')}}"></script>
    <script src="{{asset('adminsrc/global/vendor/respond/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{asset('adminsrc/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
        Breakpoints();
    </script>
</head>
<body class="animsition page-login-v3 layout-full">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

@yield('content')

<!-- End Page -->


<!-- Core  -->
<script src="{{asset('adminsrc/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/jquery/jquery.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/popper-js/umd/popper.min.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/animsition/animsition.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>


<!-- Plugins -->
<script src="{{asset('adminsrc/global/vendor/switchery/switchery.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/intro-js/intro.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/screenfull/screenfull.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
<script src="{{asset('adminsrc/global/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>

<!-- Scripts -->
<script src="{{asset('adminsrc/global/js/Component.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Base.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Config.js')}}"></script>


<script src="{{asset('adminsrc/global/js/config/colors.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/config/tour.js')}}"></script>
<script>Config.set('assets', '../../assets');</script>

<!-- Page -->
<script src="{{asset('adminsrc/assets/js/Site.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/switchery.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/jquery-placeholder.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/material.js')}}"></script>

<script>
    (function (document, window, $) {
        'use strict';

        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>
</body>
</html>
