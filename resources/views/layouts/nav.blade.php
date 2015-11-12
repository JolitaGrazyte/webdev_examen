

<div class="brand-center"
     data-0="height: 15rem; width: 15rem;"
     data-800="height: 8rem; width: 8rem;">

    <a id="brand-center"
       data-0="top:0; left: 50%;height: 15rem; width: 15rem;"
       data-800="height: 8rem; width: 8rem;"
       name="home"
       class="centering"
       href="{{ route('home') }}">

    </a>
</div>


<nav data-0="top:0; width: 100%;"
     data-800="top:-100%;">

    <ul class="navbar-nav">
        <li><a class="link" name="register" href="{{ route('register') }}">     Play    </a></li>
        <li><a class="link" name="images"   href="{{ route('home') }}/#images"> Vote    </a></li>
        <li><a class="link" name="prizes"   href="{{ route('home') }}/#win">    Win     </a></li>
    </ul>
</nav>

@if(!Request::is('register'))

    <h1 class="nav-heading centering"
        data-0="display:block;"
        data-60="display:none;">GOOGLE TECHNOLOGY</h1>

@endif

@include('layouts.message')