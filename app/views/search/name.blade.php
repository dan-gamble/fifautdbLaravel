@extends('layout.master-sidebar')

@section('page-heading')
	Player Search
@stop

@section('left-9')
	<h3 id="Players">Players</h3>
	<hr>
	<ul class="card-list">
		@foreach ($players as $player)
		<li>
			<a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
		</li>
		@endforeach
	</ul>
	<h3 id="Clubs">Clubs</h3>
	<hr>
	<ul class="card-list text-center">
		@foreach ($clubs as $club)
		<li>
			<a href="{{ $club->url_str() }}">
				@include('layout.card-14-club')
			</a>
		</li>
		@endforeach
	</ul>
	<h3 id="Leagues">Leagues</h3>
	<hr>
	<ul class="card-list">
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
	<h3 id="Nations">Nations</h3>
	<hr>
	<ul class="card-list">
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
@stop

@section('right-3')
	<script type="text/javascript">
	$(function(){ // document ready

		if (!!$('.nav-stacked').offset()) { // make sure ".nav-stacked" element exists

			var stickyTop = $('.nav-stacked').offset().top; // returns number

			$(window).scroll(function(){ // scroll event

			var windowTop = $(window).scrollTop(); // returns number

			if (stickyTop < windowTop){
				$('.nav-stacked').css({ position: 'fixed', top: 15 });
			}
			else {
				$('.nav-stacked').css('position','static');
			}

		});

		}

	});
    </script>
	<ul class="nav nav-pills nav-stacked">
		<li><a href="#Players">Players ({{ $playersSize }})</a></li>
		<li><a href="#Clubs">Clubs ({{ $clubsSize }})</a></li>
		<li><a href="#Leagues">Leagues ({{ $leaguesSize }})</a></li>
		<li><a href="#Nations">Nations ({{ $nationsSize }})</a></li>
	</ul>
@stop
