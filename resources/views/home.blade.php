@extends('layouts.master')

@section('title', 'Win Goggles')

@section('content')

      <section id="win-goggles">

          <div class="goggles"

               data-0="background-position: 50% 68%;"
               data-600="background-position: 50% 0" ></div>

          <div class="win-call-bar">

              <div class="win-call-bar-content"
                   data-0="opacity: 1"
                   data-800="opacity: 0">

              <h2>PLAY & WIN amazing Zeal Optics Tehnology</h2>
              <a href="#rules">find out more</a>

              </div>

          </div>

      </section>

      <section id="rules">

          <hr>

          <div class="rules">

              <h1>Game rules</h1>

              @foreach($rules as $rule)

                  <p> {{ $rule }} </p>

              @endforeach

              <div class="links"><a href="{{ route('register') }}">Register now  >></a></div>
              <div class="links"><a href="{{ route('home') }}#win">Check the amazing prizes you can win ! </a></div>
          </div>


          <div class="winners">

              @include('partials.winners')

          </div>

      </section>

      <section id="images">

          <hr>

          @if(count($images))

              <h2>Current period images - <em> please vote!</em></h2>

          @endif

          <ul class="rig columns-3">

              @each('images.single', $images, 'image', 'images.no-items')

          </ul>


          @if(count($pp_images))

              <hr>

              <h2>Past periods images</h2>

              <ul class="rig columns-4">

                  @each('images.single-past', $pp_images, 'image', 'images.no-items')

              </ul>

          @endif

      </section>

      <section id="win">

          <hr>
          @include('partials.goggles-info')

      </section>

@stop

@section('footer')

    <footer data-0="bottom: -95rem;" data-3900="bottom: -95rem;" data-5000="bottom:0">
        @include('partials.footer')
    </footer>

@stop