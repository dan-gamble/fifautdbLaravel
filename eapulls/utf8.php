<?php

// Database connection details
$db_srv = 'localhost';
$db_usr = 'root';
$db_pwd = 'root';
$db_name = 'fifautdb';

// New charset information, update accordingly if not UTF8
$char_set = 'utf8';
$char_collation = 'utf8_general_ci';

header('Content-type: text/plain');

// extablish the connection
$connection = mysql_connect($db_srv,$db_usr,$db_pwd) or die(mysql_error());

// select the databse
$db = mysql_select_db($db_name) or die(mysql_error());

// get existent tables
$sql = 'SHOW TABLES';
$res = mysql_query($sql) or die(mysql_error());

// for each table found
while ($row = mysql_fetch_row($res))
{
    // change the table charset
    $table = mysql_real_escape_string($row[0]);

    $sql = " ALTER TABLE ".$table."
             DEFAULT CHARACTER SET ".$char_set."
             COLLATE ".$char_collation;

    mysql_query($sql) or die(mysql_error());

    echo 'The '.$table.' table was updated successfully to: '.$char_set."\n";
}

// Update the Collation of the database itself
$sql = "ALTER DATABASE CHARACTER SET ".$char_set.";";
mysql_query($sql) or die(mysql_error());

echo 'The '.$db_name.' database collation';
echo ' has been updated successfully to: '.$char_set."\n";

// close the connection to the database
mysql_close($connection);

?>