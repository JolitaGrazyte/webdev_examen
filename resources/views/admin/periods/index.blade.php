@if(count($periods))

    <div class="panel panel-default">

        <div class="panel-body">

            <h3>Periods:</h3>
            @foreach($periods as $key =>  $period)

                <a title="Edit period" href="{{ route('admin.periods.edit', [$period->id]) }}"><h2> {{ 'Period '.($key+1)  }}</h2></a>
                <span> {{ $period->start }} - </span>

                <span> {{ $period->end }} </span>

            @endforeach

        </div>

    </div>

@endif