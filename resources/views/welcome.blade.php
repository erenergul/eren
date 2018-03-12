<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
    </head>
    <body>
    <div class="container">
        <div id='calendar'></div>
    </div>
    </body>


    <script src="{{asset('adminsrc/global/vendor/fullcalendar/fullcalendar.js')}}"></script>
    <script src="{{asset('adminsrc/global/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminsrc/global/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('adminsrc/global/vendor/jquery-selective/jquery-selective.min.js')}}"></script>
</html>
