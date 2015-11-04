<!DOCTYPE html>
<html>
<head>
    <title> Zeal GOGGLES | @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>


<div class="container-fluid">

    <header>
        @include('layouts.nav')
    </header>

    @yield('content')



    @yield('footer')

</div>
</body>
</html>
