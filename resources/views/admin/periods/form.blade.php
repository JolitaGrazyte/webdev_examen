

<div class="form-group">

    {!! Form::label('start', 'Period start:', ['class' => 'col-md-3 control-label']) !!}

    <div class="col-md-8">
        {!! Form::date('start',  isset($period->start) ? $period->start->format('Y-m-d H:i:s') : null, ['class' => 'form-control', 'name' => 'start','placeholder' => $now] ) !!}

    </div>


</div>

<div class="form-group">

    {!! Form::label('start', 'Period end:', ['class' => 'col-md-3 control-label']) !!}


    <div class="col-md-8">

        {!! Form::date('end',  isset($period->end) ? $period->end->format('Y-m-d H:i:s') : null, ['class' => 'form-control', 'name' => 'end', 'placeholder' => $now] ) !!}

    </div>


</div>
