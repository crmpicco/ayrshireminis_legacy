<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
viewmini.php
pop-up window showing the mini
[Deutsch Version]
03-Nov-2007
*/
// full error reporting on
error_reporting(E_ALL);

$imageid = $_GET["id"];
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Galerien für die Classic Minis und New Minis</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="DE">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
</HEAD>
<BODY>

<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");

$result = mysql_query("SELECT cardesc, image, externalimage FROM `ayrshire_mini`.`gallery` WHERE id = '$imageid'") or die(mysql_error());
while ($row = mysql_fetch_assoc($result)) {

	$cardesc	= $row["cardesc"];
	$image		= $row["image"];
	$extimage	= $row["externalimage"];

}
mysql_free_result($result);
unset($row);

?>
<table>
	<tr class="text_medium">
		<td>
			<?php 
				if ($image) {
					echo "<img src=\"/mini/images/gallery/$image\" name='image$imageid' id='image$imageid' border='1' title='$cardesc' height='500' width='700'>";
				} else if ($extimage) {
					echo "<img src=\"$extimage\" name='image$imageid' id='image$imageid' border='1' title='$cardesc' height='500' width='700'>";					
				}
			?>
		</td>
	</tr>
	<tr>
		<td align="center"><span onClick="window.close();" class="text_small" onMouseOver="style.cursor='pointer'">Fenster schließen</span></td>
	</tr>
</table>
</BODY>
</HTML>