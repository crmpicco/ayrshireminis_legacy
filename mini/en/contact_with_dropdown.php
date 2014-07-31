<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
contact.php
contact form with captcha to allow user to enter their details 
and email is sent to info@ayrshireminis.com
20-Oct-2007
*/

// full error reporting on
error_reporting(E_ALL);

require_once($_SERVER['DOCUMENT_ROOT'].'/mini/inc/recaptchalib.php');
$publickey = "6LeVewAAAAAAAHd3JzIrF5XHJ-5z_gAcF6MmUOx2";
$privatekey = "6LeVewAAAAAAAPMA5FY7Kqt5fxFxAKF9OtrtI8dV";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

# are we submitting the page?
if (isset($_POST["submit"])) {

	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

	if ($resp->is_valid) {
		# in a real application, you should send an email, create an account, etc
	} else {
		# set the error code so that we can display it. You could also use
		# die ("reCAPTCHA failed"), but using the error message is
		# more user friendly
		$error = $resp->error;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Get in touch....by email, web, chat or social networking</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="/mini/js/general.js"></script>
<script src="/mini/js/jquery-1.2.1.pack.js" type="text/javascript"></script>
<script type="text/javascript"> 
function lookup(inputString) {
    if(inputString.length == 0) {
        // Hide the suggestion box.
        $("#suggestions").hide();
    } else {
        $.post("autocompletelocation.php", {queryString: ""+inputString+""}, function(data){
            if(data.length >0) {
                $("#suggestions").show();
                $("#autoSuggestionsList").html(data);
            }
        });
    }
} // lookup

function fill(thisValue) {
    $("#inputString").val(thisValue);
   $("#suggestions").hide();
}

</script>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAADRf4od0L7qP8vraLumZl9xRoJVR35L6QOmykPzIoUJ5GaQiNVRR6kRsmb6FVNMC5ClvqmmCJDYe1Ew" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[

/*
FUNCTION: getInfoTextDiv
build up the HTML for the Google Maps info balloon
*/
function getInfoTextDiv() {

	var div = document.createElement("div");
	var p = document.createElement("p");
	p.innerHTML = "<span style='font-family: Verdana; size: 8px; font-weight: bold;'>Ayrshire Minis</span>";
	div.appendChild(p);

	p = document.createElement("p");
	p.innerHTML = "<span style='font-family: Verdana; size: 4pt;'>Mauchline, East Ayrshire<br><a style='text-decoration: underline;' href:'mailto:picco@ayrshireminis.com' onMouseOver='style.cursor=\'pointer\''>e: picco@ayrshireminis.com</a></span>";
	div.appendChild(p);

	return div;

}

/*
FUNCTION: initialize
set the co-ordinates for Mauchline and generate the map
*/
function initialize() {

	if (GBrowserIsCompatible()) {
		var map = new GMap2(document.getElementById("map_canvas"))
		map.setCenter(new GLatLng(55.518282, -4.379168), 13);
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());

		map.openInfoWindow(map.getCenter(), getInfoTextDiv());
	}
}


//]]>
</script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
<style type="text/css">

.suggestionsBox {
    position: relative;
    left: 30px;
    margin: 10px 0px 0px 0px;
    width: 200px;
    background-color: #212427;
    -moz-border-radius: 7px;
    -webkit-border-radius: 7px;
    border: 2px solid #000;
    color: #fff;
}

.suggestionList {
    margin: 0px;
    padding: 0px;
}

.suggestionList li {
    margin: 0px 0px 3px 0px;
    padding: 3px;
    cursor: pointer;
}

.suggestionList li:hover {
    background-color: #659CD8;
}

</style>
</HEAD>
<BODY onload="initialize()" onunload="GUnload()">
<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php");

if (isset($_POST["name"]))		{	$name		= escape_data($_POST["name"]);  }
if (isset($_POST["email"]))		{	$email		= escape_data($_POST["email"]); }
if (isset($_POST["subject"]))	{	$subject	= escape_data($_POST["subject"]); }
if (isset($_POST["message"]))	{	$message	= escape_data($_POST["message"]); }
if (isset($_POST["country"]))	{	$country	= escape_data($_POST["country"]); }
if (isset($_POST["process"]))	{	$process	= escape_data($_POST["process"]); } else { $process = ""; }

?>
<table align="center" style="width: 80%; background-color: #FFFFFF; *margin-top: -11px;" bgcolor="FFFFFF">
  <tbody>
    <tr>
      <td>
      <table style="text-align: left; width: 100%;"border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top">

<table border="0" cellpadding="2" cellspacing="2" width="100%" id="main-box">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="heading"><a href="/mini/en/contact.php">Contact</a></span><br>

						<?php 
						if (!$process || $error) { 
						?>
						<span class="text_small_dark">Enter your information here if you wish to get in contact with us. If your city, town, village or country is not listed the drop us a line and we will add it</span><br><br>
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
							<table width="80%" align="center">
								<tr><td>&nbsp;</td></tr>
								<tr>
									<td class="text_head" width="35%">Your Name&nbsp;<span class="required">*</span></td>
									<td><input type="text" name="name" id="name" class="textbox" size="40"></td>
								</tr>
								<tr>
									<td class="text_head" width="35%">Your Email&nbsp;<span class="required">*</span></td>
									<td><input type="text" name="email" id="email" class="textbox" size="40"></td>
								</tr>
								<tr>
									<td class="text_head" width="35%">Subject (optional)</td>
									<td><input type="text" name="subject" id="subject" class="textbox" size="30"></td>
								</tr>
								<?php
								$countries = mysql_query("SELECT DISTINCT(countryname) FROM `ayrshire_mini`.`countries` ORDER BY countryname ASC") or die(mysql_error());
								?>
								<tr>
									<td></td>
									<td>
										<div>
											<div>Type your county (for the demo):<input size="30" id="inputString" onkeyup="lookup(this.value);" type="text" /></div>      
											<div class="suggestionsBox" id="suggestions" style="display: none;">
												<img src="/mini/images/upArrow.png" style="position: relative; top: -12px; left: 30px" alt="upArrow" />
												<div class="suggestionList" id="autoSuggestionsList"></div>
											</div>
										</div>									
									</td>
								</tr>
								<tr>
									<td class="text_head">Where are you from?</td>
									<td>
										<select name="country" id="country" class="select">
										<?php
											if (mysql_num_rows($countries)) {

												// show all the AYRSHIRE towns/villages first
												$ayrshirecities = mysql_query("SELECT DISTINCT(cityname), provincename FROM `ayrshire_mini`.`countries` WHERE countryname = 'United Kingdom' AND provincename IN ('East Ayrshire', 'North Ayrshire', 'South Ayrshire') ORDER BY provincename, cityname ASC");
												if (mysql_num_rows($ayrshirecities)) {
													while($ayrshirecity = mysql_fetch_assoc($ayrshirecities)) {

														if ($county != $ayrshirecity["provincename"]) {
															if (isset($county)) {
																echo "</optgroup>";
															}
															echo "<optgroup label='$ayrshirecity[provincename]' class='select_optgroup'>";
															
															// " . $ayrshirecity["provincename"]. "
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
												$ukcities = mysql_query("SELECT DISTINCT(cityname), provincename FROM `ayrshire_mini`.`countries` WHERE countryname = 'United Kingdom' AND provincename NOT IN ('East Ayrshire', 'North Ayrshire', 'South Ayrshire') ORDER BY cityname ASC");
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
																// " . $country["countryname"] . "
																while($cap = mysql_fetch_assoc($capital)) {											echo "<option value='" . fixapostrophe($cap["cityname"]) . "|" . $country["countryname"] . "'>" . $cap["cityname"]. "</option>";
																}
																echo "</optgroup>";
															}
															mysql_free_result($capital);
															unset($cap);
														}
													}
												} // countries WHILE
											}
										?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="text_head" width="35%" valign="top">Your Message&nbsp;<span class="required">*</span></td>
									<td><textarea name="message" id="message" cols="40" rows="5" style="font-family: Verdana; font-size: 9pt;">Enter your message here</textarea></td>
								</tr>
								<tr>
									<td class="text_head" width="35%" valign="top">Enter Validation Words<br><span class="text_v_small_dark" onClick=" window.open('/mini/en/whyrecaptcha.php','Why Recaptcha','status=no,toolbar=no');" onMouseOver="style.cursor='pointer'">Why?</span></td>
									<td>
										<?php echo recaptcha_get_html($publickey, $error); ?>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Send" onMouseOver="style.cursor='pointer'" title="Send Message to Us!"></td>
								</tr>
							</table>
						</div>						
						<!--<div id="map" style="width: 500px; height: 300px"></div>-->
						<center>
						<div id="map_canvas" style="width: 500px; height: 300px"></div>
						</center>
						<input type="hidden" name="process" id="process" value="sendmessage">
						</form>
						<?php 
						} else { 
							// captcha has been validated, form has been submitted - send email
							
							// get date/time of message
							$time = getdate(date("U"));	

							$location = explode("|", $country);

							// create the html email to send to me
							$body = "<html>";
							$body .= "<body>";
								$body .= "<table>";
									$body .= "<tr style='background-color: #003300'><td class='text_medium'><font color='white'><strong>AyrshireMinis.com</strong></font></td></tr>";
									$body .= "<tr class='text_medium'>";
										$body .= "<td><strong>$name</strong> has sent a message from the website</td>";
									$body .= "</tr>";
									$body .= "<tr class='text_medium'>";
										$body .= "<td><strong>Sent on:</strong> $time[weekday] $time[month] $time[mday] $time[year] $time[hours]:$time[minutes]:$time[seconds]</td>";
									$body .= "</tr>";
									$body .= "<tr class='text_medium'>";
										$body .= "<td><strong>Email Address:</strong> $email</td>";
									$body .= "</tr>";
									if ($subject) {
										$body .= "<tr class='text_medium'>";
											$body .= "<td><strong>Subject:</strong> $subject</td>";
										$body .= "</tr>";
									}
									$body .= "<tr class='text_medium'>";
										$body .= "<td><strong>Country:</strong> $location[0], $location[1]</td>";
									$body .= "</tr>";
									$body .= "<tr class='text_medium'>";
										$body .= "<td><strong>Message:</strong> $message</td>";
									$body .= "</tr>";
								$body .= "</table>";
							$body .= "</body>";
							$body .= "</html>";

							unset($location);

							// autoresponder: from ayrshireminis to the person that entered the enquiry

							$autobody = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">";
							$autobody .= "<HTML>";
							$autobody .= "<HEAD>";
							$autobody .= "<TITLE>AyrshireMinis.com - a Mini E-Community - Enquiry Received</TITLE>";
							$autobody .= "</HEAD>";
							$autobody .= "<BODY>";
								$autobody .= "<TABLE>";
									$autobody .= "<TR style='border: 1px solid #000000; background-color: #003300'><TD class='text_medium'><font color='white'><strong>AyrshireMinis.com</strong></font></TD></TR>";
									$autobody .= "<TR class='text_medium'>";
										$autobody .= "<TD>Your message has been received by us here at AyrshireMinis.com<br></TD>";
									$autobody .= "</TR>";
									$autobody .= "<TR class='text_medium'>";
										$autobody .= "<TD>We will respond to your enquiry as soon as possible. <br><br>However, in the meantime the forum is available online for any questions that can go through the forum.</TD>";
									$autobody .= "</TR>";
									$autobody .= "<TR class='text_medium'>";
										$autobody .= "<TD>Thanks for getting in touch.<br><br></TD>";
									$autobody .= "</TR>";
									$autobody .= "<TR class='text_medium'>";
										$autobody .= "<TD>Picco @ <a href='http://www.ayrshireminis.com'>AyrshireMinis.com</a></TD>";
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
								<td class="text_small_dark">Your message has been sent to us. See below for other ways to get in touch!</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<?php 
							} 
							if ($emailtome == "failed") {
						?>
						<table>
							<tr>
								<td class="text_small_dark">There has been a problem sending your message to us. However, there are other ways to get in touch. Please see below:</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<?php 
							}	
						} 
						?>
						
						<table>
							<tr>
								<td class="text_small_dark">Contact via the Forum: <a href="/mini/en/forum.php" style="color: #0000FF;">Go to the Forum</a></td>
							</tr>
							<tr>
								<td class="text_small_dark">Contact via Email: <a href="mailto:info@ayrshireminis.com?subject=Enquiry from Website" style="color: #0000FF;">info [AT] ayrshireminis [DOT] com</a></td>
							</tr>
							<tr>
								<td class="text_small_dark">Contact via Instant Message (Windows Live Messenger/MSN): <span style="color: #0000FF;">crmpicco [AT] hotmail [DOT] com</span></td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class="text_small_dark">We can also be found on the popular social networking websites Bebo, MySpace and Facebook. Click any of the web badges below to go to the profile. Please note that both Bebo and Facebook require you to login first before viewing the profile.</td>
							</tr>
							<tr>
								<td align="center">
									<table align="center">
										<tr>
											<td><img src="/mini/images/myspace.jpg" onClick="window.open('http://www.myspace.com/ayrshireminis');" title="Find me on MySpace and be my friend!" onMouseOver="style.cursor='pointer'" alt="MySpace"></td>
										</tr>
										<tr>
											<td>
												<img src="/mini/images/bebo.gif" onClick="window.open('http://AyrshireMinis.bebo.com/');" title="View my Bebo Space!" onMouseOver="style.cursor='pointer'" alt="Bebo">
											</td>
										</tr>
										<tr>
											<td>
												<img src="/mini/images/facebook.jpg" onClick="window.open('http://www.facebook.com/profile.php?id=602040417');"  onMouseOver="style.cursor='pointer'" title="Go to our Facebook profile" alt="Facebook">
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr><td>&nbsp;</td></tr>	
							<?php 
							if (isset($emailtome)) {
								if ($emailtome == "sent") { 
							?>
								<br>
								<div align="center">
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
								</div>
							<?php } 
							} ?>
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
