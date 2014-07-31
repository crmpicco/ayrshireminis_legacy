<?php	
/*
newssubs.php
Lookup the number of users that have subscribed to the AM newsletter
16-Mar-2008
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Admin: AyrshireMinis.com</TITLE>
<script language="JavaScript" type="text/javascript" src="/mini/js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
</HEAD>
<BODY>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/mini/admin/header.php");

$lines = file("../newslettersubs.txt");
?>

<table align="center" width="80%">
	<tr style="font-family: Verdana; font-weight: bold; color: #000000"><td>Newsletter Subscriptions</td></tr>
	<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #000000">
		<td>Email Address</td>
		<td align="left">Language</td>
	</tr>
<?php 
	foreach ($lines as $line) { 
	list($emailadd, $lang) = split("[|]", $line); 
?>
	<tr class="text_medium_dark">
		<td><?php echo htmlspecialchars(strtolower($emailadd)); ?> </td>
		<td><?php echo htmlspecialchars(strtoupper($lang)); ?> </td>
	</tr>
<?php } ?>

</table>

</BODY>
</HTML>