<?php
$dbhost = "localhost";
$dbuser = "";
$dbpass = "";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'ayrshire_mini';
mysql_select_db($dbname);
?>
