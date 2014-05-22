<?php

require 'eaconnect.php';

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function normalize($string) {
	setlocale(LC_CTYPE, 'en_GB.UTF-8');
	$string = iconv('UTF-8', "ASCII//TRANSLIT", $string);
	return $string;
}

$xml = simplexml_load_file('http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?attributes=cz_visibility%232%2Acz_isOfficial%23true%26include_count=true%26order_by=serverDate%26page_num=1630%26page_size=10%26rndsd=jlJxQni4r6r36162USy5IOKpDbWdsiRC%26sort_asc=false%26types=FCZ_PLAYER');
$xmlde = json_decode(json_encode($xml), TRUE);

echo "<pre>";
var_dump($xml);
var_dump($xmlde);
echo "</pre>";

if(@fopen('http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?attributes=cz_visibility%232%2Acz_isOfficial%23true%26include_count=true%26order_by=serverDate%26page_num=1630%26page_size=10%26rndsd=jlJxQni4r6r36162USy5IOKpDbWdsiRC%26sort_asc=false%26types=FCZ_PLAYER','r')) {

	echo "<pre>";
	var_dump($xml);
	echo "</pre>";

	// $db = mysqli_connect('localhost','root','root','fifautdb');
	// $json = file_get_contents('http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/web/'.$n.'.json');
	// $obj = json_decode($json, true);
	// $s = $obj['Item'];

	// $fname = $s['FirstName'];
	// $lname = $s['LastName'];
	// $cname = $s['CommonName'];
	// if($cname == '' || $cname == NULL) {
	// 	$cname = $fname.' '.$lname;
	// }
	// $height = $s['Height'];

	// $doby = $s['DateOfBirth']['Year'];
	// $dobm = $s['DateOfBirth']['Month'];
	// $dobd = $s['DateOfBirth']['Day'];
	// $dob = $doby.'/'.$dobm.'/'.$dobd;

	// $foot = $s['PreferredFoot'];
	// $club = $s['ClubId'];
	// $club = $s['LeagueId'];
	// $nation = $s['NationId'];
	// $rating = $s['Rating'];
	// $att1 = $s['Attribute1'];
	// $att2 = $s['Attribute2'];
	// $att3 = $s['Attribute3'];
	// $att4 = $s['Attribute4'];
	// $att5 = $s['Attribute5'];
	// $att6 = $s['Attribute6'];
	// $card_type = $s['Rare'];
	// $item_type = $s['ItemType'];

	// $sql = "INSERT INTO player_data_14 (first_name, last_name, common_name, height, dob, pref_foot, club_id, league_id, nation_id, overall_rating, card_att1, card_att2, card_att3, card_att4, card_att5, card_att6, card_type, item_type, asset_id) VALUES ('".mysqli_real_escape_string($db, $fname)."','".mysqli_real_escape_string($db, $lname)."','".mysqli_real_escape_string($db, $cname)."','".mysqli_real_escape_string($db, $height)."','".mysqli_real_escape_string($db, $dob)."','".mysqli_real_escape_string($db, $foot)."','".mysqli_real_escape_string($db, $club)."','".mysqli_real_escape_string($db, $club)."','".mysqli_real_escape_string($db, $nation)."','".mysqli_real_escape_string($db, $rating)."','".mysqli_real_escape_string($db, $att1)."','".mysqli_real_escape_string($db, $att2)."','".mysqli_real_escape_string($db, $att3)."','".mysqli_real_escape_string($db, $att4)."','".mysqli_real_escape_string($db, $att5)."','".mysqli_real_escape_string($db, $att6)."','".mysqli_real_escape_string($db, $card_type)."','".mysqli_real_escape_string($db, $item_type)."','".mysqli_real_escape_string($db, $n)."')";
	// if (mysqli_query($db, $sql)) {
	// 	echo "SQL inserted";
	// } else {
	// 	echo ("SQL Error" . mysqli_errno($db));
	// }
} else {
	echo "Can't open ".$n;
}
?>
