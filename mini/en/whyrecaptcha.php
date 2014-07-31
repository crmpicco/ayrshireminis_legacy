<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
whyrecaptcha.php
pop-up message to let the user know why we are using re-captcha
22-Dec-2007
*/
// full error reporting on
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Why Use Recaptcha?</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css" />
<link rel="shortcut icon" href="/favicon.ico" />
</HEAD>
<BODY>

<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");
?>
<table>
	<tr class="text_medium">
		<td>Why do I need to enter the validation words?</td>
	</tr>
	<tr class="text_small">
		<td>This is a way for us to try and ensure that the visitor submitting a form on the website is actually a person. The most common use of this method - called CAPTCHA - on the web today is to try and prevent the automatic submission of forms by programs designed to submit a form repeatedly, typically called a bot, usually for the purpose of spam. By adding the validation words functionality to the form, we can cut down on the amount of spam we recieve via a forms or can prevent bots from signing up for accounts on the website.</td>
	</tr>
	<tr>
		<td class="text_small">Please Note: If you click 'Get an audio challenge' on the ReCaptcha then you may have to install the Quicktime - or similar - plugin for your browser</td>
	</tr>
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td align="center"><span onClick="window.close();" class="text_small" onMouseOver="style.cursor='pointer'">Close Window</span></td>
	</tr>
</table>
</BODY>
</HTML>