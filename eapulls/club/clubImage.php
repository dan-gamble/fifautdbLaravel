<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

$db = mysqli_connect('localhost','root','root','fifautdb');

$assets = mysqli_query($db, "SELECT asset_id FROM club_data_14 WHERE asset_id = '112658'");

foreach ($assets as $asset) {
    $url = "http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/images/clubbadges/web/s". $asset['asset_id'] . ".png";
    $img = "/vagrant/public/assets/img/clubs/" . $asset['asset_id'] . ".png";

    file_put_contents($img, file_get_contents($url));

    echo "Grabbed" . $asset['asset_id'];
}

?>
