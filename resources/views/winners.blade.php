@if(count($winners))


    <h1>Winners</h1>

    @foreach($winners as $key => $p_winners)

        @if(count($p_winners))

            <h2><em> {{ ucfirst($key) }} </em></h2>

                @foreach($p_winners as $winner )

                       <div>
                           <strong> {{ $winner->image->author['first_name'] }} {{ $winner->image->author['last_name'] }}</strong>

                           <span><em> (  {{ $winner->image->name }} )</em></span>
                       </div>

                @endforeach

        @endif

    @endforeach


@endif