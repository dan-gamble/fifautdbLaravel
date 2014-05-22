<?
for ($i=0; $i < 2 ; $i++) {
	$xml = simplexml_load_file('http://cdn.content.easports.com/media2012/fifa12ccplayer/58546120/498A0001_5461_ZONE_PLAYER_uXv.xml');
	$xml = json_decode(json_encode($xml), TRUE);

	echo "<pre>";
	$name = $xml['Player']['PlayerName']['Attrib']['0']['@attributes']['value'];
	echo $name;
	print_r($xml['Player']);
	echo "</pre>";
}
?>
