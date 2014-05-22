<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function role($d_pos)
    {
        $role = $d_pos;
        if ($role == 'LW') {
            $role = '27';
        } elseif ($role == 'ST') {
            $role = '25';
        } elseif ($role == 'RW') {
            $role = '23';
        } elseif ($role == 'CF') {
            $role = '21';
        } elseif ($role == 'CAM') {
            $role = '18';
        } elseif ($role == 'LM') {
            $role = '16';
        } elseif ($role == 'CM') {
            $role = '14';
        } elseif ($role == 'RM') {
            $role = '12';
        } elseif ($role == 'CDM') {
            $role = '10';
        } elseif ($role == 'LWB') {
            $role = '8';
        } elseif ($role == 'LB') {
            $role = '7';
        } elseif ($role == 'CB') {
            $role = '5';
        } elseif ($role == 'RB') {
            $role = '3';
        } elseif ($role == 'RWB') {
            $role = '2';
        } else {
            $role = '';
        }
        return $role;
    }

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysqli_set_charset($db, 'utf8');

// Init curl request
$curl = curl_init();

// Set the URL we want to fetch (the player)
curl_setopt($curl, CURLOPT_URL, "https://utas.s2.fut.ea.com/ut/showofflink/d7Mx3TjxnK8cA");
// curl_setopt($curl, CURLOPT_URL, "https://utas.fut.ea.com/ut/showofflink/d7Mx3TjxnK8cA");

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

// $json = file_get_contents('https://utas.fut.ea.com/ut/showofflink/d7Mx3TjxnK8cA');
$json = file_get_contents('https://utas.s2.fut.ea.com/ut/showofflink/d7Mx3TjxnK8cA');
$obj = json_decode($json, true);

for ($i = 0; $i <= 22; $i++) {
    $d = $obj['data']['squad']['0']['players'][$i]['itemData'];
        $d_rating = $d['rating'];
        $d_asset = $d['assetId'];
        $d_pos = $d['preferredPosition'];
        $d_role = role($d_pos);
        $d_cardType = 3;
        $d_att1 = $d['attributeList'][0]['value'];
        $d_att2 = $d['attributeList'][1]['value'];
        $d_att3 = $d['attributeList'][2]['value'];
        $d_att4 = $d['attributeList'][3]['value'];
        $d_att5 = $d['attributeList'][4]['value'];
        $d_att6 = $d['attributeList'][5]['value'];
        $card_set = 'TOTS Serie A';

    $sql = "INSERT INTO `player_data_14` (
    `id`,
    `asset_id`,
    `first_name`,
    `last_name`,
    `common_name`,
    `overall_rating`,
    `card_att1`,
    `card_att2`,
    `card_att3`,
    `card_att4`,
    `card_att5`,
    `card_att6`,
    `card_type`,
    `item_type`,
    `card_set`,
    `club_id`,
    `league_id`,
    `nation_id`,
    `shirt_number`,
    `dob`,
    `join_date`,
    `height`,
    `weight`,
    `position`,
    `role`,
    `pref_foot`,
    `weak_foot`,
    `skill_moves`,
    `att_workrate`,
    `def_workrate`,
    `acceleration`,
    `sprint_speed`,
    `agility`,
    `balance`,
    `jumping`,
    `stamina`,
    `strength`,
    `reactions`,
    `aggression`,
    `interceptions`,
    `positioning`,
    `vision`,
    `ball_control`,
    `crossing`,
    `dribbling`,
    `finishing`,
    `free_kick_accuracy`,
    `heading_accuracy`,
    `long_passing`,
    `short_passing`,
    `marking`,
    `long_shots`,
    `shot_power`,
    `standing_tackle`,
    `sliding_tackle`,
    `volleys`,
    `curve`,
    `penalties`,
    `gk_diving`,
    `gk_handling`,
    `gk_kicking`,
    `gk_reflexes`,
    `gk_positioning`,
    `created_at`,
    `updated_at`
    )
    SELECT
    NULL,
    `asset_id`,
    `first_name`,
    `last_name`,
    `common_name`,
    '$d_rating',
    '$d_att1',
    '$d_att2',
    '$d_att3',
    '$d_att4',
    '$d_att5',
    '$d_att6',
    '$d_cardType',
    `item_type`,
    '$card_set',
    `club_id`,
    `league_id`,
    `nation_id`,
    `shirt_number`,
    `dob`,
    `join_date`,
    `height`,
    `weight`,
    '$d_pos',
    `role`,
    `pref_foot`,
    `weak_foot`,
    `skill_moves`,
    `att_workrate`,
    `def_workrate`,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    0,
    NOW(),
    NOW()
    FROM
    `player_data_14`
    WHERE
    `asset_id` = '$d_asset'
    ";
    if (mysqli_query($db, $sql)) {
        echo "SQL inserted ";
    } else {
        echo ("SQL Error " . mysqli_errno($db));
    }
}

$sql_dupe = "DELETE n1 FROM `player_data_14` n1, `player_data_14` n2 WHERE n1.card_set = n2.card_set AND n1.asset_id = n2.asset_id AND n1.id < n2.id";

if (mysqli_query($db, $sql_dupe)) {
    echo "Dupes Erased ";
} else {
    echo ("SQL Error " . mysqli_errno($db));
}
