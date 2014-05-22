@extends('layout.master-sidebar')

@section('page-heading')
{{ $club->club_name_abbr15 }}
@stop

@section('left-9')
<h3>Players</h3>
<hr>
<ul class="large-block-grid-6">
    @foreach ($players as $player)
    <li>
        <a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
    </li>
    @endforeach
</ul>
@stop

@section('right-3')
<h3>Club</h3>
<hr>
@include('layout.ads.ad-300-side')
<table class="large-12">
    <tr>
        <td>Players</td>
        <td>{{ $club->player_count() }}</td>
    </tr>
    <tr>
        <td>Informs</td>
        <td>{{ $club->if_count() }}</td>
    </tr>
    <tr>
        <td>Golds</td>
        <td>{{ $club->gold_count() }}</td>
    </tr>
    <tr>
        <td>Silvers</td>
        <td>{{ $club->silver_count() }}</td>
    </tr>
    <tr>
        <td>Bronzes</td>
        <td>{{ $club->bronze_count() }}</td>
    </tr>
    <tr>
        <td>Average Rating</td>
        <td>{{ $club->average_rating() }}</td>
    </tr>
    <tr>
        <td>Highest Rating</td>
        <td>{{ $club->highest_rating() }} {{ $club->highest_player() }}</td>
    </tr>
    <tr>
        <td>Lowest Rating</td>
        <td>{{ $club->lowest_rating() }} {{ $club->lowest_player() }}</td>
    </tr>
</table>
<h3>Kits</h3>
<hr>
<ul class="large-block-grid-2 text-center">
    <li>
        <img class="club-card-shirt" src="/assets/img/kits/{{ $club->asset_id }}_0.png">
        <h4>Home</h4>
    </li>
    <li>
        <img class="club-card-shirt" src="/assets/img/kits/{{ $club->asset_id }}_1.png">
        <h4>Away</h4>
    </li>
</ul>
<ul class="large-block-grid-1 text-center">
    <li>
        <img class="club-card-shirt" src="/assets/img/kits/{{ $club->asset_id }}_3.png">
        <h4>3rd Kit</h4>
        <h4>No third kit</h4>
    </li>
</ul>
@stop
