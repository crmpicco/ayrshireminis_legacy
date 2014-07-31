<?php

include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

/*
autocompletelocation.php
script to connect to the database and lookup similar city name to the one 
that is passed to the script from an AJAX call
09-Jul-2009
*/

// Is there a posted query string?
if(isset($_POST["location"])) {
	$location = $_POST["location"]; // Mauchline

	// make the data safe before querying the database
	$location = mysql_real_escape_string($location);

	// is the string length greater than zero
	if (strlen($location) > 0) {
		
		$query = mysql_query("SELECT DISTINCT(cityname) FROM ayrshire_mini.countries WHERE cityname LIKE '$location%' LIMIT 10") or die(mysql_error());
		if ($query) {
			
			while ($result = mysql_fetch_assoc($query)) {		
				echo '<li onClick="fill(\'' . $result["cityname"] . '\');">' . $result["cityname"] . '</li>';
			}

		} else {
			echo "Sorry, there was a problem with the query. Please re-try.";
		}

		mysql_free_result($query);

	}

} else {
	echo "Sorry, a location is required. Please re-try.";

}

?>