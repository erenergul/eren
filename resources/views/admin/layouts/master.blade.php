<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">

    <title>TurAcenta Otomasyon</title>

    <link rel="apple-touch-icon" href="{{asset('admin/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('adminsrc/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/assets/css/site.min.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css')}}">

    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css')}}">
    <link rel="stylesheet"
          href="{{asset('adminsrc/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css')}}">

    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/clockpicker/clockpicker.css')}}">
@yield('css')



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
<body class="animsition">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top " role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">

            <span class="navbar-brand-text hidden-xs-down"> TurAcenta</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
                data-toggle="collapse">
            <span class="sr-only">Toggle Search</span>
            <i class="icon wb-search" aria-hidden="true"></i>
        </button>
    </div>

    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="nav-item hidden-float" id="toggleMenubar">
                    <a class="nav-link" data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
                <li class="nav-item hidden-sm-down" id="toggleFullscreen">
                    <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                        <span class="sr-only">Toggle fullscreen</span>
                    </a>
                </li>

            </ul>
            <!-- End Navbar Toolbar -->

            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

                <li class="nav-item dropdown">
                    <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                       data-animation="scale-up" role="button">
                <span class="avatar-online">
                 {{ Auth::user()->name }}
                    <i></i>
                </span>
                    </a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user"
                                                                                              aria-hidden="true"></i>
                            Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment"
                                                                                              aria-hidden="true"></i>
                            Billing</a>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings"
                                                                                              aria-hidden="true"></i>
                            Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power"
                                                                                              aria-hidden="true"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
            <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->

        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
            <form role="search">
                <div class="form-group">
                    <div class="input-search">
                        <i class="input-search-icon wb-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="site-search" placeholder="Search...">
                        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                                data-toggle="collapse" aria-label="Close"></button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Site Navbar Seach -->
    </div>
</nav>
<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-category">Genel</li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('admin.index')}}">
                            <span class="site-menu-title">Anasayfa</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('rezervasyon.index')}}">
                            <span class="site-menu-title">Rezervasyonlar</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('carihesap.index')}}">
                            <span class="site-menu-title">Cari Hesaplar</span>
                        </a>
                    </li>

                    <li class="site-menu-category">AYARLAR</li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('rezervasyon.create')}}">
                            <span class="site-menu-title">Rezervasyon Ekle</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('odeme.index')}}">
                            <span class="site-menu-title">Ödemeler</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('rehber.index')}}">
                            <span class="site-menu-title">Rehber Ekle</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('otel.index')}}">
                            <span class="site-menu-title">Otel Ekle</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('tur.index')}}">
                            <span class="site-menu-title">Tur Ekle</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('alinis.index')}}">
                            <span class="site-menu-title">Alınış Saatleri Ekle</span>
                        </a>
                    </li>
                    <li class="site-menu-item ">
                        <a class="animsition-link" href="{{route('takvim.index')}}">
                            <span class="site-menu-title">Hatırlatma / Takvim</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="{{ route('logout') }}" data-toggle="tooltip" data-original-title="Çıkış Yap"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <span class="icon wb-power"></span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </div>
</div>
<div class="site-gridmenu">
    <div>
        <div>
            <ul>
                <li>
                    <a href="../apps/mailbox/mailbox.html">
                        <i class="icon wb-envelope"></i>
                        <span>Mailbox</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/calendar/calendar.html">
                        <i class="icon wb-calendar"></i>
                        <span>Calendar</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/contacts/contacts.html">
                        <i class="icon wb-user"></i>
                        <span>Contacts</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/media/overview.html">
                        <i class="icon wb-camera"></i>
                        <span>Media</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/documents/categories.html">
                        <i class="icon wb-order"></i>
                        <span>Documents</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/projects/projects.html">
                        <i class="icon wb-image"></i>
                        <span>Project</span>
                    </a>
                </li>
                <li>
                    <a href="../apps/forum/forum.html">
                        <i class="icon wb-chat-group"></i>
                        <span>Forum</span>
                    </a>
                </li>
                <li>
                    <a href="../index.html">
                        <i class="icon wb-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page -->
<div class="page">
    <div class="page-content">
        @yield('content')
    </div>
</div>
<!-- End Page -->


<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">© 2018 <a
                href=""></a></div>
    <div class="site-footer-right">
        Crafted with <i class="red-600 wb wb-heart"></i> by <a href="#">TurAcenta.com</a>
    </div>
</footer>
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

<script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js') }}"></script>


<!-- Scripts -->
<script src="{{asset('adminsrc/global/js/Component.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Base.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Config.js')}}"></script>

<script src="{{asset('adminsrc/assets/js/Section/Menubar.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/Section/GridMenu.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/Section/Sidebar.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/Section/PageAside.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/Plugin/menu.js')}}"></script>

<script src="{{asset('adminsrc/global/js/config/colors.js')}}"></script>
<script src="{{asset('adminsrc/assets/js/config/tour.js')}}"></script>
<script>Config.set('assets', '../../assets');</script>

<!-- Page -->
<script src="{{asset('adminsrc/assets/js/Site.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/switchery.js')}}"></script>

<script src="{{asset('adminsrc/global/vendor/clockpicker/bootstrap-clockpicker.min.js')}}"></script>






@yield('javascript')


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
