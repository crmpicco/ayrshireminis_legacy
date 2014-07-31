<?php	

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
?>

	<table align="center" width="80%">
		<tr style="font-family: Verdana; font-weight: bold; color: #000000"><td align="center">Admin Main Menu</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #000000">
			<td align="center"><a href="/mini/admin/gallery.php" style="color: #000000;">Gallery</a></td>
		</tr>
		<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #000000">
			<td align="center"><a href="/mini/admin/places.php" style="color: #000000;">Places</a></td>
		</tr>
		<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #000000">
			<td align="center"><a href="/mini/admin/newssubs.php" style="color: #000000;">Newsletter Subscriptions</a></td>
		</tr>
	</table>
</BODY>
</HTML>