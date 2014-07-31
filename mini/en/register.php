<?php 
/*
register.php
page for new users to regitser for the forum
22-Dec-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Register for the Ayrshire Minis Forum</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
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
  <tbody>
    <tr>
      <td>
		  <table class="sec_table" border="0" cellpadding="0" cellspacing="0">
			<tbody>
			  <tr>
				<td valign="top" height="1300">
					<iframe frameborder="0" width="100%" height="100%" src="/mini/phpBB2/profile.php?mode=register" scrolling="no"></iframe>
				</td>
			  </tr>
			</tbody>
		  </table>
      </td>
    </tr>
  </tbody>
</table>
<table align="center">
	<tr>
      <td width="100%" height="20">
	  <center>
		<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php"); ?>
	  </center>
	  </td>
    </tr>
</table>
</BODY>
</HTML>