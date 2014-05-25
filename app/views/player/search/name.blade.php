@extends('layout.master')

@section('page-heading')
Player Search
@stop

@section('content')
<div class="row">
	<div class="col-lg-12">
		<dl class="tabs" data-tab>
		<dd class="active"><a href="#panel2-1">Players ({{ $playersSize }})</a></dd>
			<dd><a href="#panel2-2">Clubs ({{ $clubsSize }})</a></dd>
			<dd><a href="#panel2-3">Leagues ({{ $leaguesSize }})</a></dd>
			<dd><a href="#panel2-4">Nations ({{ $nationsSize }})</a></dd>
		</dl>
		<div class="tabs-content">
			<div class="content active" id="panel2-1">
				<ul class="col-lg-block-grid-7">
					@foreach ($players as $player)
					<li>
						<a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="content" id="panel2-2">
				<ul class="col-lg-block-grid-7 text-center">
					@foreach ($clubs as $club)
					<li>
						<a href="{{ $club->url_str() }}">
							@include('layout.card-14-club')
						</a>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="content" id="panel2-3">
				<ul class="col-lg-block-grid-7">
					@if (sizeof($leagues) == '0')
						<h3>No Leagues</h3>
					@else
						@foreach ($leagues as $league)
						<li>
							<a href="{{ $league->url_str() }}">
								@include('layout.card-14-league')
							</a>
						</li>
						@endforeach
					@endif
				</ul>
			</div>
			<div class="content" id="panel2-4">
				<ul class="col-lg-block-grid-7">
					@if (sizeof($nations) == '0')
						<h3>No Nations</h3>
					@else
						@foreach ($nations as $nation)
						<li>
							{{ $nation->nation_name }}
						</li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</div>
</div>
@stop
