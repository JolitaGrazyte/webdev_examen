@extends('layouts.master')

@section('title', 'Edit period')

@section('content')


    <div class="col-md-5 my-form">

        <div class="panel panel-default">

            <div class="panel-body">

                <h1>Edit period</h1>

                {!!Form::open(['route' =>  ['admin.periods.update', $period->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

                @include('admin.periods.form')

                {{--<div class="form-group">--}}

                    {{--{!! Form::label('start', 'Period start:', ['class' => 'col-md-3 control-label']) !!}--}}

                    {{--<div class="col-md-8">--}}

                        {{--{!! Form::date('start',$period->start, ['class' => 'form-control', 'placeholder' => 'period start']) !!}--}}

                    {{--</div>--}}
                {{--</div>--}}


                {{--<div class="form-group">--}}

                    {{--{!! Form::label('end', 'Period end:', ['class' => 'col-md-3 control-label']) !!}--}}

                    {{--<div class="col-md-8">--}}

                        {{--{!! Form::date('end', $period->end, ['class' => 'form-control', 'placeholder' => 'period end']) !!}--}}

                    {{--</div>--}}

                {{--</div>--}}


                <div class="form-group">

                    <div class="col-md-8 col-md-offset-3">

                        {!! Form::submit('Submit', ['class' => 'my-btn form-control']) !!}

                    </div>

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

@stop