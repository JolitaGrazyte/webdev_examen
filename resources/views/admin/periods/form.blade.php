<div class="form-group">

    {!! Form::label('start', 'Period start:', ['class' => 'col-md-3 control-label']) !!}

    <div class="col-md-8">

    {!! Form::text('start', isset($period)? $period->start :null, ['class' => ' datetimepicker form-control', 'placeholder' => isset($period)? $period->start:'period start']) !!}


    </div>


</div>

<div class="form-group">

    {!! Form::label('start', 'Period end:', ['class' => 'col-md-3 control-label']) !!}


    <div class="col-md-8">

        {!! Form::text('end', isset($period)? $period->end :null, ['class' => 'datetimepicker form-control', 'placeholder' => isset($period)? $period->end:'period end']) !!}

    </div>


</div>

<script>
    $(function () {
        $( ".datetimepicker" ).datetimepicker();
    });

</script>