@extends('layout.master')

@section('content')
<div class="row">
	<div class="large-12 columns">
        <div class="row">
			<div class="large-9 columns">
				<div class="row ul-0">
					<div class="large-5 columns">
                        {{ $players->appends(Input::except(array('page')))->links('layout.pagination') }}
					</div>
					<div class="large-5 large-offset-2 columns">
						<dl class="sub-nav right">
							<dt>Filter:</dt>
							<dd class="active"><a href="#">IF</a></dd>
							<dd><a href="#">No IF's</a></dd>
						</dl>
					</div>
				</div>
				<p>Let cards be draggable to a <code>#nav</code> 'shortlist' icon that can hold an maximum of 11 players (If the user tries to drag a 12th player in they can choose which player to replace). You can then do multiple functions with said players. Mainly start a squad builder with all players in the shortlist.</p>
				<ul class="large-block-grid-6">
					@foreach ($players as $player)
					<li>
						<a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
					</li>
					@endforeach
				</ul>
                <table class="large-12">
                    <thead>
                        <tr>
                            <th>Player</th>
                            <th>Rating</th>
                            <th>POS</th>
                            <th>PAC</th>
                            <th>SHO</th>
                            <th>PAS</th>
                            <th>DRI</th>
                            <th>DEF</th>
                            <th>HEA</th>
                            <th>S/M</th>
                            <th>W/F</th>
                            <th>Att. WR</th>
                            <th>Def. WR</th>
                            <th>Foot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($players as $player)
                        <tr>
                            <td>
                                <img src="http://fh13.fhcdn.com/static/img/14/players/{{ $player->asset_id }}.png" height="40" width="40">
                                <a href="{{ $player->url_str() }}">{{ $player->common_name }}</a><br>
                                <img src="http://www.futwiz.com/assets/img/fifa14/flags/{{ $player->nation_id }}.png" height="16" width="26">
                            </td>
                            <td>{{ $player->overall_rating }}</td>
                            <td>{{ $player->role }}</td>
                            <td>{{ $player->card_att1 }}</td>
                            <td>{{ $player->card_att2 }}</td>
                            <td>{{ $player->card_att3 }}</td>
                            <td>{{ $player->card_att4 }}</td>
                            <td>{{ $player->card_att5 }}</td>
                            <td>{{ $player->card_att6 }}</td>
                            <td>{{ $player->skill_moves }}</td>
                            <td>{{ $player->weak_foot }}</td>
                            <td>{{ $player->att_workrate() }}</td>
                            <td>{{ $player->def_workrate() }}</td>
                            <td>{{ $player->pref_foot() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
				<div class="row ul-0">
					<div class="large-5 columns">
                        {{ $players->appends(Input::except(array('page')))->links('layout.pagination') }}
					</div>
					<div class="large-5 large-offset-2 columns">
						<dl class="sub-nav right">
                            <dt>Filter:</dt>
                            <dd class="active"><a href="#">IF</a></dd>
                            <dd><a href="#">No IF's</a></dd>
						</dl>
					</div>
				</div>
			</div>
            <div class="large-3 columns">
                {{ Form::open() }}
                <div class="large-12">
                    <fieldset id="player-search-nation">
                        <legend>Nation</legend>
                        <ul class="list-unstyled list-h290">
                            @for ($i = 1; $i < 3; $i++)
                            <li><input id="checkbox1" type="checkbox" checked><label for="checkbox1">Nation Selected {{ $i }}</label></li>
                            @endfor
                            <li class="divide"></li>
                            @for ($i = 1; $i < 9; $i++)
                            <li><input id="checkbox1" type="checkbox"><label for="checkbox1">Nation Unselected {{ $i }}</label></li>
                            @endfor
                        </ul>
                    </fieldset>
                </div>
            </div>
		</div>
	</div>
</div>
@stop
