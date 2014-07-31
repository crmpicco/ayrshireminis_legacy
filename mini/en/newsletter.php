<?php

/*
newsletter.php
take in email address and language and write it to the flat file of addresses
11-Dec-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");

if (isset($_POST["email"])) {
	$_POST["email"] = mysql_real_escape_string($_POST["email"]);
}

if (isset($_POST["language"])) {
	$_POST["language"] = mysql_real_escape_string($_POST["language"]);
}

// email address validation

if ($_POST["email"] != "") {
	if (!isemail($_POST["email"])) {
		// invalid email address
		// pass back a flag saying that the email is bad, but only do it once in the URL......
		if (strpos($_SERVER["HTTP_REFERER"], "email=bad") == 0) {
			// remove the successful flag from the URL
			$url = str_replace("?added=1", "", $_SERVER["HTTP_REFERER"]);
			header("Location: " . $_SERVER["HTTP_REFERER"] . "?email=bad");
			exit;
		} else {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
			exit;
		}
	}
} else {
	// no email address has been entered
	if (strpos($_SERVER["HTTP_REFERER"], "email=bad") == 0) {
		// remove the successful flag from the URL
		$url = str_replace("?added=1", "", $_SERVER["HTTP_REFERER"]);
		header("Location: " . $_SERVER["HTTP_REFERER"] . "?email=bad");
		exit;
	} else {
		header("Location: " . $_SERVER["HTTP_REFERER"]);
		exit;
	}
}

// then we need to check if the email address is already in the file

$file = file_get_contents("../newslettersubs.txt");

if (strpos($file, $_POST["email"] . "|" . $_POST["language"])) {
	// remove the successful flag from the URL
	$url = str_replace("?added=1", "", $_SERVER["HTTP_REFERER"]);
	// redirect back to the home page, flagging up duplicate request
	header("Location: " . $url . "?dup=1");
	exit;
}

// write the email address and chosen language to the flat file
// 'a' append, 'w' write
$newsletter = fopen("../newslettersubs.txt", "a") or die("Cannot open newslettersubs.txt"); 
fwrite($newsletter, $_POST["email"] . "|" . $_POST["language"] . "\n");
fclose($newsletter) or die("Cannot close newslettersubs.txt");

//echo "linie 49<br>";
//echo "email: " . $_POST["email"] . "<br>";

// remove the bad flag and any previous successful flags from the URL
$url = str_replace("?email=bad", "", $_SERVER["HTTP_REFERER"]);
$url = str_replace("?added=1", "", $_SERVER["HTTP_REFERER"]);

// save the new user's email address and language option in the database
mysql_query("INSERT INTO `ayrshire_mini`.`newsletter` (email, lang, joinedon) VALUES ('" . $_POST["email"] . "', '" . $_POST["language"] . "', now()) ") or die(mysql_error());

// redirect back to the page we came from....successful addition
header("Location: " . $url . "?added=1");
exit;
?>