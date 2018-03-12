<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">

    <title>Takvim</title>
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
    <link rel="stylesheet" href="{{asset('adminsrc/global/fonts/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css')}}">
    <link rel="stylesheet" href="{{asset('adminsrc/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">

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

    <!-- Fullcalendar -->
    {!! Html::style('adminsrc/global/vendor/ascolorpicker/asColorPicker.css') !!}

    {!! Html::style('adminsrc//global/vendor/fullcalendar/fullcalendar.css') !!}
    {!! Html::style('vendor/datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('vendor/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') !!}


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
                        <a class="animsition-link" href="">
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
<!-- Page -->
<div class="page">
        <div class="page-aside">
            <section class="page-aside-section">
                <h5 class="page-aside-title">EVENTS</h5>
                <div class="list-group calendar-list">
                    <a class="list-group-item calendar-event" data-title="Meeting" data-stick=true
                       data-color="red-600" href="javascript:void(0)">
                        <i class="wb-medium-point red-600 mr-10" aria-hidden="true"></i>Meeting Renk
                    </a>
                    <a class="list-group-item calendar-event" data-title="Birthday Party" data-stick=true
                       data-color="green-600" href="javascript:void(0)">
                        <i class="wb-medium-point green-600 mr-10" aria-hidden="true"></i>Transfer Renk
                    </a>
                    <a class="list-group-item calendar-event" data-title="Dinner with Team" data-stick=true
                       data-color="cyan-600" href="javascript:void(0)">
                        <i class="wb-medium-point cyan-600 mr-10" aria-hidden="true"></i>Hatırlatma Renk
                    </a>
                </div>
            </section>
        </div>
        <div class="page-main" style="margin-left:260px;">
            {{ Form::open(['route' => 'events.store', 'method' => 'post', 'role' => 'form']) }}

            <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Hatırlatma Ekle</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('title','Açıklama')}}
                                {{Form::text('title', old('title'), [ 'class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('date_start','Tur Tarihi')}}
                                {{Form::text('date_start', old('date_start'), [ 'class' => 'form-control', 'readonly' => 'true'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('time_start','Saat')}}
                                {{Form::text('time_start', old('time_start'), [ 'class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{ Form::label('color', 'Renk Seçimi') }}
                                {{ Form::select('color', ['#ff4c52' => 'Meeting', '#11c26d' => 'Transfer' , '#0bb2d4' => 'Hatırlatma'], null, ['placeholder' => 'Seçim Yapınız' , 'class' => 'form-control'])}}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            {!! Form::submit('Gönder' ,['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::close() }}
            <div id="calendar">

            </div>
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
<script src="{{asset('adminsrc/global/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
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

<script src="{{asset('adminsrc/assets/js/config/tour.js')}}"></script>
<script>Config.set('assets', '../../assets');</script>

<!-- Page -->
<script src="{{asset('adminsrc/assets/js/Site.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/asscrollable.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/slidepanel.js')}}"></script>
<script src="{{asset('adminsrc/global/js/Plugin/switchery.js')}}"></script>

<!-- Fullcalendar JS -->




{!! Html::script('vendor/fullcalendar/lib/moment.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/locale-all.js') !!}
{!! Html::script('vendor/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('vendor/datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
{!! Html::script('vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') !!}

<script>
    var BASEURL = "{{ url('admin/takvim') }}";
    $(document).ready(function () {

        $('#calendar').fullCalendar({
            lang: 'tr',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectHelper: true,

            select: function (start) {
                start = moment(start.format());
                $('#date_start').val(start.format('YYYY-MM-DD'));
                $('#responsive-modal').modal('show');
            },

            events: BASEURL + '/events'
        });

    });

    $('.colorpicker').colorpicker();

    $('#time_start').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm:ss'
    });
    $('#date_end').bootstrapMaterialDatePicker({
        date: true,
        shortTime: false,
        format: 'YYYY-MM-DD HH:mm:ss'
    });

</script>

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
