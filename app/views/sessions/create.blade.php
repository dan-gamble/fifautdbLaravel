@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 columns">
            <h1>Log In</h1>
            {{ Form::open(['route' => 'sessions.store']) }}

                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null) }}
                {{ errors_for('email', $errors) }}

                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
                {{ errors_for('password', $errors) }}

                {{ Form::submit('Log In', ['class' => 'button small']) }}

                @if (Session::has('flash_message'))

                <p>{{ Session::get('flash_message') }}</p>

                @endif

            {{ Form::close() }}
        </div>
    </div>
@stop
