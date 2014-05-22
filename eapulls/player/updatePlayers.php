<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysql_set_charset('utf8', $db);

$players = mysqli_query($db, "SELECT * FROM xx_player_data_14");

while ($row = mysqli_fetch_assoc($players)) {

	$json = file_get_contents('http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/web/' . $row['asset_id'] . '.json');
	$obj = json_decode($json, true);

	$s = $obj['Item'];
		$club = $s['ClubId'];
		$league = $s['LeagueId'];
		$att1 = $s['Attribute1'];
		$att2 = $s['Attribute2'];
		$att3 = $s['Attribute3'];
		$att4 = $s['Attribute4'];
		$att5 = $s['Attribute5'];
		$att6 = $s['Attribute6'];
		$card_type = $s['Rare'];
		$item_type = $s['ItemType'];

	$asset = $row['asset_id'];

	$sql = "UPDATE
			xx_player_data_14
		SET
			club_id = '$club',
			league_id = '$league',
			card_att1 = '$att1',
			card_att2 = '$att2',
			card_att3 = '$att3',
			card_att4 = '$att4',
			card_att5 = '$att5',
			card_att6 = '$att6',
			card_type = '$card_type',
			item_type = '$item_type'
		WHERE
			asset_id = '$asset'
	";
	if (mysqli_query($db, $sql)) {
		echo "SQL updated ";
	} else {
		echo ("SQL Error " . mysqli_errno($db));
	}
}

?>
