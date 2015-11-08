@extends('layouts.master')

@section('title', $title)

@section('content')

<div class="content-wrap">

    {{--@include('layouts.message')--}}

    <div class="col-md-5 my-form">

        <h1>{{ $title }}</h1>

        <div class="row">

            {!!Form::open(['route' =>  ['post-register'], 'class' => 'form-horizontal', 'role' => 'form'])  !!}

            <div class="form-group">

                {!! Form::label('email', 'Notifications to email:', ['class' => 'col-md-3 control-label']) !!}

                <div class="col-md-8">

                    {!! Form::email('email', $admin_email, ['class' => 'form-control', 'placeholder' => 'email']) !!}

                </div>

            </div>

            <div class="form-group">

                <div class="col-md-8 col-md-offset-3">

                    {!! Form::submit('Submit', ['class' => 'my-btn form-control']) !!}

                </div>

            </div>

            {!! Form::close() !!}

        </div>

        <hr>

        <div class="row">

            @include('admin.periods.index', ['periods' => $periods])

        </div>

    </div>

</div>

@stop