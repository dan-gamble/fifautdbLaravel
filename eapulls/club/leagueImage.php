<?php

header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

$db = mysqli_connect('localhost','root','root','fifautdb');

$assets = mysqli_query($db, "SELECT asset_id FROM league_data_14 WHERE asset_id = '2118'");

foreach ($assets as $asset) {
	$url = "http://cdn.content.easports.com/fifa/fltOnlineAssets/C74DDF38-0B11-49b0-B199-2E2A11D1CC13/2014/fut/items/images/leagueLogos_sm/web/l" . $asset['asset_id'] . ".png";
	$url_headers = @get_headers($url);
	if($url_headers[0] == 'HTTP/1.0 200 OK') {
		$img = "/vagrant/public/assets/img/leagues/" . $asset['asset_id'] . ".png";

		file_put_contents($img, file_get_contents($url));

		echo "Grabbed" . $asset['asset_id'] . "\r\n";
	}
	else {
		echo $asset['asset_id'] . " Does not exist" . "\r\n";
	}
}

?>
