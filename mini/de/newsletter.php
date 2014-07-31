<?php

/*
newsletter.php
take in email address and language and write it to the flat file of addresses
11-Dec-2007
[Deutsch Version]
*/

include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");

// email address validation

if (isset($_POST["email"])) {
	if (!isemail($_POST["email"])) {
		// invalid email address
		// pass back a flag saying that the email is bad, but only do it once in the URL......
		if (strpos($_SERVER["HTTP_REFERER"], "email=bad") == 0) {
			header("Location: " . $_SERVER["HTTP_REFERER"] . "?email=bad");
		} else {
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
}

// then we need to check if the email address is already in the file

$file = file_get_contents("../newslettersubs.txt");

if (strpos($file, $_POST["email"] . "|" . $_POST["language"])) {
	// remove the successful flag from the URL
	$url = str_replace("?added=1", "", $_SERVER["HTTP_REFERER"]);
	// redirect back to the home page, flagging up duplicate request
	header("Location: " . $url . "?dup=1");
}

// write the email address and chosen language to the flat file
// 'a' append, 'w' write
$newsletter = fopen("../newslettersubs.txt", "a") or die("Cannot open newslettersubs.txt"); 
fwrite($newsletter, $_POST["email"] . "|" . $_POST["language"] . "\n");
fclose($newsletter) or die("Cannot close newslettersubs.txt");

// redirect back to the page we came from....successful addition
header("Location: " . $_SERVER['HTTP_REFERER'] . "?added=1");

?>