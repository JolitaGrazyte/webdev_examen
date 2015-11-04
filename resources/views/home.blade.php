@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')

    <section id="home">

        <hr>

        <div class="col-lg-8">

            <h1>Game rules</h1>

            <div class="rules" style="font-size: 2rem; text-align: justify; padding: 1rem 2rem 1rem 0;">

                    @foreach($rules as $rule)

                        <p> {{ $rule }} </p>

                    @endforeach

                        <div><a href="">Register now</a></div>
                        <div><a href="">Check the amazing prizes you can win !</a></div>
            </div>

        </div>

        <div class="col-lg-4">

                @include('winners')

        </div>

    </section>



    <section id="images">

        <div class="col-lg-12">

            <hr>

            @include('images.index')

        </div>


    </section>

@stop

@section('footer')

    <footer>
        @include('layouts.footer')
    </footer>

@stop