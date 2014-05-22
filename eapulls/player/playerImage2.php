<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

$db = mysqli_connect('localhost','root','root','fifautdb');
$char = mysql_set_charset('utf8', $db);

$assets = mysqli_query($db, "SELECT asset_id FROM player_data_14");

foreach ($assets as $asset) {
    print_r($asset);
}

?>