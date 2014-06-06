@extends('layout.master')

@section('content')

@if (Request::isMethod('get'))
	<div class="row">
		<div class="col-lg-6">

			@if (Session::has('flash_message'))

			<div class="alert alert-success">
				{{ Session::get('flash_message') }}
				<a href="" class="close">×</a>
			</div>

			@endif

			<h3>Use existing Player</h3>
			<hr>
			{{ Form::open(['url' => 'admin/player/find']) }}
				<div class="form-group">
					{{ Form::label('player', 'Find Existing Player') }}
					{{ Form::text('player', '', ['class' => 'form-control']) }}
				</div>

				{{ Form::submit("Le'go!", ['class' => 'btn btn-primary' ]) }}
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
