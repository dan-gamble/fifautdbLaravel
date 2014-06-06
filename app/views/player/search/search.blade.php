@extends('layout.master')

@section('page-heading')
Player Search
@stop

@section('content')
<div class="row">
	<div class="col-lg-12">
		{{ Form::open(['route' => 'playersearch.results', 'method' => 'get']) }}
			<div class="row">
				<div class="col-lg-12">
                    {{ Form::submit('Search', ['class' => 'btn btn-primary' ]) }}
                    <a href="#" class="btn btn-default">Reset</a>
				</div>
			</div>
        {{ Form::close() }}
	</div>
</div>
@stop
