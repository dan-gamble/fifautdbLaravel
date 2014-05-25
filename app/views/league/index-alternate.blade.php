@extends('layout.master-sidebar')

@section('page-heading')
{{ $league->league_name_abbr15 }}
@stop

@section('left-9')
<h2>{{ $league->league_name_abbr15 }} Stats</h2>
<hr>
<ul class="col-lg-block-grid-8 text-center stat-block-grid">
    <li>
        <h5>Players</h5>
        <p>{{ $league->player_count() }}</p>
    </li>
    <li>
        <h5>Informs</h5>
        <p>{{ $league->if_count() }}</p>
    </li>
    <li>
        <h5>Golds</h5>
        <p>{{ $league->gold_count() }}</p>
    </li>
    <li>
        <h5>Silvers</h5>
        <p>{{ $league->silver_count() }}</p>
    </li>
    <li>
        <h5>Bronzes</h5>
        <p>{{ $league->bronze_count() }}</p>
    </li>
    <li>
        <h5>Average</h5>
        <p>{{ $league->average_rating() }}</p>
    </li>
    <li>
        <h5>Highest</h5>
        <p>{{ $league->highest_rating() }} <br> {{ $league->highest_player() }}</p>
    </li>
    <li>
        <h5>Lowest</h5>
        <p>{{ $league->lowest_rating() }} <br> {{ $league->lowest_player() }}</p>
    </li>
</ul>
<h2>
    Players
</h2>
<hr>
<ul class="col-lg-block-grid-6">
    @foreach ($players as $player)
    <li>
        <a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
    </li>
    @endforeach
</ul>
<div class="row ul-0">
    <div class="col-lg-5 columns">
        {{ $players->appends(Input::except(array('page')))->links('layout.pagination') }}
    </div>
</div>
@stop

@section('right-3')
<h2>Clubs</h2>
<hr>
<ul class="col-lg-block-grid-2 text-center">
    @foreach ($clubs as $club)
    <li>
        <a href="{{ $club->url_str() }}">
            @include('layout.card-14-club')
        </a>
    </li>
    @endforeach
</ul>
@stop
