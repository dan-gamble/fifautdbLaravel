<div class="card-container">
	<div class="ut-card {{ $player->card_colour() }}">
		<div class="card-workrates">
			<div class="wr1
			    @if ($player->att_workrate() == 'Low')
			    wr-low
			    @elseif ($player->att_workrate() == 'Medium')
			    wr-med
			    @else
			    wr-high
			    @endif
			"></div>
			<div class="wr2
			    @if ($player->def_workrate() == 'Low')
			    wr-low
			    @elseif ($player->def_workrate() == 'Medium')
			    wr-med
			    @else
			    wr-high
			    @endif
			"></div>
		</div>
		<div class="card-rating">{{ $player->overall_rating }}</div>
		<div class="card-name">{{ $player->card_name() }}</div>
		<div class="card-position">{{ $player->role() }}</div>
		<div class="card-nation">
			<img src="/assets/img/nations/{{ $player->nation_id }}.png" height="16" width="26">
		</div>
		<div class="card-club">
			<img src="/assets/img/clubs/{{ $player->club_id }}.png" height="27" width="27">
		</div>
		<div class="card-picture">
			<img src="/assets/img/players/{{ $player->asset_id }}.png" height="74" width="74">
		</div>
		<div class="card-skill">
			S/M: {{ $player->skill_moves }} <i class="fa fa-star"></i>
		</div>
		<div class="card-foot">
			W/F: {{ $player->weak_foot }} <i class="fa fa-star"></i>
		</div>
		<div class="card-attr card-attr1">{{ $player->card_att1 }} PAC</div>
		<div class="card-attr card-attr2">{{ $player->card_att2 }} SHO</div>
		<div class="card-attr card-attr3">{{ $player->card_att3 }} PAS</div>
		<div class="card-attr card-attr4">{{ $player->card_att4 }} DRI</div>
		<div class="card-attr card-attr5">{{ $player->card_att5 }} DEF</div>
		<div class="card-attr card-attr6">{{ $player->card_att6 }} HEA</div>
	</div>
</div>
