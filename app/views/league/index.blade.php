@extends('layout.master-sidebar')

@section('page-heading')
{{ $league->league_name_abbr15 }}
@stop

@section('left-9')
<h3>Players</h3>
<hr>
<ul class="col-lg-block-grid-5">
    @foreach ($players as $player)
    <li>
        <a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
    </li>
    @endforeach
</ul>
{{ $players->appends(Input::except(array('page')))->links('layout.pagination') }}
<h3 id="clubs">Clubs</h3>
<hr>
<ul class="col-lg-block-grid-6 text-center">
    @foreach ($clubs as $club)
    <li>
        <a href="{{ $club->url_str() }}">
            @include('layout.card-14-club')
        </a>
    </li>
    @endforeach
</ul>
@stop

@section('right-3')
<h3>League</h3>
<hr>
@include('layout.ads.ad-side')
<table class="col-lg-12">
    <tr>
        <td>Players</td>
        <td>{{ $league->player_count() }}</td>
    </tr>
    <tr>
        <td>Clubs</td>
        <td><a href="#clubs">{{ $league->club_count() }}</a></td>
    </tr>
    <tr>
        <td>Informs</td>
        <td>{{ $league->if_count() }}</td>
    </tr>
    <tr>
        <td>Golds</td>
        <td>{{ $league->gold_count() }}</td>
    </tr>
    <tr>
        <td>Silvers</td>
        <td>{{ $league->silver_count() }}</td>
    </tr>
    <tr>
        <td>Bronzes</td>
        <td>{{ $league->bronze_count() }}</td>
    </tr>
    <tr>
        <td>Average Rating</td>
        <td>{{ $league->average_rating() }}</td>
    </tr>
    <tr>
        <td>Highest Rating</td>
        <td>{{ $league->highest_rating() }} {{ $league->highest_player() }}</td>
    </tr>
    <tr>
        <td>Lowest Rating</td>
        <td>{{ $league->lowest_rating() }} {{ $league->lowest_player() }}</td>
    </tr>
</table>
@stop
