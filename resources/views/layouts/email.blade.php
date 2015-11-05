<!DOCTYPE html>
<html>
<head>
    <title> Zeal GOGGLES | @yield('title') </title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="http://webdev.local.com/css/app.css">

</head>
<body>

<div class="container-fluid">

    <header>
        {{-- todo: logo--}}
    </header>

    @yield('content')


    <footer class="col-lg-12">
        <img src="http://webdev.local.com/files/img/footer_email.png" alt="footer image">
    </footer>
</div>
</body>
</html>
