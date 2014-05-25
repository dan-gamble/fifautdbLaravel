@extends('layout.master')

@section('page-heading')
{{ $player->common_name }}
@stop

@section('content')
<div class="row">
    {{ Form::open(['action' => 'AdminController@playerExistingCreate']) }}
    <div class="col-lg-7 columns">
        <div class="row">
            <div class="col-lg-4 columns">
                <h4>{{ $player->common_name }}</h4>
                <hr>
                @include('layout.card-14')
                <div>
                    {{ Form::label('first_name', 'First Name') }}
                    {{ Form::text('first_name', $player->first_name) }}
                    {{ Form::label('last_name', 'Last Name') }}
                    {{ Form::text('last_name', $player->last_name) }}
                    {{ Form::label('common_name', 'Common Name') }}
                    {{ Form::text('common_name', $player->common_name) }}
                </div>
            </div>
            <div class="col-lg-8 columns">
                <h4>Card Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Card Att1', 'Pace') }}
                            {{ $player->attr_admin('Card Att2', 'Shooting') }}
                            {{ $player->attr_admin('Card Att3', 'Passing') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Card Att4', 'Dribbling') }}
                            {{ $player->attr_admin('Card Att5', 'Defending') }}
                            {{ $player->attr_admin('Card Att6', 'Heading') }}
                        </ul>
                    </div>
                </div>
                <h4>Card Attributes</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Overall Rating') }}
                            <li>Card Type {{ Form::select('card_type', ['0' => 'Non Rare', '1' => 'Rare', '2' => 'IF', '3' => 'TOTS', '12' => 'Legend'], $player->card_type, ['class' => 'right existing-player-input']) }}</li>
                            <li>Card Set {{ Form::text('card_set', '', ['class' => 'right existing-player-input']) }}</li>
                            <li>Card Set {{ Form::text('item_type', $player->item_type, ['class' => 'right existing-player-input']) }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            <li>Position {{ Form::select('role', $role, $player->role, ['class' => 'right existing-player-input']) }}</li>
                            <li>Shirt Number {{ Form::selectRange('shirt_number', 1, 99, $player->shirt_number, ['class' => 'right existing-player-input']) }}</li>
                            <li>Asset ID {{ Form::text('asset_id', $player->asset_id, ['class' => 'right existing-player-input']) }}</li>
                        </ul>
                    </div>
                </div>
                <h4>Skill Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Ball Control') }}
                            {{ $player->attr_admin('Curve') }}
                            {{ $player->attr_admin('Finishing') }}
                            {{ $player->attr_admin('Heading Accuracy') }}
                            {{ $player->attr_admin('Long Shots') }}
                            {{ $player->attr_admin('Penalties') }}
                            {{ $player->attr_admin('Shot Power') }}
                            {{ $player->attr_admin('Standing Tackle') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Crossing') }}
                            {{ $player->attr_admin('Dribbling') }}
                            {{ $player->attr_admin('Free Kick Accuracy') }}
                            {{ $player->attr_admin('Long Passing') }}
                            {{ $player->attr_admin('Marking') }}
                            {{ $player->attr_admin('Short Passing') }}
                            {{ $player->attr_admin('Sliding Tackle') }}
                            {{ $player->attr_admin('Volleys') }}
                        </ul>
                    </div>
                </div>
                <h4>Mental Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Aggression') }}
                            {{ $player->attr_admin('Interceptions') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Positioning') }}
                            {{ $player->attr_admin('Vision') }}
                        </ul>
                    </div>
                </div>
                <h4>Physical Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Acceleration') }}
                            {{ $player->attr_admin('Balance') }}
                            {{ $player->attr_admin('Reactions') }}
                            {{ $player->attr_admin('Strength') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('Agility') }}
                            {{ $player->attr_admin('Jumping') }}
                            {{ $player->attr_admin('Sprint Speed') }}
                            {{ $player->attr_admin('Stamina') }}
                        </ul>
                    </div>
                </div>
                <h4>Goalkeeper Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('GK Diving') }}
                            {{ $player->attr_admin('GK Kicking') }}
                            {{ $player->attr_admin('GK Positioning') }}
                        </ul>
                    </div>
                    <div class="col-lg-6 columns">
                        <ul class="list-unstyled list-player-stats list-striped">
                            {{ $player->attr_admin('GK Handling') }}
                            {{ $player->attr_admin('GK Reflexes') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 columns">
        <h4>{{ $player->common_name }} Stats</h4>
        <hr>
        <table class="table table-striped">
            <tr>
                <td>Skill Moves</td>
                <td>
                    {{ Form::selectRange('skill_moves', 1, 5, $player->skill_moves) }}
                </td>
            </tr>
            <tr>
                <td>Weak Foot</td>
                <td>
                {{ Form::selectRange('weak_foot', 1, 5, $player->weak_foot) }}
                </td>
            </tr>
            <tr>
                <td>Club</td>
                <td>{{ Form::select('club_id', $club, $player->club_id) }}</td>
            </tr>
            <tr>
                <td>League</td>
                <td>{{ Form::select('league_id', $league, $player->league_id) }}</td>
            </tr>
            <tr>
                <td>Nationality</td>
                <td>{{ Form::select('nation_id', $nation, $player->nation_id) }}</td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>
                    <div class="row">
                        <div class="col-lg-4 columns">{{ Form::selectRange('day', 1, 31, substr($player->dob, -2)) }}</div>
                        <div class="col-lg-4 columns">{{ Form::selectMonth('month', substr($player->dob, -5, 2)) }}</div>
                        <div class="col-lg-4 columns">{{ Form::selectRange('year', 1900, 2014, substr($player->dob, 0, 4)) }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Joined Club</td>
                <td>{{ date('jS M Y', strtotime($player->join_date)) }}</td>
            </tr>
            <tr>
                <td>Height</td>
                <td>
                    <div class="row collapse">
                        <div class="small-8 columns">
                        {{ Form::selectRange('height', 150, 210, $player->height) }}
                        </div>
                        <div class="small-4 columns">
                            <span class="postfix">CM</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Weight</td>
                <td>
                    <div class="row collapse">
                        <div class="small-8 columns">
                        {{ Form::selectRange('weight', 50, 110, $player->weight) }}
                        </div>
                        <div class="small-4 columns">
                            <span class="postfix">KG</span>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Pref. Foot</td>
                <td>{{ Form::select('pref_foot', ['1' => 'Right', '2' => 'Left'], $player->pref_foot) }}</td>
            </tr>
            <tr>
                <td>Att. Workrate</td>
                <td>{{ Form::select('attrates', ['1' => 'Low', '0' => 'Medium', '2' => 'High'], $player->att_workrate) }}</td>
            </tr>
            <tr>
                <td>Def. Workrate</td>
                <td>{{ Form::select('defrates', ['1' => 'Low', '0' => 'Medium', '2' => 'High'], $player->def_workrate) }}</td>
            </tr>
        </table>
    </div>
    <div class="col-lg-12 columns">
        {{ Form::submit("Le'go!", ['class' => 'small button' ]) }}
    </div>
    {{ Form::close() }}
</div>
@stop
