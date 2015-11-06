@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <section id="win-goggles">

        <div class="bckg"

             data-center="background-position: 50% 300px;"
             data-top-bottom="background-position: 50% 70px;"
             data-anchor-target="#win-goggles" >

        </div>

        <div class="win-call-bar">

            <div class="win-call-bar-content"

                 data-0="opacity: 1"
                 data-200="opacity: 0"
                 data-anchor-target=".brand-center"
                 >

                <h2>PLAY & WIN amazing Zeal Optics Tehnology</h2>
                <a href="#rules">find out more</a>
            </div>

        </div>

    </section>

    <section id="rules">

        <hr>

        <h1>Game rules</h1>

        <div class="rules">

                    @foreach($rules as $rule)

                        <p> {{ $rule }} </p>

                    @endforeach

                        <div><a href="{{ route('register') }}">Register now  >></a></div>
                        <div><a href="{{ route('home') }}#prizes">Check the amazing prizes you can win ! </a></div>
            </div>


        <div class="winners col-lg-4">

                @include('winners')

        </div>

    </section>

    <section id="images">

        <hr>

        <ul class="rig columns-3">

        @if(isset($images))

                @each('images.single', $images, 'image', 'images.no-items')

            @endif

        </ul>

    </section>

    <section id="win">

        <hr>
        @include('goggles-info')

    </section>

@stop

@section('footer')

    <footer>
        @include('layouts.footer')
    </footer>

@stop