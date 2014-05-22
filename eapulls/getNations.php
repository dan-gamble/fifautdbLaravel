<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function normalize($string) {
    setlocale(LC_CTYPE, 'en_GB.UTF-8');
    $string = iconv('UTF-8', "ASCII//TRANSLIT", $string);
    return $string;
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

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysqli_set_charset($db, 'utf8');

// Init curl request
$curl = curl_init();

// Set the URL we want to fetch (the player)
curl_setopt($curl, CURLOPT_URL, "http://www.easports.com/iframe/fut/bundles/futweb/web/flash/xml/localization/messages.en_GB.xml");

// Tell curl to return raw data
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// Tell curl to timeout after a set time
curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

// Tell curl to follow any redirects
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Array of cookies we probably need
$cookies = array(
    'EASW_KEY=98953af1-9997-45d2-9df1-4af3bfe2d405;',
    'EASFC-WEB-SESSION=ag0drfcana6g2566pqsa3vbkd0;',
    'XSRF-TOKEN=fb9b3ffdece429bea7d3553f9da32d626b42e1a8;',
);

// Provide the session cookie
curl_setopt($curl, CURLOPT_COOKIE, implode(' ', $cookies));

// Get the raw data from the curl request
$data = curl_exec($curl);

// Close the curl connection
curl_close($curl);

$fullstring = $data;

$parsed_name_full = get_string_between($data, '<trans-unit resname="search.nationName', '</trans-unit>');
$parsed_name_abbr3 = get_string_between($data, '<trans-unit resname="nationAbbrvBy', '</trans-unit>');

foreach ($parsed_name_full as $parse_full) {
    $id = get_string_between($parse_full, '.nation', '">');
    $nation = get_string_between($parse_full, '<source>', '</source>');
    $array_full = [
        0 => $id[0],
        1 => $nation[0],
    ];
    $sql = "INSERT INTO nation_data_14
		(
			asset_id,
			nation_name
		)
		VALUES
		(
			'".mysqli_real_escape_string($db, $array_full[0])."',
			'".mysqli_real_escape_string($db, $array_full[1])."'
		)";
    if (mysqli_query($db, $sql)) {
        echo "SQL inserted ";
    } else {
        echo ("SQL Error " . mysqli_errno($db));
    }
}
foreach ($parsed_name_abbr3 as $parse_abbr3) {
    $id = get_string_between($parse_abbr3, 'ID_', '">');
    $nation = get_string_between($parse_abbr3, '<source>', '</source>');
    $array_abbr3 = [
        0 => $id[0],
        1 => $nation[0],
    ];
    $sql = "UPDATE nation_data_14 SET nation_name_abbr3 = '$array_abbr3[1]' WHERE asset_id = '$array_abbr3[0]'";
    if (mysqli_query($db, $sql)) {
        echo "SQL inserted ";
    } else {
        echo ("SQL Error " . mysqli_errno($db));
    }
}