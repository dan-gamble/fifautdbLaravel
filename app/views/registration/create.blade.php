@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-lg-12 columns">
		<h1>Register!</h1>
        {{ Form::open(['route' => 'registration.store']) }}
        	{{ Form::label('username', 'Username') }}
            {{ Form::text('username', null, ['required' => 'required']) }}
            {{ $errors->first('username', '<small class="error">:message</small>') }}

            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', null, ['required' => 'required']) }}
            {{ $errors->first('email', '<small class="error">:message</small>') }}

            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['required' => 'required']) }}
            {{ $errors->first('password', '<small class="error">:message</small>') }}

            {{ Form::label('password_confirmation', 'Password Confirm') }}
            {{ Form::password('password_confirmation', ['required' => 'required']) }}

            {{ Form::submit('Create Account', ['class' => 'small button' ]) }}
        {{ Form::close() }}
	</div>
</div>
@stop
