@extends('layouts.master')

@section('content')

    <h1>Register</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">

                        @include('errors.errors')

                        {!! Form::open(['route' => 'getRegister', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                        <div class="form-group">

                            {!! Form::label('email', 'E-mail Address', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'email']) !!}

                            </div>

                        </div>

                        <div class="form-group">

                            {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">

                                {!! Form::password('password', ['class' => 'form-control',  'placeholder' => 'password']) !!}

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>

                        {!! Form::close() !!}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('login/facebook') }}"><button class="btn btn-primary">facebook</button></a>
                                <a href="{{ url('login/google') }}"><button class="btn btn-primary">google+</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
