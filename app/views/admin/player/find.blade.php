@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
        <h3>Choose player you want to create from</h3>
        <hr>
        <h5>Searching for "{{ $keyword }}"</h5>
        <ul class="card-list">
            @foreach ($playerBack as $player)
                <li>
                    <a href="/admin/player/existing/{{ $player->id }}">@include('layout.card-14')</a>
                </li>
            @endforeach
        </ul>
	</div>
</div>
@stop
