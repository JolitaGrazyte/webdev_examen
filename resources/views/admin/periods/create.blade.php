@extends('layouts.master')

@section('title', 'Add period')

@section('content')

    <div class="content-wrap">

    <div class="col-md-5 my-form">

        @include('errors.errors')

        <div class="panel panel-default">

            <div class="panel-body">

                <h1>Add period</h1>

                    {!!Form::open(['route' =>  ['admin.periods.store'], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

                    @include('admin.periods.form')

                    <div class="form-group">

                        <div class="col-md-8 col-md-offset-3">

                            {!! Form::submit('Submit', ['class' => 'my-btn form-control']) !!}

                        </div>

                    </div>

                    {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@stop