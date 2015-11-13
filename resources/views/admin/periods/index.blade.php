
@if(count($periods))

    <div class="panel panel-default">

        <div class="panel-body">

            <h4><a class="pull-right" href="{{ route('admin.periods.create') }}">Add new period</a></h4>

            <h3>Periods:</h3>
            @foreach($periods as $key =>  $period)

                <a title="Edit period" href="{{ route('admin.periods.edit', [$period->id]) }}"><h2> {{ 'Period '.($key+1)  }}</h2></a>
                <span> {{ $period->start }} - </span>

                <span> {{ $period->end }} </span>

                <div>
                    <a href="{{ route('period-delete', [$period->id]) }}"><em>delete period</em></a>
                </div>

            @endforeach

        </div>

    </div>

@endif