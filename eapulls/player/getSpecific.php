<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function normalize($string) {
	setlocale(LC_CTYPE, 'en_GB.UTF-8');
	$string = iconv('UTF-8', "ASCII//TRANSLIT", $string);
	return utf8_encode($string);
}

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysql_set_charset('utf8', $db);

$url = "http://cdn.content.easports.com/media2012/fifa12ccplayer/58546120/498A0001_182168_ZONE_PLAYER_vKK.xml";

$xml = simplexml_load_file($url);
$xml = json_decode(json_encode($xml), TRUE);

$pname = $xml['Player']['PlayerName']['Attrib'];
	$fname = normalize($pname['0']['@attributes']['value']);
	$lname = normalize($pname['1']['@attributes']['value']);
	$cname = normalize($pname['2']['@attributes']['value']);
	if($cname == '' || $cname == NULL) {
		$cname = $fname.' '.$lname;
	}

$pinfo = $xml['Player']['PlayerInfo']['Attrib'];
	$doby = $pinfo['0']['@attributes']['year'];
	$dobm = $pinfo['0']['@attributes']['month'];
	$dobd = $pinfo['0']['@attributes']['day'];
	$dob = $doby.'/'.$dobm.'/'.$dobd;

	$joindy = $pinfo['1']['@attributes']['year'];
	$joindm = $pinfo['1']['@attributes']['month'];
	$joindd = $pinfo['1']['@attributes']['day'];
	$joind = $joindy.'/'.$joindm.'/'.$joindd;

	$height = $pinfo['6']['@attributes']['value'];
	$weight = $pinfo['7']['@attributes']['value'];
	$nation = $pinfo['16']['@attributes']['value'];
	$jnum = $pinfo['38']['@attributes']['value'];

	$position = $pinfo['53']['@attributes']['position_webid'];
	$role = $pinfo['53']['@attributes']['role_webid'];
	$preffoot = $pinfo['13']['@attributes']['value'];
	$wfoot = $pinfo['18']['@attributes']['value'];
	$smove = $pinfo['37']['@attributes']['value'];
	$attwr = $pinfo['50']['@attributes']['value'];
	$defwr = $pinfo['51']['@attributes']['value'];

	$ovr = $pinfo['4']['@attributes']['value'];

$patt = $xml['Player']['PlayerAttribute']['Attrib'];
	$accel = $patt['0']['@attributes']['value'];
	$sprint = $patt['1']['@attributes']['value'];
	$agil = $patt['2']['@attributes']['value'];
	$bal = $patt['3']['@attributes']['value'];
	$jump = $patt['4']['@attributes']['value'];
	$stam = $patt['5']['@attributes']['value'];
	$str = $patt['6']['@attributes']['value'];
	$react = $patt['7']['@attributes']['value'];
	$aggr = $patt['8']['@attributes']['value'];
	$inter = $patt['9']['@attributes']['value'];
	$pos = $patt['10']['@attributes']['value'];
	$vision = $patt['11']['@attributes']['value'];
	$contr = $patt['12']['@attributes']['value'];
	$cross = $patt['13']['@attributes']['value'];
	$drib = $patt['14']['@attributes']['value'];
	$finish = $patt['15']['@attributes']['value'];
	$fka = $patt['16']['@attributes']['value'];
	$heada = $patt['17']['@attributes']['value'];
	$passl = $patt['18']['@attributes']['value'];
	$passs = $patt['19']['@attributes']['value'];
	$mark = $patt['20']['@attributes']['value'];
	$pwrsha = $patt['21']['@attributes']['value'];
	$shpwr = $patt['22']['@attributes']['value'];
	$tacklestand = $patt['23']['@attributes']['value'];
	$tackleslide = $patt['24']['@attributes']['value'];
	$volleys = $patt['25']['@attributes']['value'];
	$curve = $patt['26']['@attributes']['value'];
	$penal = $patt['27']['@attributes']['value'];
	$gk_div = $patt['28']['@attributes']['value'];
	$gk_han = $patt['29']['@attributes']['value'];
	$gk_kic = $patt['30']['@attributes']['value'];
	$gk_ref = $patt['31']['@attributes']['value'];
	$gk_pos = $patt['32']['@attributes']['value'];

$asset = $pinfo['43']['@attributes']['value'];

$json2 = file_get_contents('http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/web/' . $asset . '.json');
$obj2 = json_decode($json2, true);

$s = $obj2['Item'];
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

$sql = "INSERT INTO player_data_14
(
	asset_id,
	first_name,
	last_name,
	common_name,
	dob,
	join_date,
	height,
	weight,
	nation_id,
	shirt_number,
	position,
	role,
	pref_foot,
	weak_foot,
	skill_moves,
	att_workrate,
	def_workrate,
	overall_rating,
	acceleration,
    sprint_speed,
    agility,
    balance,
    jumping,
    stamina,
    strength,
    reactions,
    aggression,
    interceptions,
    positioning,
    vision,
    ball_control,
    crossing,
    dribbling,
    finishing,
    free_kick_accuracy,
    heading_accuracy,
    long_passing,
    short_passing,
    marking,
    long_shots,
    shot_power,
    standing_tackle,
    sliding_tackle,
    volleys,
    curve,
    penalties,
    gk_diving,
    gk_handling,
    gk_kicking,
    gk_reflexes,
    gk_positioning,
    club_id,
    league_id,
    card_att1,
    card_att2,
    card_att3,
    card_att4,
    card_att5,
    card_att6,
    card_type,
    item_type,
    created_at,
    updated_at
)
VALUES
(
	'".mysqli_real_escape_string($db, $asset)."',
	'".mysqli_real_escape_string($db, $fname)."',
	'".mysqli_real_escape_string($db, $lname)."',
	'".mysqli_real_escape_string($db, $cname)."',
	'".mysqli_real_escape_string($db, $dob)."',
	'".mysqli_real_escape_string($db, $joind)."',
	'".mysqli_real_escape_string($db, $height)."',
	'".mysqli_real_escape_string($db, $weight)."',
	'".mysqli_real_escape_string($db, $nation)."',
	'".mysqli_real_escape_string($db, $jnum)."',
	'".mysqli_real_escape_string($db, $position)."',
	'".mysqli_real_escape_string($db, $role)."',
	'".mysqli_real_escape_string($db, $preffoot)."',
	'".mysqli_real_escape_string($db, $wfoot)."',
	'".mysqli_real_escape_string($db, $smove)."',
	'".mysqli_real_escape_string($db, $attwr)."',
	'".mysqli_real_escape_string($db, $defwr)."',
	'".mysqli_real_escape_string($db, $ovr)."',
	'".mysqli_real_escape_string($db, $accel)."',
	'".mysqli_real_escape_string($db, $sprint)."',
	'".mysqli_real_escape_string($db, $agil)."',
	'".mysqli_real_escape_string($db, $bal)."',
	'".mysqli_real_escape_string($db, $jump)."',
	'".mysqli_real_escape_string($db, $stam)."',
	'".mysqli_real_escape_string($db, $str)."',
	'".mysqli_real_escape_string($db, $react)."',
	'".mysqli_real_escape_string($db, $aggr)."',
	'".mysqli_real_escape_string($db, $inter)."',
	'".mysqli_real_escape_string($db, $pos)."',
	'".mysqli_real_escape_string($db, $vision)."',
	'".mysqli_real_escape_string($db, $contr)."',
	'".mysqli_real_escape_string($db, $cross)."',
	'".mysqli_real_escape_string($db, $drib)."',
	'".mysqli_real_escape_string($db, $finish)."',
	'".mysqli_real_escape_string($db, $fka)."',
	'".mysqli_real_escape_string($db, $heada)."',
	'".mysqli_real_escape_string($db, $passl)."',
	'".mysqli_real_escape_string($db, $passs)."',
	'".mysqli_real_escape_string($db, $mark)."',
	'".mysqli_real_escape_string($db, $pwrsha)."',
	'".mysqli_real_escape_string($db, $shpwr)."',
	'".mysqli_real_escape_string($db, $tacklestand)."',
	'".mysqli_real_escape_string($db, $tackleslide)."',
	'".mysqli_real_escape_string($db, $volleys)."',
	'".mysqli_real_escape_string($db, $curve)."',
	'".mysqli_real_escape_string($db, $penal)."',
	'".mysqli_real_escape_string($db, $gk_div)."',
	'".mysqli_real_escape_string($db, $gk_han)."',
	'".mysqli_real_escape_string($db, $gk_kic)."',
	'".mysqli_real_escape_string($db, $gk_ref)."',
	'".mysqli_real_escape_string($db, $gk_pos)."',
	'".mysqli_real_escape_string($db, $club)."',
	'".mysqli_real_escape_string($db, $league)."',
	'".mysqli_real_escape_string($db, $att1)."',
	'".mysqli_real_escape_string($db, $att2)."',
	'".mysqli_real_escape_string($db, $att3)."',
	'".mysqli_real_escape_string($db, $att4)."',
	'".mysqli_real_escape_string($db, $att5)."',
	'".mysqli_real_escape_string($db, $att6)."',
	'".mysqli_real_escape_string($db, $card_type)."',
	'".mysqli_real_escape_string($db, $item_type)."',
	NOW(),
	NOW()
)";
if (mysqli_query($db, $sql)) {
	echo "SQL inserted ";
} else {
	echo ("SQL Error " . mysqli_errno($db));
}

function get_string_between($string, $start, $end) {
	$last_end = 0;
	$matches = array();
	while (($ini = strpos($string, $start, $last_end)) !== false) {
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		$matches[] = substr($string, $ini, $len);
		$last_end = $ini + $len + strlen($end);
	}
	return $matches;
}

// Dump data

?>
