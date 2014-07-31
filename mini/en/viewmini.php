<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
viewmini.php
pop-up window to display the selected mini, resizes to size of image
05-Dec-2007
*/

// full error reporting on
error_reporting(E_ALL);

$imageid = $_GET["id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - View a Mini from the Gallery</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
<noscript>This page uses Javascript. Your browser either doesn't support Javascript or you have it turned off.
To see this page as it is meant to appear please use a Javascript enabled browser, such as Mozilla Firefox available at www.firefox.com</noscript>
<script language="JavaScript" type="text/javascript">
<!--
var arrTemp = self.location.href.split("?");
var picUrl = (arrTemp.length>0)?arrTemp[1]:"";
var NS = (navigator.appName=="Netscape")?true:false;

function FitPic() {
	iWidth = (NS)?window.innerWidth:document.body.clientWidth;
	iHeight = (NS)?window.innerHeight:document.body.clientHeight;
	iWidth = document.images[0].width - iWidth;
	iHeight = document.images[0].height - iHeight;
	iWidth += 50;
	iHeight += 50;
	window.resizeBy(iWidth, iHeight);
	self.focus();
};
//-->
</script>
</HEAD>
<BODY onload="FitPic();">

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
<?php 
	if ($image) { 
	// image stored in /images dir ?>
		<script language="JavaScript" type="text/javascript">
		<!--
			document.write("<img src='/mini/images/gallery/<?php echo $image ?>' border=0>");
		//-->
		</script>
	<?php
	} else if ($extimage) {
	// external image not hosted on server
	?>
		<script language="JavaScript" type="text/javascript">
		<!--
			document.write("<img src='<?php echo $extimage ?>' border=0>");
		//-->
		</script>
	<?php
	}
?>
<div onClick="window.close();" class="text_small" align="center" onMouseOver="style.cursor='pointer'">Close Window</div>
</BODY>
</HTML>