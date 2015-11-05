@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @include('layouts.message')

        <div class="content-wrap">

            <div class="col-md-5 my-form">

                <h1>Upload your photo and win!!!</h1>

                <div class="panel panel-default">

                    <div class="panel-body">

                        @include('errors.errors')

                        {!!Form::open(['route' =>  ['postUpload', $user_id], 'class' => 'form-horizontal', 'role' => 'form', 'files' => true])  !!}


                        <div class="form-group">

                            {!! Form::label('image', 'Image upload:', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10 col-md-offset-2">

                                {!! Form::file('image', ['class' => 'form-control ']) !!}


                            </div>
                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Image title:', ['class' => 'col-md-2 control-label']) !!}

                            <div class="col-md-10">

                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'name it']) !!}

                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">

                                {!! Form::submit('Send it', ['class' => 'my-btn form-control']) !!}

                            </div>

                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
@stop

@section('footer')

    <footer>
        @include('layouts.footer')
    </footer>

@stop