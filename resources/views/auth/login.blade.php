@extends('layouts.master')

@section('title', 'Login')

@section('content')

    <div class="content-wrap">

    <div class="col-md-5 my-form">

        <div class="panel panel-default">

            <div class="panel-body">

                    <h1>Login</h1>

                        @include('errors.errors')

                        {!!Form::open(['route' => 'postLogin', 'class' => 'form-horizontal', 'role' => 'form'])  !!}

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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                {!! Form::submit('Login', ['class' => 'my-btn form-control']) !!}

{{--                                <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
                            </div>
                        </div>

                        {!! Form::close() !!}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<a href="{{ url('login/facebook') }}"><button class="btn btn-primary">facebook</button></a>--}}
                                {{--<a href="{{ url('login/google') }}"><button class="btn btn-primary">google+</button></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
            </div>
        </div>
    </div>
    </div>

@stop
