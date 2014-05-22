<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function normalize($string) {
	setlocale(LC_CTYPE, 'en_GB.UTF-8');
	$string = iconv('UTF-8', "ASCII//TRANSLIT", $string);
	return $string;
}

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysql_set_charset('utf8', $db);

for ($n=1; $n <= 5; $n++) {
// Init curl request
	$curl = curl_init();

// Set the URL we want to fetch (the player)
	curl_setopt($curl, CURLOPT_URL, "http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_TEAM&sort_asc=false&order_by=serverDate&attributes=cz_visibility%232*cz_isOfficial%23true*cz_league!78&page_size=12500&page_num=" . $n . "&include_count=true&rndsd=973141UmawQY97R2mtE4Ish0l0itStYs");

// Tell curl to return raw data
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// Tell curl to timeout after a set time
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

// Tell curl to follow any redirects
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Array of cookies we probably need
	$cookies = array(
		'EASW_KEY=98953af1-9997-45d2-9df1-4af3bfe2d405;',
		'EASFC-WEB-SESSION=l019ol3md542ougjkrq1e2hep2;',
		'XSRF-TOKEN=fb9b3ffdece429bea7d3553f9da32d626b42e1a8;',
		);

// Provide the session cookie
	curl_setopt($curl, CURLOPT_COOKIE, implode(' ', $cookies));

// Get the raw data from the curl request
	$data = curl_exec($curl);

// Close the curl connection
	curl_close($curl);

	$fullstring = $data;
	$parsed = get_string_between($data, 'uri="', '"/>');

	for ($i=1; $i <= 150 ; $i++) {
		$xml = simplexml_load_file($parsed[$i]);
		$xml = json_decode(json_encode($xml), TRUE);

		$tinfo = $xml['Team']['TeamInfo']['Attrib'];
			$tname = normalize($tinfo['0']['@attributes']['value']);
			$country = normalize($tinfo['2']['@attributes']['value']);
			$asset = $tinfo['11']['@attributes']['value'];

		$sql = "INSERT INTO club_data_14
		(
			club_name,
			nation_id,
			asset_id
		)
		VALUES
		(
			'".mysqli_real_escape_string($db, $tname)."',
			'".mysqli_real_escape_string($db, $country)."',
			'".mysqli_real_escape_string($db, $asset)."'
		)";
		if (mysqli_query($db, $sql)) {
			echo "SQL inserted " . $n . " [" . $i . "] = ";
		} else {
			echo ("SQL Error " . mysqli_errno($db) . " " . $n . " [" . $i . "] - ");
		}
	}
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
