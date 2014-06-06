@extends('layout.master-sidebar')

@section('page-heading')
{{ $nation->nation_name }}
@stop

@section('left-9')
<h3>Players</h3>
<hr>
<ul class="card-list">
    @foreach ($players as $player)
    <li>
        <a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
    </li>
    @endforeach
</ul>
{{ $players->links() }}
<h3 id="leagues">Leagues</h3>
<hr>
<ul class="col-lg-block-grid-4 text-center">
    @foreach ($leagues as $league)
    <li>
        <a href="{{ $league->url_str() }}">
            <img src="/assets/img/leagues/{{ $league->asset_id }}.png">
            {{ $league->league_name }}
        </a>
    </li>
    @endforeach
</ul>
@stop

@section('right-3')
<h3>Nation</h3>
<hr>
@include('layout.ads.ad-side')
<table class="table table-striped">
    <tr>
        <td>Players</td>
        <td>{{ $nation->player_count() }}</td>
    </tr>
    <tr>
        <td>Leagues</td>
        <td><a href="#leagues">{{ $nation->league_count() }}</a></td>
    </tr>
    <tr>
        <td>Informs</td>
        <td>{{ $nation->if_count() }}</td>
    </tr>
    <tr>
        <td>Golds</td>
        <td>{{ $nation->gold_count() }}</td>
    </tr>
    <tr>
        <td>Silvers</td>
        <td>{{ $nation->silver_count() }}</td>
    </tr>
    <tr>
        <td>Bronzes</td>
        <td>{{ $nation->bronze_count() }}</td>
    </tr>
    <tr>
        <td>Average Rating</td>
        <td>{{ $nation->average_rating() }}</td>
    </tr>
    <tr>
        <td>Highest Rating</td>
        <td>{{ $nation->highest_rating() }} {{ $nation->highest_player() }}</td>
    </tr>
    <tr>
        <td>Lowest Rating</td>
        <td>{{ $nation->lowest_rating() }} {{ $nation->lowest_player() }}</td>
    </tr>
</table>
@stop
