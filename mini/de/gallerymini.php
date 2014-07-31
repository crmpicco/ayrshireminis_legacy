<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
gallerymini.php
Display the mini and the javascript thumbnail image
gallery for the image submission requested
21-Oct-2007
[Deutsch Version]
*/
// full error reporting on
error_reporting(E_ALL);

include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");

if(is_numeric($_GET["id"])) { 

	$imageid = escape_data($_GET["id"]);

	$titleresult = mysql_query("SELECT id, submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country FROM `ayrshire_mini`.`gallery` WHERE id = '$imageid'") or die(mysql_error());

} else {
	$titleresult = "";
}

$title = <<<EOD
Ayrshire Minis - View A Mini from the Gallery
EOD;

if ($titleresult) {
	if (mysql_num_rows($titleresult)) {
		$row = mysql_fetch_assoc($titleresult);
		$title = "Ayrshire Minis - " . $row["cardesc"];
	}
}

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
<TITLE><?php echo $title; ?></TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="DE">
<META NAME="revisit-after" CONTENT="14 days">
<META NAME="robots" CONTENT="all">
<META NAME="Author" CONTENT="Craig Richard Morton">
<META NAME="Copyright" CONTENT="AyrshireMinis.com 2007">
<script language="JavaScript" type="text/javascript" src="/mini/js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="stylesheet" type="text/css" href="/mini/inc/thumbnailviewer.css">
<link rel="shortcut icon" href="/favicon.ico">
<script language="JavaScript" type="text/javascript" src="/mini/inc/thumbnailviewer.js">

/***********************************************
* Image Thumbnail Viewer Script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
</HEAD>
<BODY>
<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php");

$imageid = escape_data($_GET["id"]);
//echo "imageid: $imageid<br>";
$imagequery = "SELECT id, submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country FROM `ayrshire_mini`.`gallery` WHERE id = '$imageid'";
#echo "imagequery: $imagequery<br>";

$result = mysql_query($imagequery) or die(mysql_error());

#echo "rows: " . mysql_num_rows($result) . "<br>";
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
					<td><span class="heading"><a href="/mini/en/galleries.php">Galerie</a></span>&nbsp;>&nbsp;<span class="sub_heading">View Mini</span><br></td>
				</tr>
				<tr class="text_small_dark">
					<td>Klicken Sie auf das kleinere Vorschaubilder, um das Bild größer</td>
				</tr>
				<tr>
					<td width="100%">
					<?php
						if (mysql_num_rows($result)) {
							$row = mysql_fetch_assoc($result); 

							if ($row["image"]) {
								$image = $row["image"];
							} else if ($row["externalimage"]) {
								$image = $row["externalimage"];
							}

							$submissionid = $row["submissionid"];
					?>
					<div class="question">
						<table>
							<tr>
								<td colspan="2" align="center">
								
								<?php
									if ($row["image"]) {
										
										echo "<img src='/mini/images/gallery/$image' width='50%' height='100%' alt='Uploaded Mini'>";

									} else if ($row["externalimage"]) {
									
										echo "<img src='$image' width='50%' height='100%'>";
									}
								?>
								</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
					<?php

					// get any extra images that have been uploaded with the original image and show them in a mini-gallery
					$xtraimages = mysql_query("SELECT id, category, image, externalimage, year FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$submissionid' AND id <> '$imageid'") or die(mysql_error());

					?>
							<tr>
							
								<td colspan="2" align="center">

							<?php

								if (mysql_num_rows($xtraimages)) {
									while ($xtrarow = mysql_fetch_assoc($xtraimages)) {

										if ($xtrarow["image"]) {
											$xtraimage = $xtrarow["image"];
										} else if ($xtrarow["externalimage"]) {
											$xtraimage = $xtrarow["externalimage"];
										}
							?>

									<?php if ($xtrarow["image"]) { ?>
											<a href="/mini/images/gallery/<?php echo $xtraimage ?>" rel="thumbnail"><img src="/mini/images/gallery/<?php echo $xtraimage ?>" style="width: 60px; height: 50px;" title="Click to view bigger image" onMouseOver="style.cursor='pointer'"></a>
									<?php } else if ($xtrarow["externalimage"]) { ?>
											<a href="<?php echo $xtraimage ?>" rel="thumbnail"><img src="<?php echo $xtraimage ?>" style="width: 60px; height: 50px" title="Click to view bigger image" onMouseOver="style.cursor='pointer'"></a>
									<?php }
									}	
								} 
							?>
								</td>
							
							<?php

							$countryimg = mysql_query("SELECT DISTINCT(countrycode), provincename FROM `ayrshire_mini`.`countries` WHERE countryname = '" . $row["country"] . "' AND cityname = '" . $row["city"]. "'") or die(mysql_error());
							if (mysql_num_rows($countryimg)) {

								$countryrow = mysql_fetch_assoc($countryimg); 

								$countrycode = $countryrow["countrycode"];
								$provincename = $countryrow["provincename"];
							}
							mysql_free_result($countryimg);

							?>
							
							</tr>
							<tr>
								<td class="text_head" width="20%">Beschreibung:</td>
								<td class="text_small_dark"><?php echo $row["cardesc"] ?></td>
							</tr>
							<tr>
								<td class="text_head">Kategorie:</td>
								<td class="text_small_dark"><?php echo $row["category"] ?></td>
							</tr>
							<tr>
								<td class="text_head">Jahr:</td>
								<td class="text_small_dark"><?php echo $row["year"] ?></td>
							</tr>
							<?php if (isset($row["city"]) || isset($row["country"])) { ?>
								<tr>
									<td class="text_head">Geschrieben von einem Benutzer aus:</td>
									<td class="text_small_dark">
									<?php
								
									if ($provincename == "Scotland" || $provincename == "England" || $provincename == "Wales" || $provincename == "Northern Ireland") {
										// show UK flags										

										switch ($provincename)
										{
											case "Scotland":
											echo "<img src='/mini/images/flags/gb/gb-sc.png' alt='Scotland' title='Scotland'>";
											break;

											case "England":
											echo "<img src='/mini/images/flags/gb/gb-en.png' alt='England' title='England'>";
											break;

											case "Wales":
											echo "<img src='/mini/images/flags/gb/gb-wl.png' alt='Wales' title='Wales'>";
											break;

											case "Northern Ireland":
											echo "<img src='/mini/images/flags/gb/gb-ni.png' alt='Northern Ireland' title='Northern Ireland'>";
											break;

											default:
											echo "<img src='/mini/images/flags/specials/eu.png' alt='EU' title='EU'>";
											break;
										}


									} else {
										// non UK flags
										if ($countrycode) {
											echo "<img src='/mini/images/flags/world/" . strtolower($countrycode) . ".png' title='" . $row["country"] . "'>";
										}
									}
									?>
									
									<?php echo $row["city"] . ", " . $row["country"] ?></td>
								</tr>
							<?php } ?>
							<tr>
								<td class="text_head" valign="top">Weitere Informationen:</td>
								<td class="text_small_dark"><?php echo $row["moreinfo"] ?></td>
							</tr>
						</table>
					</div>
					<?php
					} else { 
					?>

						<table width="100%">
							<tr class="text_small_dark">
								<td>Sorry, aber diese Galerie Bild (er) sind derzeit nicht verfügbar. Wenn dieses Problem weiterhin besteht wenden Sie sich bitte an die Website Administrator <a href="mailto:info@ayrshireminis.com?Subject=Website Problem">info [AT] ayrshireminis [DOT] com</a></td>
							</tr>
						</table>
					
					

					<?php } ?>

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
	<?php include($_SERVER["DOCUMENT_ROOT"]. "/mini/inc/footer.php") ?>
</div>
</BODY>
</HTML>