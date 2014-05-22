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

$parsed = get_string_between($data, '<trans-unit resname="FUT_LEGEND', '</trans-unit>');

foreach ($parsed as $parse) {
    $id = get_string_between($parse, '_DESCR_', '">');
    $desc = get_string_between($parse, '<source>', '</source>');

    $url = "http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/web/" . $id[0] . ".json";
    $url_headers = @get_headers($url);

    if($url_headers[0] == 'HTTP/1.0 200 OK') {
        $json = file_get_contents($url);
        $obj = json_decode($json, true);

        $s = $obj['Item'];
            $fname = normalize($s['FirstName']);
            $lname = normalize($s['LastName']);
            $cname = normalize($s['CommonName']);
            if($cname == '' || $cname == NULL) {
                $cname = $fname.' '.$lname;
            }
            $doby = $s['DateOfBirth']['Year'];
            $dobm = $s['DateOfBirth']['Month'];
            $dobd = $s['DateOfBirth']['Day'];
            $dob = $doby.'/'.$dobm.'/'.$dobd;
            $height = $s['Height'];

            $preffoot = $s['PreferredFoot'];
            if ($preffoot == 'Right') {
                $preffoot = 1;
            } else {
                $preffoot = 2;
            }

            $club = $s['ClubId'];
            $league = $s['LeagueId'];
            $nation = $s['NationId'];

            $rating = $s['Rating'];
            $att1 = $s['Attribute1'];
            $att2 = $s['Attribute2'];
            $att3 = $s['Attribute3'];
            $att4 = $s['Attribute4'];
            $att5 = $s['Attribute5'];
            $att6 = $s['Attribute6'];

            $card_type = 12;
            $item_type = $s['ItemType'];

        $sql = "INSERT INTO player_data_14
        (
            asset_id,
            first_name,
            last_name,
            common_name,
            dob,
            height,
            club_id,
            league_id,
            nation_id,
            pref_foot,
            overall_rating,
            card_att1,
            card_att2,
            card_att3,
            card_att4,
            card_att5,
            card_att6,
            card_type,
            item_type,
            card_set
        )
        VALUES
        (
            '$id[0]',
            '$fname',
            '$lname',
            '$cname',
            '$dob',
            '$height',
            '$club',
            '$league',
            '$nation',
            '$preffoot',
            '$rating',
            '$att1',
            '$att2',
            '$att3',
            '$att4',
            '$att5',
            '$att6',
            '$card_type',
            '$item_type',
            'Legends'
        )";
        if (mysqli_query($db, $sql)) {
            echo "SQL inserted [" . $id[0] . "] = ";
        } else {
            echo ("SQL Error " . mysqli_errno($db) . " [" . $id[0] . "] - ");
        }
    }
}


