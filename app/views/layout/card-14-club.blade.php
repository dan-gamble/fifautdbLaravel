<div class="ut-card club-card-gold-rare">
    <div class="club-card-title">Club</div>
    <img class="club-card-badge" src="http://fh13.fhcdn.com/static/img/14/clubs/{{ $club->asset_id }}.png" height="35" width="35">
    <img class="club-card-nation" src="http://fh13.fhcdn.com/static/img/nations/{{ $club->league->nation_id }}.png" height="25" width="40">
    <img class="club-card-shirt" src="/assets/img/kits/{{ $club->asset_id }}_0.png" height="100" width="70">
    <div class="club-card-name">{{ $club->club_name_abbr15 }}</div>
</div>
