@extends('layout.master')

@section('page-heading')
{{ $player->common_name }}
@stop

@section('content')
<div class="row">
    {{ Form::open(['action' => 'AdminController@playerExistingCreate']) }}
    <div class="col-lg-7">
        <div class="row">
            <div class="col-lg-4">
                <h4>{{ $player->common_name }}</h4>
                <hr>
                @include('layout.card-14')
                <div>
                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name') }}
                        {{ Form::text('first_name', $player->first_name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('last_name', 'Last Name') }}
                        {{ Form::text('last_name', $player->last_name, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('common_name', 'Common Name') }}
                        {{ Form::text('common_name', $player->common_name, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h4>Card Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Card Att1', 'Pace') }}
                            {{ $player->attr_admin('Card Att2', 'Shooting') }}
                            {{ $player->attr_admin('Card Att3', 'Passing') }}
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Card Att4', 'Dribbling') }}
                            {{ $player->attr_admin('Card Att5', 'Defending') }}
                            {{ $player->attr_admin('Card Att6', 'Heading') }}
                        </ul>
                    </div>
                </div>
                <h4>Card Attributes</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Overall Rating') }}
                            <li>Card Type {{ Form::select('card_type', ['0' => 'Non Rare', '1' => 'Rare', '2' => 'IF', '3' => 'TOTS', '12' => 'Legend'], $player->card_type, ['class' => 'right form-control']) }}</li>
                            <li>Card Set {{ Form::text('card_set', '', ['class' => 'right form-control']) }}</li>
                            <li>Card Set {{ Form::text('item_type', $player->item_type, ['class' => 'right form-control']) }}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            <li>Position {{ Form::select('role', $role, $player->role, ['class' => 'right form-control']) }}</li>
                            <li>Shirt Number {{ Form::selectRange('shirt_number', 1, 99, $player->shirt_number, ['class' => 'right form-control']) }}</li>
                            <li>Asset ID {{ Form::text('asset_id', $player->asset_id, ['class' => 'right form-control']) }}</li>
                        </ul>
                    </div>
                </div>
                <h4>Skill Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
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
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
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
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Aggression') }}
                            {{ $player->attr_admin('Interceptions') }}
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Positioning') }}
                            {{ $player->attr_admin('Vision') }}
                        </ul>
                    </div>
                </div>
                <h4>Physical Stats</h4>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('Acceleration') }}
                            {{ $player->attr_admin('Balance') }}
                            {{ $player->attr_admin('Reactions') }}
                            {{ $player->attr_admin('Strength') }}
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
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
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('GK Diving') }}
                            {{ $player->attr_admin('GK Kicking') }}
                            {{ $player->attr_admin('GK Positioning') }}
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled list-player-stats">
                            {{ $player->attr_admin('GK Handling') }}
                            {{ $player->attr_admin('GK Reflexes') }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <h4>{{ $player->common_name }} Stats</h4>
        <hr>
        <div class="form-horizontal">
            <div class="form-group">
                {{ Form::label('skill_moves', 'Skill Moves', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::selectRange('skill_moves', 1, 5, $player->skill_moves, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('weak_foot', 'Weak Foot', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::selectRange('weak_foot', 1, 5, $player->weak_foot, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('club', 'Club', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('club_id', $club, $player->club_id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('league', 'League', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('league_id', $league, $player->league_id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nationality', 'Nationality', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('nation_id', $nation, $player->nation_id, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('day', 'Date of Birth', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    <div class="form-inline">
                        {{ Form::selectRange('day', 1, 31, substr($player->dob, -2), ['class' => 'form-control']) }}
                        {{ Form::selectMonth('month', substr($player->dob, -5, 2), ['class' => 'form-control']) }}
                        {{ Form::selectRange('year', 1900, 2014, substr($player->dob, 0, 4), ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('height', 'Height', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    <div class="input-group">
                        {{ Form::selectRange('height', 150, 210, $player->height, ['class' => 'form-control']) }}
                        <span class="input-group-btn">
                            <button class="btn btn-default">cm</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('weight', 'Weight', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    <div class="input-group">
                        {{ Form::selectRange('weight', 50, 110, $player->weight, ['class' => 'form-control']) }}
                        <span class="input-group-btn">
                            <button class="btn btn-default">kg</button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('pref_foot', 'Pref. Foot', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('pref_foot', ['1' => 'Right', '2' => 'Left'], $player->pref_foot, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('attrates', 'Att. Workrate', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('attrates', ['1' => 'Low', '0' => 'Medium', '2' => 'High'], $player->att_workrate, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('defrates', 'Def. Workrate', ['class' => 'col-lg-3 control-label']) }}
                <div class="col-lg-9">
                    {{ Form::select('defrates', ['1' => 'Low', '0' => 'Medium', '2' => 'High'], $player->def_workrate, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        {{ Form::submit("Le'go!", ['class' => 'btn btn-primary' ]) }}
    </div>
    {{ Form::close() }}
</div>
@stop
