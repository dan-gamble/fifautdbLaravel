<?php
define("CLASSES", $_SERVER['DOCUMENT_ROOT']."/classes");
require CLASSES."/Guzzle/guzzle.phar";
require CLASSES."/connector.php";
require CLASSES."/eahashor.php";
require CLASSES."/searchor.php";

$datos = array(
		"username" => "dangamble89@gmail.com",
		"password" => "H3dg3h0g",
		"platform" => "xbox360", // xbox360, pc, ps3
		"hash" => "md5hash",  // answer in hash
		);

$connector = new Connector($datos);
$con = $connector->Connect();

echo "NUCLEUS ID: ".$con["nucleusId"];

echo "<br><br>";

echo "SID: ".$con["sessionId"];

echo "<br><br>";

echo "TOKEN: ".$con["phishingToken"];
?>
