<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
index.php
Main page of the site with welcome message
03-Nov-2007
*/

$lang = $_SESSION["lang"];
$postlang = $_GET["lang"];

//echo "<font color=white><b>POST Lang: " . $postlang . "</b></font><br>";
if ($lang == "de") {
	date_default_timezone_set('Europe/Berlin'); 
	// Set the gloabal LC_TIME constant to german
	setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
	//echo "set locale!!!";
} else {
	/*
	date_default_timezone_set('Europe/Berlin'); 
	// Set the gloabal LC_TIME constant to german
	setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
	// Little bit other Syntax but better effect
	echo "time " . strftime('%A, %d. %B %Y') . "<br>"; //Output: Mittwoch, 07. September 2005
	*/
}

//echo "<font color=white><b>LANG: $lang</b></font><br>";

if ($lang == "de" || $postlang == "de") {
	//echo "<font color=white><b>GERMAN LANGUAGE BITTE!</b></font><br>";
	if(!isset($_SESSION["lang"])) {
		//echo "<font color=white>doesn't exist</font>";
		session_start();
		$_SESSION["lang"] = 'de';
		//echo "<font color=white>" . $_SESSION["lang"] . "</font>";
	} else {
		//echo "<font color=white>does exist</font>";
	}
	//echo "<font color=white>now redirect!!!</font>";
	// redirect
	header( "Location: de/index.php?lang=DE" ) ;
} else {
	$_SESSION["lang"] = "en";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - an online Mini E-Community for enthusiasts of the Mini</TITLE>
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
<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php") ?>
<table style="text-align: left; width: 100%; background-color: #FFFFFF;" border="0" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td>

      <table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="width: 150px;" valign="top">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/sidebar.php"); ?>
            </td>
			<td width="1" style="background-color: #000066;"></td>
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="heading">Welcome to AyrshireMinis.com</span></td>
				</tr>
				<tr>
					<td style="width: 100%" colspan="2">
						<table style="border: 1px solid #FF0000; border-top-style: dashed; border-left-style: none; border-bottom-style: dashed; border-right-style: none; width: 100%; background-color: #FCD116; font-family: Verdana; font-size: 10pt;">
							<tr>
								<td><span style="font-weight: bold;">NEW:</span> Ayrshire Minis Newsletter - get up to date information on Ayrshire Minis and the Mini scene</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td width="70%">						
						<table class="text_medium_dark">
							<tr>
								<td>
									Welcome to a new e-community for Ayrshire Mini enthusiasts or owners. Whether you have a Classic Mini or a New Mini - everyone is very welcome.<br><br>

									I started this website, in September 2007, as a personal project. The basis of the site is to be a friendly area where you could meet fellow Mini/MINI owners and chat about the UK's favourite small car. If you would like to upload an image or your Mini or send us a link to an image you have seen online, there is a online <a href="/mini/en/galleries.php" class="link_general">Gallery</a> section. <br><br>

									If you have any comments or suggestions please use the <a href="/mini/en/contact.php" class="link_general">Contact</a> page to get in touch<br><br>

									All The Best,<br>
									Picco @ Ayrshire Minis							
								</td>
							</tr>
						</table>				
					</td>
										<td valign="top" align="center">
						<form action="en/newsletter.php" method="post">
						<table style="border: 1px solid #000000;">
							<tr class="text_small_dark">
								<td>AyrshireMinis.com Newsletter (beta)</td>
							</tr>
							<tr>
								<td align="center">
									<input type="text" name="email" id="email" class="textbox" size="28">	
								</td>
							</tr>
							<tr>
								<td align="center">
									<input type="submit" name="submit" id="submit" value="Join" style="font: Verdana; font-size: 7.5pt; font-weight: bold;">	
								</td>
							</tr>
						</table>
						<input type="hidden" name="language" id="language" value="en">
						</form>
					</td>
				</tr>
				<tr>
					<td align="center">
						<img src="http://img222.imageshack.us/img222/6099/miniblurredwx6.jpg" width="300" border="1" alt="G11 CRM">
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td align="center">
						<table width="70%">
							<tr>
								<td align="center"><img src="/mini/images/austin_g.jpg" width="100" height="100" title="Austin Motor Company" alt="Austin Motor Company"></td>
								<td align="center"><img src="/mini/images/bmw_g.jpg" width="100" height="100" title="BMW: Bayerische Motoren Werke AG" alt="BMW: Bayerische Motoren Werke AG"></td>
								<td align="center"><img src="/mini/images/rover_g.jpg" width="100" height="100" title="Rover Group" alt="Rover Group"></td>
								<td align="center"><img src="/mini/images/leyland_g.jpg" width="100" height="120" title="British Leyland Motor Corporation" alt="British Leyland Motor Corporation"></td>
							</tr>
						</table>
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