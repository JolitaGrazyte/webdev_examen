<!DOCTYPE html>
<html>
<head>
    <title> Zeal GOGGLES | @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">


    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://raw.githubusercontent.com/moment/moment/develop/min/moment-with-locales.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://raw.githubusercontent.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>


</head>
<body>

<header data-0="height: 25rem;" data-800="height: 15rem;">
    @include('layouts.nav')
</header>

<div id="skrollr-body">

<div class="container-fluid">

    @yield('content')

    @yield('footer')

    <script>

        window.onload = function() {
            skrollr.init({
                forceHeight: false
            });
        };

        $('div.alert').not('.alert-important').delay(4000).slideUp(400);
    </script>

</div>
</div>
</body>
</html>
