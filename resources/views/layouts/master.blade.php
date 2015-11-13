<!DOCTYPE html>
<html>
<head>
    <title> Zeal GOGGLES | @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <script src="{{ url('js/jquery-2.1.4.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('css/app.css') }}">


</head>
<body>

<header data-0="height: 25rem;" data-800="height: 15rem;">
    @include('partials.nav')
    @include('partials.message')
</header>


<div class="container-fluid">

    @if(Auth::check())
        <div class="admin-nav-right">


            @if(Request::is('admin') || Request::is('admin/*'))

                <a href="{{ route('home') }}">Home</a>

                @if(Request::is('admin/*') )
                    <span> | </span>
                    <a href="{{ route('admin') }}">Admin</a>
                @endif


             @else

                <a href="{{ route('admin') }}">Admin</a>

            @endif

                <span> | </span>
            <a href="{{ url('auth/logout') }}">Logout</a>
        </div>


    @endif

    @yield('content')

    @yield('footer')

</div>

</body>
</html>
