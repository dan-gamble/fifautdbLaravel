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
			{{ Form::label('extension', 'TOTW Extension') }}
			{{ Form::text('extension') }}
			{{ Form::label('totw-name', 'TOTW Name') }}
			{{ Form::text('totw-name') }}
			{{ Form::label('url', 'TOTW URL (1 or 2)') }}
			{{ Form::select('url', array('1' => 'URL 1', '2' => 'URL 2')) }}

			{{ Form::submit('Get TOTW!', ['class' => 'small button' ]) }}
		{{ Form::close() }}
	</div>
</div>
@stop
