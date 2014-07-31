<?php
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'crmpicco_mini';
mysql_select_db($dbname);
?>