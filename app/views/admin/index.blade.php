@extends('layout.master')

@section('content')
<div class="row">
	<div class="large-3 columns">
	{{ Form::open() }}
		{{ Form::label('extension', 'TOTW Extension') }}
		{{ Form::text('extension') }}
		{{ Form::label('name', 'TOTW Name') }}
		{{ Form::text('name') }}
		{{ Form::label('url', 'TOTW URL (1 or 2)') }}
		{{ Form::select('url', array('1' => 'URL 1', '2' => 'URL 2')) }}

		{{ Form::submit('Get TOTW!', ['class' => 'small button' ]) }}
	{{ Form::close() }}
	</div>
</div>
@stop
