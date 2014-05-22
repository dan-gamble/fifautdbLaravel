<?php
header('Content-Type: text/html; charset=utf-8');

ini_set('display_errors',1);

date_default_timezone_set("Europe/London");

function normalize($string) {
	setlocale(LC_CTYPE, 'en_GB.UTF-8');
	$string = iconv('UTF-8', "ASCII//TRANSLIT", $string);
	return $string;
}

$db = mysqli_connect('127.0.0.1','root','root', 'fifautdb');
$sql = "CREATE TABLE player_data_14(id INT AUTO_INCREMENT UNIQUE NOT NULL PRIMARY KEY, asset_id INT UNIQUE, first_name CHAR(30), last_name CHAR(30), common_name CHAR(50), overall_rating INT, card_att1 INT, card_att2 INT, card_att3 INT, card_att4 INT, card_att5 INT, card_att6 INT, card_type INT, item_type CHAR(30), club_id INT, league_id INT, nation_id INT, dob DATE, height INT, weight INT, position INT, pref_foot INT, potential_rating INT, weak_foot INT, skill_moves INT, att_workrate INT, def_workrate INT, acceleration INT, sprint_speed INT, agility INT, balance INT, jumping INT, stamina INT, strength INT, reactions INT, aggression INT, interceptions INT, positioning INT, vision INT, ball_control INT, crossing INT, dribbling INT, finishing INT, free_kick_accuracy INT, heading_accuracy INT, long_passing INT, short_passing INT, marking INT, power_shot_accuracy INT, shot_power INT, standing_tackle INT, sliding_tackle INT, volleys INT, curve INT, penalties INT, gk_diving INT, gk_handling INT, gk_kicking INT, gk_reflexes INT, gk_positioning INT)";

// Execute query
if (mysqli_query($db,$sql))
{
	echo "Table persons created successfully";
}
else
{
	echo "Error creating table: " . mysqli_error($db);
}
?>
