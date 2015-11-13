


    <div class="panel panel-default">

        <div class="panel-body">

            <h4><a class="pull-right" href="{{ route('admin.periods.create') }}">Add new period</a></h4>

            @if(count($periods))
            <h3>Periods:</h3>
            @foreach($periods as $key =>  $period)

                <a title="Edit period" href="{{ route('admin.periods.edit', [$period->id]) }}"><h2> {{ 'Period '.($key+1)  }}</h2></a>
                <div><strong>starts:</strong> <em>{{ $period->start->toDayDateTimeString() }} </em></div>

                <div><strong>ends:</strong> <em>{{ $period->end->toDayDateTimeString() }} </em></div>

                <div>
                    <a href="{{ route('period-delete', [$period->id]) }}"><em>delete period</em></a>
                </div>

            @endforeach

            @endif
        </div>

    </div>
