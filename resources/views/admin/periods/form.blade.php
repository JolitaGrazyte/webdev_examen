<div class="form-group">

    {!! Form::label('start', 'Period start:', ['class' => 'col-md-3 control-label']) !!}

    <div class="col-md-8">

        {!! Form::date('start', isset($period)? $period->start :null, ['class' => 'form-control', 'placeholder' => 'period start']) !!}

    </div>
</div>


<div class="form-group">

    {!! Form::label('end', 'Period end:', ['class' => 'col-md-3 control-label']) !!}

    <div class="col-md-8">

        {!! Form::date('end', isset($period)? $period->end :null, ['class' => 'form-control', 'placeholder' => 'period end']) !!}

    </div>

</div>