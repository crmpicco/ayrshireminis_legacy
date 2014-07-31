<?php


//mail("crmpicco@aol.co.uk", "TEST EMAIL from PHP", "testing email from PHP 5");
//mail("crmpicco@excite.com", "TEST EMAIL from PHP", "testing email from PHP 5");

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'l672crm';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'crmpicco_mini';
mysql_select_db($dbname);

$insert = "INSERT INTO crmpicco_mini.gallery (cardesc) VALUES ('CAR DESCRIPTION')";
mysql_query($insert) or die ("NOPE");

?>