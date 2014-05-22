<?php
$account= '1';
$email 	= 'dangamble89@gmail.com';
$pass 	= 'H3dg3h0g';
$answer = 'North Avenue';


$cookie = __DIR__ . '/cookie_'.$account.'.txt';

@unlink( $cookie );

$ulocal = "en_GB";
$dispname = "bot";
$locale = "en-GB";
$time = microtime( true );

echo '1:<br/>';
$ch = curl_init( 'http://www.easports.com/pl/fifa/football-club/ultimate-team' );
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';
ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$location = trim( $exp2[1] );

		break;
	}
}





//Get cookie
preg_match( '/EASFC\-WEB\-SESSION\=(.*?)\;/i', $r, $websid );
$websid = $websid[0];

preg_match( '/XSRF\-TOKEN\=(.*?)\;/i', $r, $xsrf );
$xsrf = $xsrf[0];

echo '2:<br/>';
$ch = curl_init( $location );
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, 'http://www.easports.com/pl/fifa/football-club/ultimate-team');
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';
ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';



//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$fidLocation = trim( $exp2[1] );

		break;
	}
}

// Get FID
preg_match( '/fid\=(.*)/', $fidLocation, $fid );
$fid = $fid[1];

echo '3:<br/>';
$ch = curl_init( $fidLocation );
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $location);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';
ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';



//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$loginLocation = trim( $exp2[1] );

		break;
	}
}



$loginData = '_eventId=submit&_rememberMe=on&email=' . urlencode( $email ) . '&facebookAuth=&password=' . urlencode( $pass ) . '&rememberMe=on';

echo '4:<br/>';
$ch = curl_init( $loginLocation );
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $loginData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $fidLocation );
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie );
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Content-Length: ' . strlen( $loginData ),
	'Content-Type:application/x-www-form-urlencoded'
	));
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);
echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';
ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';


//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$authLocation = trim( $exp2[1] );

		break;
	}
}

echo '5:<br/>';
echo $authLocation;
$ch = curl_init( $authLocation );
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $location);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$checkLocation = trim( $exp2[1] );

		break;
	}
}

echo '6:<br/>';
echo $checkLocation.'<br/>';
$ch = curl_init( $checkLocation);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $authLocation);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$utLocation = trim( $exp2[1] );

		break;
	}
}

echo '7:<br/>';
echo $utLocation.'<br/>';
$ch = curl_init( $utLocation);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $checkLocation);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$loc5 = trim( $exp2[1] );

		break;
	}
}

echo '8:<br/>';
echo $loc5.'<br/>';
$ch = curl_init( $loc5);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $utLocation);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$locX = trim( $exp2[1] );

		break;
	}
}

echo '9:<br/>';
echo $locX.'<br/>';
$ch = curl_init( $locX);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $loc5);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$locY = trim( $exp2[1] );

		break;
	}
}

echo '10:<br/>';
echo $locY.'<br/>';
$ch = curl_init( $locY);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $locX);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENt:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';


echo '<br/><br/>-----------==================------------------<br/>';

$loc6 = 'http://www.easports.com/iframe/fut/?locale=en_US&baseShowoffUrl=http%3A%2F%2Fwww.easports.com%2Ffifa%2Ffootball-club%2Fultimate-team%2Fshow-off&guest_app_uri=http%3A%2F%2Fwww.easports.com%2Ffifa%2Ffootball-club%2Fultimate-team';
echo '11:<br/>';
echo $loc6.'<br/>';
$ch = curl_init( $loc6);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $utLocation);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';

echo '<br/><br/>-----------==================------------------<br/>';

//Get next location
$exp = explode( "\n", $r );
foreach( $exp AS $header ) {
	$exp2 = explode( 'ation:', $header );

	if( $exp2[0] == 'Loc' ) {
		$loc7 = trim( $exp2[1] );

		break;
	}
}

echo '12:<br/>';
echo $loc7.'<br/>';
$ch = curl_init( $loc7);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_REFERER, $utLocation);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie );
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // enable tracking
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Host: accounts.ea.com',
	'Connection: keep-alive',
	'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
	'User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/28.0.1500.95 Safari/537.36',
	'Accept-Encoding: gzip,deflate,sdch',
	'Accept-Language: pt-BR,pt;q=0.8,en-US;q=0.6,en;q=0.4',
	//'Cookie: s_sivo=US%3AORIGIN%3ANONE; s_ria=flash%2011%7Csilverlight%20not%20detected; s_ppv=100; s_cc=true; s_pv=NA%3AUS%3ASTORE%3ANONE%3ASTORE%3ANONE%3AORIGIN%3ANONE%3ALOGIN; s_nr1=1379256262789-NEW; s_sq=%5B%5BB%5D%5D',
	));
$r = curl_exec($ch);
$sent = curl_getinfo($ch, CURLINFO_HEADER_OUT );
curl_close($ch);

echo 'SENT:<br/><pre>';
print_r($sent);
echo '</pre>';

ob_start();
print_r($r);
$saida = ob_get_contents();
ob_end_clean();
echo 'RESPONSE:<br/><pre>';
echo htmlentities($saida);
echo '</pre>';
?>
