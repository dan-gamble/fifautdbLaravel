@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-lg-4 columns">

		<h3>TOTW</h3>
		<hr>

		@if (Session::has('flash_message'))

		<div data-alert="" class="alert-box success">
			{{ Session::get('flash_message') }}
			<a href="" class="close">×</a>
		</div>

		@endif

		{{ Form::open(['url' => 'admin/totw']) }}
			<div class="form-group">
				{{ Form::label('extension', 'TOTW Extension') }}
				{{ Form::text('extension', '',['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('totw-name', 'TOTW Name') }}
				{{ Form::text('totw-name', '',['class' => 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('url', 'TOTW URL (1 or 2)') }}
				{{ Form::select('url', ['1' => 'URL 1', '2' => 'URL 2'], '', ['class' => 'form-control']) }}
			</div>

			{{ Form::submit('Get TOTW!', ['class' => 'btn btn-primary' ]) }}
		{{ Form::close() }}
	</div>
</div>
@stop
