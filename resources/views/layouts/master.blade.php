<!DOCTYPE html>
<html>
<head>
    <title> Zeal GOGGLES | @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>

<header data-0="height: 25rem;" data-800="height: 15rem;">
    @include('layouts.nav')
</header>


<div class="container-fluid">


    @yield('content')

    @yield('footer')

</div>
</body>
</html>
