@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')


    <section id="win-goggles" class="col-lg-12">

        <div class="bckg"

             data-center="background-position: 50% 310px;"
             data-top-bottom="background-position: 50% -300px;"
             data-anchor-target="#win-goggles" >

        </div>

        <div class="win-call-bar">

            <div class="win-call-bar-content"

                 data-0="opacity: 1"
                 data-200="opacity: 0"
                 >

                <h2>PLAY & WIN amazing Zeal Optics Tehnology</h2>
                <a href="">find out more</a>
            </div>

        </div>

    </section>

    <section id="home">

        <div class="col-lg-8">

            <h1>Game rules</h1>

            <div class="rules">

                    @foreach($rules as $rule)

                        <p> {{ $rule }} </p>

                    @endforeach

                        <div><a href="">Register now</a></div>
                        <div><a href="">Check the amazing prizes you can win !</a></div>
            </div>

        </div>

        <div class="col-lg-4">

            <h2>section winners</h2>

                @include('winners')

        </div>

    </section>


    <section id="images">

        <h2>section images</h2>

        <div class="col-lg-12">
            <h2></h2>

            <hr>

            @include('images.index')

        </div>


    </section>

    <section id="win">

        @include('goggles-info')

    </section>

@stop

@section('footer')

    <footer>
        @include('layouts.footer')
    </footer>

@stop