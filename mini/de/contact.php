<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
contact.php
contact form with captcha to allow user to enter their details 
and email is sent to info@ayrshireminis.com
20-Oct-2007
[Deutsch Version]
*/

// full error reporting on
error_reporting(E_ALL);

session_start();
//$lang = $_GET["lang"];

require_once($_SERVER['DOCUMENT_ROOT'].'/mini/inc/recaptchalib.php');
$publickey = "6LeVewAAAAAAAHd3JzIrF5XHJ-5z_gAcF6MmUOx2";
$privatekey = "6LeVewAAAAAAAPMA5FY7Kqt5fxFxAKF9OtrtI8dV";

# the response from reCAPTCHA
$resp = null;

# the error code from reCAPTCHA, if any
$error = null;

# are we submitting the page?
if (isset($_POST["submit"])) {

  $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

	if ($resp->is_valid) {
		# in a real application, you should send an email, create an account, etc
	} else {
		# set the error code so that we can display it. You could also use
		# die ("reCAPTCHA failed"), but using the error message is
		# more user friendly
		$error = $resp->error;
	}
}

//date_default_timezone_set('Europe/Berlin'); 
// Set the gloabal LC_TIME constant to german for the purpose of the date
setlocale(LC_ALL, "de_DE", "de_DE@euro", "deu", "deu_deu", "german");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="mini, cooper, mini forum, mini forums, mini chat, minis in germany, deutsch minis, ayrshire minis, ayrshire mini, ayrshire, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - meldet Euch, über E-mail, Web, Chat oder Forum</TITLE>
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

if (isset($_POST["name"])) {
	$name		= escape_data($_POST["name"]);
}
if (isset($_POST["email"])) {
	$email		= escape_data($_POST["email"]);
}
if (isset($_POST["subject"])) {
	$subject	= escape_data($_POST["subject"]);
}
if (isset($_POST["message"])) {
	$message	= escape_data($_POST["message"]);
}
if (isset($_POST["country"])) {
	$country	= escape_data($_POST["country"]);
}
if (isset($_POST["process"])) {
	$process	= escape_data($_POST["process"]);
} else {
	$process = "";
}

$dir = (strtoupper($_SESSION["lang"]) == "DE" ? "de" : "en");

?>
<table align="center" style="width: 80%; background-color: #FFFFFF; *margin-top: -11px;" bgcolor="FFFFFF">
  <tbody>
    <tr>
      <td>
      <table style="text-align: left; width: 100%;"border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%" id="main-box">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="heading"><a href="/mini/<?php echo $dir; ?>/contact.php">Kontakt</a></span><br>

						<?php 
						// display the form for user to fill out their info
						if (!$process || $error) { 
						?>
						<span class="text_small_dark">Geben Sie die erforderlichen Informationen hier, wenn Sie möchten mit uns in Kontakt treten. Wenn Sie Ihre Stadt, Gemeinde oder das Land nicht in der Liste der Dropdownliste uns eine Zeile, und wir werden Sie ihn</span><br><br>
						<table align="center">
						<tr>
								<td align="center">
									<table align="center">
										<tr>
											<td>
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
						<form id="contact" method="post" action="contact.php" onsubmit="return validateform(this.form);">
						<div class="question">
						<table style="border: 2px solid #000;" width="80%" align="center">
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class="text_head" width="35%">Ihr Name&nbsp;<span class="required">*</span></td>
								<td><input type="text" name="name" id="name" class="textbox" size="40"></td>
							</tr>
							<tr>
								<td class="text_head" width="35%">Ihr Email&nbsp;<span class="required">*</span></td>
								<td><input type="text" name="email" id="email" class="textbox" size="40"></td>
							</tr>
							<tr>
								<td class="text_head" width="35%">Thema (optional)</td>
								<td><input type="text" name="subject" id="subject" class="textbox" size="30"></td>
							</tr>
							<?php
							$countries = mysql_query("SELECT DISTINCT(countryname) FROM `ayrshire_mini`.`countries` ORDER BY countryname ASC") or die(mysql_error());
							?>
							<tr>
								<td class="text_head">Woher kommen Sie?</td>
								<td>
									<select name="country" id="country" class="select">
									<?php
										if (mysql_num_rows($countries)) {

											// show all the AYRSHIRE towns/villages first
											$ayrshirecities = mysql_query("SELECT DISTINCT(cityname), provincename FROM `ayrshire_mini`.`countries` WHERE countryname = 'United Kingdom' AND provincename IN ('East Ayrshire', 'North Ayrshire', 'South Ayrshire') ORDER BY provincename, cityname ASC") or die(mysql_error());
											if (mysql_num_rows($ayrshirecities)) {
												while($ayrshirecity = mysql_fetch_assoc($ayrshirecities)) {

													if ($county != $ayrshirecity["provincename"]) {
														if (isset($county)) {
															echo "</optgroup>";
														}
														echo "<optgroup label='$ayrshirecity[provincename]' class='select_optgroup'>";			
													}

													unset($selected);
													if ($ayrshirecity["cityname"] == "Ayr") {
														$selected = "selected";
													}

													echo "<option value='" . $ayrshirecity["cityname"] . "|United Kingdom' $selected>" . $ayrshirecity["cityname"]. "</option>";
													$county = $ayrshirecity["provincename"];
												}
												echo "</optgroup>";
											}
											mysql_free_result($ayrshirecities);
											unset($ayrshirecity);											

											// show all OTHER towns after the Ayrshire towns, only UK
											$ukcities = mysql_query("SELECT DISTINCT(cityname), provincename FROM `ayrshire_mini`.`countries` WHERE countryname = 'United Kingdom' AND provincename NOT IN ('East Ayrshire', 'North Ayrshire', 'South Ayrshire') ORDER BY cityname ASC") or die(mysql_error());
											if (mysql_num_rows($ukcities)) {

												echo "<optgroup label='Other UK' class='select_optgroup'>";
												
												// Other UK
												while($ukcity = mysql_fetch_assoc($ukcities)) {

													echo "<option value='" . $ukcity["cityname"] . "|United Kingdom'>" . $ukcity["cityname"]. "</option>";
												}
												echo "</optgroup>";
											}
											mysql_free_result($ukcities);
											unset($ukcity);

											
											
											while($country = mysql_fetch_assoc($countries)) {
												
												// show all the cities in the USA
												if ($country["countryname"] == "United States of America") {
													$cities = mysql_query("SELECT DISTINCT(cityname), provincecode FROM `ayrshire_mini`.`countries` WHERE countryname = 'United States of America' ORDER BY cityname ASC") or die(mysql_error());
													if (mysql_num_rows($cities)) {

														echo "<optgroup label='United States of America' class='select_optgroup'>";
														// United States of America

														while($city = mysql_fetch_assoc($cities)) {					
															echo "<option value='" . $city["cityname"] . "|United States of America'>" . $city["cityname"] . ", " . $city["provincecode"] . "</option>";
														}

														echo "</optgroup>";
													}
													mysql_free_result($cities);
													unset($city);

												} else {
													
													// show all other countries capitals, excluding the UK
													if ($country["countryname"] != "United Kingdom") {
														$capital = mysql_query("SELECT cityname FROM `ayrshire_mini`.`countries` WHERE countryname = '" . $country["countryname"]. "' AND capital = '1'") or die(mysql_error());
														if (mysql_num_rows($capital)) {
															
															echo "<optgroup label='" . $country["countryname"] . "' class='select_optgroup'>";
															while($cap = mysql_fetch_assoc($capital)) {										echo "<option value='" . fixapostrophe($cap["cityname"]) . "|" . $country["countryname"] . "'>" . $cap["cityname"]. "</option>";
															}
															echo "</optgroup>";
														}
														mysql_free_result($capital);
														unset($cap);
													}
												}
											} // countries WHILE
										}
										mysql_free_result($countries);
									?>
									</select>
								</td>
							</tr>
							<tr>
								<td class="text_head" width="35%" valign="top">Ihre Nachricht&nbsp;<span class="required">*</span></td>
								<td><textarea name="message" id="message" cols="40" rows="5" style="font-family: Verdana; font-size: 9pt;">Geben Sie hier Ihre Nachricht ein</textarea></td>
							</tr>
							<tr>
								<td class="text_head" width="35%" valign="top">Geben Validierung Worte<br><span class="text_v_small_dark" onClick=" window.open('/mini/<?php echo $dir; ?>/whyrecaptcha.php','Why Recaptcha','status=no,toolbar=no');" onMouseOver="style.cursor='pointer'">Warum?</span></td>
								<td>
									<?php echo recaptcha_get_html($publickey, $error); ?>
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Senden" onMouseOver="style.cursor='pointer'" title="Message senden Sie uns!"></td>
							</tr>
						</table>
						</div>
						<input type="hidden" name="process" id="process" value="sendmessage">
						</form>
						<?php 
						} else { 
							// captcha has been validated, form has been submitted - send email
							
							// create the html email to send to me
							$body = "<html>";
							$body .= "<body>";
								$body .= "<table>";
									$body .= "<tr>";
										$body .= "<td>$name has sent a message from the website</td>";
									$body .= "</tr>";
									$body .= "<tr>";
										$body .= "<td>Email Address: $email</td>";
									$body .= "</tr>";
									if ($subject) {
										$body .= "<tr>";
											$body .= "<td>Subject: $subject</td>";
										$body .= "</tr>";
									}
									$body .= "<tr>";
										$body .= "<td>Country: $country</td>";
									$body .= "</tr>";
									$body .= "<tr>";
										$body .= "<td>Message: $message</td>";
									$body .= "</tr>";
								$body .= "</table>";
							$body .= "</body>";
							$body .= "</html>";

							// autoresponder: from ayrshireminis to the person that entered the enquiry

							$autobody = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
							$autobody .= "<HTML>";
							$autobody .= "<HEAD>";
							$autobody .= "<TITLE>AyrshireMinis.com - a Mini E-Community - Enquiry Received</TITLE>";
							$autobody .= "</HEAD>";
							$autobody .= "<BODY>";
								$autobody .= "<TABLE>";
									$autobody .= "<TR>";
										$autobody .= "<TD>Your message has been received by us here at AyrshireMinis.com</TD>";
									$autobody .= "</TR>";
									$autobody .= "<TR>";
										$autobody .= "<TD>We will respond to your enquiry as soon as possible. However, in the meantime the forum is available online for any questions that can go through the forum.</TD>";
									$autobody .= "</TR>";
								$autobody .= "</TABLE>";
							$autobody .= "</BODY>";
							$autobody .= "</HTML>";

/////////// EMAIL PART /////////// 
 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/swift/swift/lib/Swift.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/swift/swift/lib/Swift/Connection/SMTP.php");
 
$smtp =& new Swift_Connection_SMTP("mail.ayrshireminis.com", 26); // outgoing mail server and port number
$smtp->setUsername("picco+ayrshireminis.com"); // email username
$smtp->setPassword(""); // email password

// From user to AyrshireMinis.com
$swift =& new Swift($smtp);
 
$message =& new Swift_Message("Message from Website", $body, "text/html");

// send the email .....
if ($swift->send($message, "crmpicco@aol.co.uk", $email)) {
	$emailtome = "sent";
} else {
	$emailtome = "failed";
}
 
// It's polite to do this when you're finished
$swift->disconnect();


// AUTO RESPONDER

$autosmtp =& new Swift_Connection_SMTP("mail.ayrshireminis.com", 26); // outgoing mail server and port number
$autosmtp->setUsername("picco+ayrshireminis.com"); // email username
$autosmtp->setPassword(""); // email password

$autoswift =& new Swift($autosmtp);

$automessage =& new Swift_Message("Message Received", $autobody, "text/html");

// send the email .....
if ($autoswift->send($automessage, $email, "picco@ayrshireminis.com")) {
    $emailtouser = "sent";
} else {
    $emailtouser = "failed";
}

// It's polite to do this when you're finished
$autoswift->disconnect();

/////////// EMAIL PART ///////////

						?>

					<?php
						if ($emailtome == "sent") {
						?>
						<table>
							<tr>
								<td class="text_small_dark">Ihre Nachricht wurde an uns. Siehe unten für andere Weise mit uns in Verbindung!</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<?php 
							} 
							if ($emailtome == "failed") {
						?>
						<table>
							<tr>
								<td class="text_small_dark">Es wurde ein Problem Senden Sie Ihre Nachricht an uns. Doch es gibt auch andere Möglichkeiten, in Kontakt zu treten. Bitte siehe unten:</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<?php 
							}	
						} 
						?>

						<table>
							<tr>
								<td class="text_small_dark"></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						
						<table>
							<tr>
								<td class="text_small_dark">Kontakt über das Forum: <a href="/mini/<?php echo $dir; ?>/forum.php" style="color: #0000FF;">Gehen Sie zu dem Forum</a></td>
							</tr>
							<tr>
								<td class="text_small_dark">Kontakt per Email: <a href="mailto:info@ayrshireminis.com?subject=Enquiry from Website" style="color: #0000FF;">info [AT] ayrshireminis [DOT] com</a> (the @ and dot signs have been moved to prevent email harvesting)</td>
							</tr>
							<tr>
								<td class="text_small_dark">Kontakt per Instant Message (Windows Live Messenger/MSN): <span style="color: #0000FF;">crmpicco [AT] hotmail [DOT] com</span></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class="text_small_dark">Wir können auch auf der beliebten sozialen Netzwerken Websites Bebo, MySpace und Facebook. Klicken Sie auf einen der Webgrafiken unten zu gehen auf das Profil. Bitte beachten Sie, dass die beiden Bebo und Facebook müssen Sie sich zuerst einloggen, bevor die Anzeige des Profils.</td>
							</tr>
							<tr>
								<td align="center">
									<table align="center">
										<tr>
											<td><img src="/mini/images/myspace.jpg" onClick="window.open('http://www.myspace.com/ayrshireminis');" title="Finden Sie mich auf MySpace und mein Freund!" onMouseOver="style.cursor='pointer'" alt="MySpace"></td>
										</tr>
										<tr>
											<td>
												<img src="/mini/images/bebo.gif" onClick="window.open('http://AyrshireMinis.bebo.com/');" title="Meine Bebo Space!" onMouseOver="style.cursor='pointer'" alt="Bebo">
											</td>
										</tr>
										<tr>
											<td>
												<img src="/mini/images/facebook.jpg" onClick="window.open('http://www.facebook.com/profile.php?id=602040417');"  onMouseOver="style.cursor='pointer'" title="Gehen Sie zu unserer Facebook Profil" alt="Facebook">
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
							<br><br>
					</td>
				</tr>
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
<div align="center" style="width: 100%;">
	<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
</div>
</BODY>
</HTML>
