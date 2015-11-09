@if(count($winners))

    @foreach($winners as $key => $p_winners)

        @if(count($p_winners))

            <h1>Winners</h1>

            <h3> {{ ucfirst($key) }} </h3>
            <div>
                @foreach($p_winners as $winner )

                    {{--{{ dd($winner->image->author) }}--}}

                    <div>Winner: {{ $winner->image->author['first_name'] }} {{ $winner->image->author['last_name'] }}
                        {{--<strong> {{ $winner->image->author->first_name }} {{ $winner->image->author->last_name }} </strong>--}}

                    </div>
                    <div>Image title: <em>{{ $winner->image->name }} </em></div>

                @endforeach

            </div>

        @endif

    @endforeach


@endif