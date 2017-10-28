<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test Nancy Karen Martinez Galaviz </title>

        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet">

        <link href="{{ asset("css/pnotify/pnotify.css") }}" rel="stylesheet">
        <link href="{{ asset("css/pnotify/pnotify.buttons.css") }}" rel="stylesheet">
        <link href="{{ asset("css/pnotify/pnotify.nonblock.css") }}" rel="stylesheet">

        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @yield('main_container')

            </div>
        </div>

        <script src="{{ asset("js/jquery.min.js") }}"></script>

        <script src="{{ asset("js/jquery-ui/jquery-ui.min.js") }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>

        <script src="{{ asset("js/jsrender/jsrender.min.js") }}"></script>

        <script src="{{ asset("js/gentelella.js") }}"></script>

        <script src="{{ asset("js/pnotify/pnotify.js") }}"></script>
        <script src="{{ asset("js/pnotify/pnotify.buttons.js") }}"></script>
        <script src="{{ asset("js/pnotify/pnotify.nonblock.js") }}"></script>

        <script src="{{ asset("js/personal.js") }}"></script>
        @stack('scripts')

    </body>
</html>