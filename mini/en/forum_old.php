<?php 
/*
forum.php
page with iframe of PHPBB2 fprum software
27-Oct-2007
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
<TITLE>Ayrshire Minis - Online Forum to chat about all things "Mini"</TITLE>
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
    <tr>
      <td>
		  <table class="sec_table" border="0" cellpadding="0" cellspacing="0">
			  <tr>
				<td height="6500px">
					<iframe frameborder="0" width="100%" height="6500px" src="http://www.ayrshireminis.com/mini/phpBB2/index.php" scrolling="no"></iframe>
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

<!--
<frameset rows="25%,75%" frameborder="0">

  <frame src="http://www.ayrshireminis.com/mini/inc/header.php" noresize scrolling="no">
  <frame src="http://www.ayrshireminis.com/mini/phpBB2/index.php" noresize scrolling="no">

</frameset>
-->


</BODY>
</HTML>