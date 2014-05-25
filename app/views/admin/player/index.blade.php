@extends('layout.master')

@section('content')

@if (Request::isMethod('get'))
	<div class="row">
		<div class="col-lg-6 columns">

			@if (Session::has('flash_message'))

			<div data-alert="" class="alert-box success">
				{{ Session::get('flash_message') }}
				<a href="" class="close">×</a>
			</div>

			@endif

			<h3>Use existing Player</h3>
			<hr>
			{{ Form::open(['url' => 'admin/player/find']) }}
				{{ Form::label('player', 'Find Existing Player') }}
				{{ Form::text('player') }}

				{{ Form::submit("Le'go!", ['class' => 'small button' ]) }}
			{{ Form::close() }}
		</div>
		<div class="col-lg-6 columns">
			<h3>Create fresh Player</h3>
			<hr>

			<a class="small button" href="{{ URL::route('admin.player.fresh') }}">Create fresh player</a>
		</div>
	</div>
@endif

@stop
