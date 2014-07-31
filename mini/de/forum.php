<?php 
/*
forum.php
page with iframe of PHPBB2 fprum software
27-Oct-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);

// start the session again to keep the LANG session alive
session_start();

//date_default_timezone_set('Europe/Berlin'); 
// Set the gloabal LC_TIME constant to german for the purpose of the date
setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Online Forum, in dem wir über alles, was mit Minis zu tun hat, chatten können</TITLE>
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
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php");
?>

<table class="main_table" border="0" cellpadding="5" cellspacing="5">
    <tr>
      <td>
		  <table class="sec_table" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td height="2000px">
					<iframe frameborder="0" width="100%" height="2000px" src="/mini/phpBB2/index.php" scrolling="no"></iframe>
				</td>
			  </tr>
		  </table>
      </td>
    </tr>
</table>
<table align="center">
	<tr>
      <td width="100%" height="20">
	  <center>
		<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
	  </center>
	  </td>
    </tr>
</table>
</BODY>
</HTML>