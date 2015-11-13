@extends('layouts.master')

@section('title', 'Edit period')

@section('content')

    <div class="content-wrap">

        <div class="col-md-5 my-form">

            @include('errors.errors')

            <div class="panel panel-default">

                <div class="panel-body">

                    <a class="pull-right" href="{{ URL::previous() }}">Go back</a>

                    <h1>Edit period</h1>

                    {!!Form::open(['route' =>  ['admin.periods.update', $period->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH'])  !!}

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

@section('footer')

    <footer data-0="bottom: -95rem;" data-3900="bottom: -95rem;" data-700="bottom:0">
        @include('partials.footer')
    </footer>

@stop