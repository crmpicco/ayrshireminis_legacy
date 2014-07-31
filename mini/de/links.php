<?php 
/*
links.php
list of links to other Mini websites
14-Oct-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);

session_start();
//$lang = $_GET["lang"];
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
<TITLE>Ayrshire Minis - eine Sammlung von Links zu Mini-Webseiten</TITLE>
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
<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php");
?>
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
					<td><span class="heading"><a href="/mini/en/links.php">Links</a></span><br></td>
				</tr>
				<tr>
					<td class="text_small_dark" colspan="2">Alle Links werden in einem neuen Fenster geöffnet, oder eine neue Registerkarte, wenn Sie eine neuere Browser unterstützt Tabbed Browsing</td>
				</tr>
				<tr>
					<td>
						<div class="question">
						<table width="80%" align="center">
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class="text_head" align="right">British Mini Club&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.britishminiclub.com');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.britishminiclub.com</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">The Mini Forum&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.theminiforum.co.uk');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.theminiforum.co.uk</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">Scottish Mini&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.scottishmini.co.uk');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.scottishmini.co.uk</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">Breathe Mini&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.breathemini.co.uk');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.breathemini.co.uk</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">Brighton Mini Club&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.brightonminiclub.co.uk');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.brightonminiclub.co.uk</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">Mins On The Run&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.minisontherun.co.uk');" onMouseOver="style.cursor='pointer'" title="Öffnet sich in einem neuen Fenster"><a href="#">www.minisontherun.co.uk</a></span></td>
							</tr>
							<tr>
								<td class="text_head" align="right">Scottish Novas&nbsp;&nbsp;</td>
								<td class="text_medium_dark"><span onClick="window.open('http://www.scottishnovas.net');" onMouseOver="style.cursor='pointer'" title="Open in New Window"><a href="#">www.scottishnovas.net</a></span></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						</div>
					</td>
				</tr>
				<tr><td>&nbsp</td></tr>
				<tr>
					<td colspan="2" align="center">
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
				<tr><td>&nbsp;</td></tr>
				<!--
				<tr>
					<td align="center">......... AMAZON AFFILIATES IN HERE ............</td>
				</tr>
				-->
			</table>
		</td>
	</tr>
</table>
                                                   </td>
          </tr>
        </tbody>
      </table>

      </td>
    </tr>
	</tbody>
</table>
<center>
	<div style="width: 100%;">
		<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
	</div>
</center>
</BODY>
</HTML>