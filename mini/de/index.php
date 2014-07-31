<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
index.php
Main page of the site with welcome message
03-Nov-2007
[Deutsch Version]
*/

// full error reporting on
error_reporting(E_ALL);

if (isset($_SESSION["lang"])) {
	$lang = $_SESSION["lang"];
}
if (isset($_GET["lang"])) {
	$postlang = $_GET["lang"];
}

// newsletter variables for user message
if (isset($_GET["email"])){
	$email	= $_GET["email"];
} else { $email = ""; }

if (isset($_GET["added"])){
	$added	= $_GET["added"];
} else { $added = ""; }

if (isset($_GET["dup"])){
	$dup	= $_GET["dup"];
} else { $dup = ""; }

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
<TITLE>Ayrshire Minis - eine online-Gemeineinschaft für Mini-Enthusiasten</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="DE">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="/mini/js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
</HEAD>
<BODY>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php") ?>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php") ?>
<table align="center" style="width: 80%; background-color: #FFFFFF; *margin-top: -11px;" bgcolor="FFFFFF">
  <tbody>
    <tr>
      <td>
      <table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>	
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%" id="main-box">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><h1>Willkommen bei AyrshireMinis.com</h1></td>
				</tr>
				<tr>
					<td style="width: 100%" colspan="2">
						<table class="message">
							<tr>
								<td><span style="font-weight: bold;">NEW:</span> Ayrshire Minis Newsletter - get up to date information on Ayrshire Minis and the Mini scene</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="70%"> 
						<div class="question">
							Willkommen bei einer neuen Internet-Gemeinschaft für Ayrshire Mini Enthusiasten oder Besitzern. Ob Ihr einen Classic Mini oder einen New Mini habt - jeder ist herzlich willkommen.<br><br>
									 
							Ich habe diese Webseite im September 2007 als persönliches Projekt angefangen. Diese Seite soll ein freundlicher Ort sein, wo man Gleichgesinnte treffen und über den beliebtesten Kleinwagen Großbritanniens quatschen kann. Wenn Ihr ein Foto von Eurem Mini hochladen möchtet, oder einen Link zu einem Foto, das Ihr online gesehen habt, dann klickt auf die <a href="/mini/de/galleries.php" class="link_general">Galerie</a>.<br><br>
							
							Warum nicht abonnieren Sie unseren neuen Newsletter? (recht) Es ist kostenlos zu abonnieren und wir halten Sie auf dem Laufenden mit allen neuen Features auf Ayrshire Minis.<br><br>

							Für Kommentare oder Vorschläge geht bitte auf <a href="/mini/de/contact.php" class="link_general">Contact</a>, um mit mir in Verbindung zu treten.<br><br>
							 
							Liebe Grüße,<br>
							Picco @ Ayrshire Minis
						</div>
					</td>
					<td valign="top" align="center">
						<form action="newsletter.php" method="post">
						<table style="border: 1px solid #000000;">
							<tr class="text_small_dark">
								<td>AyrshireMinis.com Newsletter (beta)</td>
							</tr>
							<?php
							if ($email) {
							// bad email format error message
							?>
							<tr class="text_small_dark" style="background-color: #FF0000; border: 1px solid #000000;">
								<td align="center">Sorry....Invalid Email Address!</td>
							</tr>
							<?php } ?>
							<?php
							if ($added) {
							// successful signup message
							?>
							<tr class="text_small_dark" style="background-color: #00EE00; border: 1px solid #000000;">
								<td align="center">Thanks....You have been added!</td>
							</tr>
							<?php } ?>
							<?php
							if ($dup) {
							// duplicate email address entered error message
							?>
							<tr class="text_small_dark" style="background-color: #FF0000; border: 1px solid #000000;">
								<td align="center">Sorry....email previously entered!</td>
							</tr>
							<?php } ?>
							<tr>
								<td align="center">
									<input type="text" name="email" id="email" class="textbox" size="28">	
								</td>
							</tr>
							<tr>
								<td align="center">
									<input type="submit" name="submit" id="submit" value="Join" style="font: Verdana; font-size: 7.5pt; font-weight: bold;" onMouseOver="style.cursor='pointer'">
									<span style="font-family: Verdana; font-size: 6pt; font-weight: bold;" onMouseOver="style.cursor='pointer'"><a href="/mini/en/newsunsub.php">Abmelden?</a></span>
								</td>
							</tr>
						</table>
						<input type="hidden" name="language" id="language" value="de">
						</form>
					</td>
				</tr>

				<tr>
					<td align="center" colspan="2">
						<img src="http://img222.imageshack.us/img222/6099/miniblurredwx6.jpg" width="300" border="1" alt="G11 CRM">
					</td>
				</tr>
				
				<tr><td>&nbsp;</td></tr>

				<tr>
					<td align="center"  colspan="2">
						<table width="70%">
							<tr>
								<td align="center">
									<script type="text/javascript"><!--
									google_ad_client = "pub-6264697646356100";
									//728x90, created 17/11/07
									google_ad_slot = "8007896429";
									google_ad_width = 728;
									google_ad_height = 90;
									//--></script>
									<script type="text/javascript"
									src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
									</script>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
                                                   </td>
          </tr>
	</table>
  </tbody>
</table>
<center>
	<div style="width: 100%;">
		<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
	</div>
</center>
</BODY>
</HTML>