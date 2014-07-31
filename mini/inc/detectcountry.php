<?php

/*
detectcountry.php
get the country name/country code from the database as per visitor's IP address
18-Nov-2007
*/
	//echo "remote_addr: " . $_SERVER["REMOTE_ADDR"] . "<br>";

	$ipnumber = sprintf("%u", ip2long($_SERVER["REMOTE_ADDR"]));

    // Query for getting visitor countrycode
    $country_exec = mysql_query("SELECT country_code2, country_name FROM ipaddress WHERE IP_FROM <= $ipnumber AND IP_TO >= $ipnumber ") or die(mysql_error());

    // Fetching the record set into an array
    $ccode_array = mysql_fetch_array($country_exec);

    // getting the country code from the array
    $country_code = $ccode_array["country_code2"];

    // getting the country name from the array
    $country_name = $ccode_array["country_name"];

   // Display the Visitor coountry information
   //echo "$country_code - $country_name";

	//if ($_SERVER["REMOTE_ADDR"] == "86.27.99.16") {
	//	$country_code = "DE";
	//}

	// redirect to the german version of the website if the user is in Germany
	if ($country_code == "DE" || $country_name == "GERMANY") {

		session_start();
		//echo "<font color=white>S: " . $_SESSION["lang"] . "</font>";

		if(!isset($_SESSION["lang"]) or $_SESSION["lang"] == "en") {
			// set the deutsch session
			$_SESSION["lang"] = "de";
		}

		// redirect
		header("Location: http://www.ayrshireminis.com/mini/de/index.php?lang=DE");

		//redirect("http://www.ayrshireminis.com/mini/de/index.php?lang=DE", 303);
	}
?>