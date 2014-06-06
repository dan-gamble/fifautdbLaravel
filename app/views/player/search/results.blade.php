@extends('layout.master')

@section('content')
<div class="row">
	<div class="col-lg-12">
        <div class="row">
			<div class="col-lg-12">
                <div>
                    {{ $players->links() }}
                </div>
				<p>Let cards be draggable to a <code>#nav</code> 'shortlist' icon that can hold an maximum of 11 players (If the user tries to drag a 12th player in they can choose which player to replace). You can then do multiple functions with said players. Mainly start a squad builder with all players in the shortlist.</p>
				<ul class="card-list">
					@foreach ($players as $player)
					<li>
						<a href="{{ $player->url_str() }}">@include('layout.card-14')</a>
					</li>
					@endforeach
				</ul>
                <table class="table table-striped">
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
                                <img src="/assets/img/players/{{ $player->asset_id }}.png" height="40" width="40">
                                <a href="{{ $player->url_str() }}">{{ $player->common_name }}</a><br>
                                <img src="/assets/img/nations/{{ $player->nation_id }}.png" height="16" width="26">
                            </td>
                            <td>{{ $player->overall_rating }}</td>
                            <td>{{ $player->role() }}</td>
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
                <div>
                    {{ $players->links() }}
                </div>
			</div>
		</div>
	</div>
</div>
@stop
