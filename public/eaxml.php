<?php

// for ($n=1; $n <= 5; $n++) {
// Init curl request
	$curl = curl_init();

// Set the URL we want to fetch (the player)
	curl_setopt($curl, CURLOPT_URL, "http://www.easports.com/fifa/football-club/data/creationcentre/request/media_content;full?types=FCZ_PLAYER&sort_asc=false&order_by=serverDate&page_num=1630&include_count=true&attributes=cz_visibility%232*cz_isOfficial%23true&page_size=10&rndsd=jlJxQni4r6r36162USy5IOKpDbWdsiRC");

// Tell curl to return raw data
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

// Tell curl to timeout after a set time
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

// Tell curl to follow any redirects
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

// Array of cookies we probably need
	$cookies = array(
		'EASW_KEY=98953af1-9997-45d2-9df1-4af3bfe2d405;',
		'EASFC-WEB-SESSION=qer07i0gfsmpigl1men7c64gc2;',
		'XSRF-TOKEN=fb9b3ffdece429bea7d3553f9da32d626b42e1a8;',
		);

// Provide the session cookie
	curl_setopt($curl, CURLOPT_COOKIE, implode(' ', $cookies));

// Get the raw data from the curl request
	$data = curl_exec($curl);

// Close the curl connection
	curl_close($curl);

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

$fullstring = $data;
$parsed = get_string_between($data, 'uri="', '"/>');

// Dump data
$open = file_get_contents($parsed[0]);
$open = str_replace(array("\n", "\r", "\t"), '', $open);
$open = trim(str_replace('"', "'", $open));

$simpleXml = simplexml_load_string($open);

$json = json_encode($simpleXml);

var_dump($json);
// }

?>
