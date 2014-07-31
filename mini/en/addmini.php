<?php 
/*
addmini.php
allow the user to upload a picture or pictures of one or more Minis
18-Dec-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);

if (isset($_GET["lang"])) {
	$lang = $_GET["lang"];
}

require_once($_SERVER['DOCUMENT_ROOT'].'/mini/inc/recaptchalib.php');
$publickey = "6LeVewAAAAAAAHd3JzIrF5XHJ-5z_gAcF6MmUOx2";
$privatekey = "6LeVewAAAAAAAPMA5FY7Kqt5fxFxAKF9OtrtI8dV";

# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;

$imgerror = "";

# are we submitting the page?
if (isset($_POST["submit"])) {

	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

	if ($resp->is_valid) {
		# in a real application, you should send an email, create an account, etc
	} else {
		# set the error code so that we can display it.
		$error = $resp->error;
	}

	// yesterday in 'd-m-Y' format
	$uts['yesterday'] = strtotime('-1 days');

	echo "$imgerror<br>";

	// check if the user's IP address has recently uploaded an image (flood check)
	// but not for me on localhost (127.0.0.1)
	if ($_SERVER["REMOTE_ADDR"] != "127.0.0.1" and $_SERVER["REMOTE_ADDR"] != "81.105.48.217") { 
		$floodcheck = mysql_query("SELECT COUNT(id) AS results FROM `ayrshire_mini`.`gallery` WHERE ipaddr = '" . $_SERVER["REMOTE_ADDR"] . "' AND dateuploaded BETWEEN '" . date("Y-m-d", $uts["yesterday"]) . "00:00:00'  AND now()") or die(mysql_error());
		if (mysql_num_rows($floodcheck)) {
			$floodrow = mysql_fetch_assoc($floodcheck);
			if ($floodrow["results"] != "0") {
				$floodalert = true;
			} else {
				$floodalert = false;
			}
		}
	}

	/* UPLOADING FILE */
	$target_path = "../images/gallery/";
	$target_path = $target_path . basename( $_FILES['filename']['name']); 

	if (filesize($_FILES['filename']['tmp_name']) > 3000000) {
		$imgerror = "The Image ($filename) you uploaded is over 3MB, please scale down the image or upload another image";
	}

	#if (!isset($imgerror)) {
		if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)) {
			echo "[66] IMAGE UPLOADED<br>";
			echo "$target_path<br>";
			$imguploaded = true;
		} else {
			echo "problem moving things!!!!<br>";
		}
	#} else {
	#	echo "$imgerror<br>";
	#}

	#exit;

	$filename = basename( $_FILES['filename']['name']);

	# 65316 - 65k
	# 165316 - 165k
	# 1165316 - 1.1Mb
	# 2000000	

	unset($target_path);
	$target_path = "../images/gallery/";
	$target_path = $target_path . basename( $_FILES['moreimage1']['name']); 

	if (filesize($_FILES['moreimage1']['tmp_name']) > 3000000) {
		$imgerror = "The Image you uploaded is over 3MB, please scale down the image or upload another image";
	}

	if (!isset($imgerror)) {
		if(move_uploaded_file($_FILES['moreimage1']['tmp_name'], $target_path)) {
			$imguploaded = true;
		}
	}

	unset($target_path);
	$target_path = "../images/gallery/";
	$target_path = $target_path . basename( $_FILES['moreimage2']['name']); 

	if (filesize($_FILES['moreimage2']['tmp_name']) > 3000000) {
		$imgerror = "The Image you uploaded is over 3MB, please scale down the image or upload another image";
	}

	if (!isset($imgerror)) {
		if(move_uploaded_file($_FILES['moreimage2']['tmp_name'], $target_path)) {
			$imguploaded = true;
		}
	}

	unset($target_path);
	$target_path = "../images/gallery/";
	$target_path = $target_path . basename( $_FILES['moreimage3']['name']); 
//	echo "<font color=white>TARGET PATH: " . $target_path . "</font><br>";

	if (filesize($_FILES['moreimage3']['tmp_name']) > 3000000) {
		$imgerror = "The Image you uploaded is over 3MB, please scale down the image or upload another image";
	}

	if (!isset($imgerror)) {

		if(move_uploaded_file($_FILES['moreimage3']['tmp_name'], $target_path)) {
//			echo "The file ".  basename( $_FILES['moreimage3']['name']). 
//			" has been uploaded";
			$imguploaded = true;
		} else {
//			echo "There was an error uploading the file, please try again!";
		}
	}
}

if (isset($_POST["cardesc"])) {
	$cardesc		= mysql_real_escape_string($_POST["cardesc"]);
}
if (isset($_POST["year"])) {
	$year			= mysql_real_escape_string($_POST["year"]);
}
if (isset($_POST["category"])) {
	$category		= mysql_real_escape_string($_POST["category"]);
}
if (isset($_POST["member"])) {
	$member			= mysql_real_escape_string($_POST["member"]);
}
if (isset($_POST["imgurl"])) {
	$externalimage	= mysql_real_escape_string($_POST["imgurl"]);
}
if (isset($_POST["moreinfo"])) {
	$moreinfo		= mysql_real_escape_string($_POST["moreinfo"]);
}
if (isset($_POST["country"])) {
	$country		= mysql_real_escape_string($_POST["country"]);
}
if (isset($_POST["process"])) {
	$process		= mysql_real_escape_string($_POST["process"]);
} else {
	$process		= "";
}

if (isset($externalimage)) {
	$imguploaded = true;
}

if (isset($country)) {
	$userfrom = explode("|", $country);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="mini, cooper, rover, clubman, british leyland, austin, bmw, ayrshire minis, ayrshire mini, ayrshire, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Galleries of Classic Minis and New MINIs - Add A Mini</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
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
					<td><span class="heading"><a href="/mini/en/galleries.php">Gallery</a></span>&nbsp;>&nbsp;<span class="sub_heading">Add your Mini/MINI to the Gallery</span><br>


						<?php 
						
						if (!$process || $error || $imgerror || !$imguploaded) { 
						?>
						<span class="text_small_dark">Enter your information about your Mini or a Mini that you have spotted and it will be uploaded to the website and viewable by others in the online gallery. As it is a Mini-based site then please only upload images of Minis</span><br>
						<span class="text_small_dark">Want to contact us about anything? Go <a href="/mini/en/contact.php"><b>Here</b></a>.</span><br>
						<br>

						<?php 
							if ($process) {	
								if ($imgerror || !$imguploaded) { ?>
							
							<table style="background-color: #FF0000; border: 1px solid #000000" width="100%">
								<tr>
									<td class="text_small_dark">There was an error uploading the file, please ensure the file is an image and not larger than 3 MB</td>
								</tr>
							</table>
							<br>
						<?php 
								}
							} 
						?>
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
						<div class="question">
							<form id="addmini" method="post" action="addmini.php" enctype="multipart/form-data" onsubmit="return check_gallery_form(this.form);">

							<table style="border: 2px solid #000;" width="80%" align="center">
								<tr>
									<td colspan="2" class="text_v_small_dark" align="center"><span class="required">*</span>&nbsp;Donates Mandatory Fields</td>
								</tr>
								<tr>
									<td class="text_head" width="30%">Short Description&nbsp;<span class="required">*</span></td>
									<td width="70%"><input type="text" name="cardesc" id="cardesc" size="60" class="textbox"></td>
								</tr>							
								<tr>
									<td class="text_head">Category</td>
									<td>
										<select name="category" id="category" class="select" onChange="changeyear(this.value);">
											<option>Classic Mini (Mini)</option>
											<option>New Mini (MINI)</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="text_head">Year of Registration</td>
									<td>
										<select name="year" id="year" class="select">
											<?php 
												for ($i = date("Y"); $i >= 1959; $i = $i-1) {
													echo "<option value='" . $i . "'>$i</option>";
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="text_head">Upload your image&nbsp;<span class="required">*</span></td>
									<td><input type="file" name="filename" id="filename" class="textbox" size="40">&nbsp;&nbsp;<span class="link_v_small" onMouseOver="style.cursor='pointer'" onClick="show_hide_extra_images('moreimages');">more....</span></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>
										<table width="100%" id="moreimages" style="display: none;">
											<tr>
												<td class="text_small_dark">Image 1</td>
												<td><input type="file" name="moreimage1" id="moreimage1" class="textbox" size="40"></td>
											</tr>
											<tr>
												<td class="text_small_dark">Image 2</td>
												<td><input type="file" name="moreimage2" id="moreimage2" class="textbox" size="40"></td>
											</tr>
											<tr>
												<td class="text_small_dark">Image 3</td>
												<td><input type="file" name="moreimage3" id="moreimage3" class="textbox" size="40"></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="font-family: Verdana; font-size: 8pt;">or link to image web address</td>
									<td><input type="text" name="imgurl" id="imgurl" size="50" class="textbox">&nbsp;&nbsp;<span class="link_v_small" onMouseOver="style.cursor='pointer'" onClick="show_hide_extra_images('moreurls');">more....</span></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>
										<table width="100%" id="moreurls" style="display:none;" cellpadding="1" cellspacing="1">
											<tr>
												<td>
													<span class="text_small_dark">URL 1:</span>&nbsp;<input type="text" name="moreurl1" id="moreurl1" size="50" class="textbox"><br>
													<span class="text_small_dark">URL 2:</span>&nbsp;<input type="text" name="moreurl2" id="moreurl2" size="50" class="textbox"><br>
													<span class="text_small_dark">URL 3:</span>&nbsp;<input type="text" name="moreurl3" id="moreurl3" size="50" class="textbox"><br>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="text_head" valign="top">More Information about Mini</td>
									<td><textarea name="moreinfo" id="moreinfo" cols="45" rows="5" class="textarea"></textarea></td>
								</tr>
								<tr>
									<td class="text_head">Are you already an <br>AyrshireMinis.com Member ?</td>
									<td class="textbox">
										Yes&nbsp;<input type="radio" name="member" value="Yes" onMouseOver="style.cursor='pointer'" onClick="showreg('reglink',this.value);">
										No&nbsp;<input type="radio" name="member" value="No" onMouseOver="style.cursor='pointer'" onClick="showreg('reglink',this.value);">
									</td>
								</tr>
								<?php
								$countries = mysql_query("SELECT DISTINCT(countryname) FROM `ayrshire_mini`.`countries` ORDER BY countryname ASC") or die(mysql_error());
								?>
								<tr>
									<td class="text_head">Where are you from?</td>
									<td>
										<select name="country" id="country" class="select">
										<?php
											if (mysql_num_rows($countries)) {

												//echo "<optgroup label='United Kingdom' class='select_optgroup'></optgroup>";
												// United Kingdom
												
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
									<td>&nbsp;</td>
									<td>
										<span class="link_v_small" onClick="location.href='/mini/en/contact.php'" onMouseOver="style.cursor='pointer'">Not Listed? Let Us Know.....</span>
									</td>
								</tr>
								<tr>
									<td>
										<table width="100%" id="reglink" style="display:none;">
											<tr>
												<td align="right"><span class="link_v_small" onClick="location.href='/mini/en/register.php'" onMouseOver="style.cursor='pointer'">Click Here to Become a Member</span></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="text_head" width="35%" valign="top">Enter Validation Words<br><span class="text_v_small_dark" onClick=" window.open('/mini/en/whyrecaptcha.php','Why Recaptcha','status=1,toolbar=1');" onMouseOver="style.cursor='pointer'">Why?</span></td>
									<td>
										<?php echo recaptcha_get_html($publickey, $error); ?>
									</td>
								</tr>
								<tr>
									<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Send" onMouseOver="style.cursor='pointer'" title="Send Message to Us!"></td>
								</tr>
							</table>
							<input type="hidden" name="MAX_FILE_SIZE" value="100000">
							<input type="hidden" name="process" id="process" value="sendmessage">
							</form>
						</div>
						<?php 
						} else { 

							// replace problematic characters (£) with HTML entity
							$moreinfo = fixbadchars($moreinfo);
							
							/*
							$cardesc		= addslashes($cardesc);
							$category		= addslashes($category);
							$filename		= addslashes($filename);
							$externalimage	= addslashes($externalimage);
							$year			= addslashes($year);
							$moreinfo		= addslashes($moreinfo);
							$country		= addslashes($country);
							*/

							$last = mysql_query("SELECT MAX(submissionid) AS lastsub FROM `ayrshire_mini`.`gallery`") or die(mysql_error());
							if (mysql_num_rows($last)) {
								$lastrow = mysql_fetch_assoc($last);
								$lastsub = $lastrow["lastsub"] + 1;
							}
							// free memory
							mysql_free_result($last);

							$latestsubmission = mysql_query("SELECT MAX(submissionid) AS lastsub FROM `ayrshire_mini`.`gallery_submissions`") or die(mysql_error());
							if (mysql_num_rows($latestsubmission)) {
								$row = mysql_fetch_assoc($latestsubmission);
								//echo $row["moreinfo"]
								$lastsub = $row["lastsub"];
							}
							// free memory
							mysql_free_result($latestsubmission);

							$lastsub = $lastsub + 1;


							$today = date("Y-m-d");
	
							// if the user's IP is not attempting to flood the site with images/files
							if (!$floodalert) {
								// insert the picture into the database pending authenication
								// for ONE Uploaded image and ONE URL
								$insert = "INSERT INTO `ayrshire_mini`.`gallery` (submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country, dateuploaded, ipaddr) VALUES ('$lastsub', '$cardesc', '$category', '$filename', '$externalimage', '$year', '$moreinfo', '$userfrom[0]', '$userfrom[1]', now(), '" . $_SERVER["REMOTE_ADDR"]  . "')";

								mysql_query($insert) or die(mysql_error());

								$latestimageid = mysql_insert_id();

								$subinsert = "INSERT INTO `ayrshire_mini`.`gallery_submissions` (submissionid, imageid) VALUES ('$lastsub', '$latestimageid')";	
								mysql_query($subinsert) or die(mysql_error());

								// all the possible additional images that can be uploaded/linked to
								$moreimages = array("moreimage1", "moreimage2", "moreimage3");
								$moreurls	= array("moreurl1", "moreurl2", "moreurl3");
								
								// go through all the additional upload Image form fields
								foreach ($moreimages as $image) {
									
									//echo "IMAGE: " . $_POST[$image] . "<br>";
									
									// if there is a value for the uploaded image field
									
									
									if (basename($_FILES[$image]['name'])) {
									
									//if ($_POST[$image]) {
										

										$xtrainsert = "INSERT INTO `ayrshire_mini`.`gallery` (submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country, dateuploaded, ipaddr) VALUES ('$lastsub', '$cardesc', '$category', '" . basename($_FILES[$image]['name']) . "', '', '$year', '$moreinfo', '$userfrom[0]', '$userfrom[1]', now(), '" . $_SERVER["REMOTE_ADDR"] . "')";	
										//echo "INSERT: " . $xtrainsert . "<br>";
										mysql_query($xtrainsert) or die(mysql_error());
										$latestimageid = mysql_insert_id();
										//echo "latestimageid: " . $latestimageid . "<br>";
										
										
										$subinsert = "INSERT INTO `ayrshire_mini`.`gallery_submissions` (submissionid, imageid) VALUES ('$lastsub', '$latestimageid')";	
										//echo "subinsert: " . $subinsert . "<br>";	
										mysql_query($subinsert) or die(mysql_error());
										//if (!$latestsubid) {
										//	$latestsubid = mysql_insert_id();
										//}
										//echo "<br>";
									} else {
										//echo "THE IMAGE: " . $_POST[$image] . "<br>";
										//echo "doesn't exist!!!<br>";	

									}
								}


								// go through all the additional URL form fields
								foreach ($moreurls as $url) {

									//echo "URL: " . $_POST[$url] . "<br>";
									
									// if there is a value for the URL field
									if ($_POST[$url]) {
										//echo "FIELD EXISTS<br>";
										$insert = "INSERT INTO `ayrshire_mini`.`gallery` (submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country, dateuploaded, ipaddr) VALUES ('$lastsub', '$cardesc', '$category', '', '" . addslashes($_POST[$url]) . "', '$year', '$moreinfo', '$userfrom[0]', '$userfrom[1]', now(), '" . $_SERVER["REMOTE_ADDR"] . "')";	
										mysql_query($insert) or die(mysql_error());
										$latestimageid = mysql_insert_id();
										//echo "latestimageid: " . $latestimageid . "<br>";
										
										$subinsert = "INSERT INTO `ayrshire_mini`.`gallery_submissions` (submissionid, imageid) VALUES ('$lastsub', '$latestimageid')";	
										//echo "subinsert: " . $subinsert . "<br>";	
										mysql_query($subinsert) or die(mysql_error());

									}

								}		
							} // floodalert
							
							// destroy the image arrays
							unset($moreimages);
							unset($moreurls);


							//mysql_query($insert) or die ("MySQL Error: Failed Insert");

							if (!$floodalert) {

							// display upload success message, image(s) have been uploaded 
							// to the site and are now viewable in the gallery
						?>
						<br>
						<table style="border: 2px solid #000;" width="80%" align="center">
							<tr><td>&nbsp;</td></tr>
							<tr>
								<td class="text_medium_dark" colspan="4" align="center">The following details have been sent to us and your Mini is now viewable in the online gallery. Any inappropriate images uploaded to the site will instantly be removed and your IP address logged.</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="20%">&nbsp;</td>
								<td class="text_head">Car Description</td>
								<td class="text_small_dark"><?php echo $cardesc ?></td>
								<td width="20%">&nbsp;</td>
							</tr>
							<tr>
								<td width="20%">&nbsp;</td>
								<td class="text_head">Year of Registration</td>
								<td class="text_small_dark"><?php echo $year ?></td>
								<td width="20%">&nbsp;</td>
							</tr>
							<tr>
								<td width="20%">&nbsp;</td>
								<td class="text_head">Category</td>
								<td class="text_small_dark"><?php echo $category ?></td>
								<td width="20%">&nbsp;</td>
							</tr>
							<tr><td colspan="4" align="center"><a href="/mini/en/galleries.php" class="link_general">I want to see my Mini!....</a></td></tr>
							<tr><td>&nbsp;</td></tr>
						</table>
						<?php 
							
						} else { 
						
						// display the 'flood alert' message

						?>
						
						<br>
						<table style="border: 2px solid #000;" width="80%" align="center">
							<tr><td>&nbsp;</td></tr>
							<tr class="text_medium_dark">
								<td>We have noticed that you have recently uploaded an image, the image you tried to upload will not be uploaded to us or shown on the site for the time being. This is purely to prevent some rogue users attempting to send large amounts of images to our server one after another.</td>
							</tr>
							<tr class="text_medium_dark">
								<td>However, please do come back and upload your image later.....</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
						</table>

					<?php 
						}	
					} ?>

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
<div align="center">
	<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
</div>
</BODY>
</HTML>