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
                        <div><a href="{{ route('home') }}#win">Check the amazing prizes you can win ! </a></div>
            </div>


        <div class="winners">

                @include('winners')

        </div>

    </section>

    <section id="images">

        @if(count($images))
            <hr>

            <h2>Current period images - <em> please vote!</em></h2>

        @else

            <ul class="rig columns-3">

                @each('images.single', $images, 'image', 'images.no-items')

            </ul>


        @endif


        @if(isset($pp_images))

            <hr>

            <h2>Past periods images</h2>

            <ul class="rig columns-4">

                @each('images.single-past', $pp_images, 'image', 'images.no-items')

            </ul>

            @endif

    </section>

    <section id="win">

        <hr>
        @include('goggles-info')

    </section>

@stop

@section('footer')

    <footer data-0="bottom: -95rem;" data-3900="bottom: -95rem;" data-10000="bottom:0">
        @include('layouts.footer')
    </footer>

@stop