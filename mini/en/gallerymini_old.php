<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
/*
gallerymini.php
Display the mini and the javascript thumbnail image
gallery for the image submission requested
21-Oct-2007
*/

// full error reporting on
error_reporting(E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="ayrshire minis, ayrshire mini, ayrshire, mini, cooper, rover, clubman, bmw, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links, picco">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - View a Mini from the Gallery</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
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
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/general.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/header.php");

if(is_numeric($_GET["id"])) { 

	$imageid = escape_data($_GET["id"]);

	$imagequery = "SELECT id, submissionid, cardesc, category, image, externalimage, year, moreinfo, city, country FROM `ayrshire_mini`.`gallery` WHERE id = '$imageid'";

	$result = mysql_query($imagequery) or die(mysql_error());

} else {
	$result = "";
}
?>
<table class="main_table" border="0" cellpadding="5" cellspacing="5" bgcolor="FFFFFF">
  <tbody>
    <tr>
      <td>
      <table style="text-align: left; width: 100%;" border="0"
 cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td style="width: 150px;" valign="top">			
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/sidebar.php"); ?>
            </td>
			<td width="1" bgcolor="000066"></td>
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="heading"><a href="/mini/en/galleries.php">Gallery</a></span>&nbsp;>&nbsp;<span class="sub_heading">View Mini</span><br></td>
				</tr>
				<tr class="text_small_dark">
					<td>Click on the smaller thumbnail images to view the image larger</td>
				</tr>
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
				<tr>
					<td width="100%">
					<?php
						if ($result) {
							if (mysql_num_rows($result)) {
								$row = mysql_fetch_assoc($result); 

								if ($row["image"]) {
									$image = $row["image"];
								} else if ($row["externalimage"]) {
									$image = $row["externalimage"];
								}

								$submissionid = $row["submissionid"];
					?>
						<table>
							<tr>
								<td colspan="2" align="center">
								
								<?php
									if ($row["image"]) {
										
										echo "<img src='/mini/images/gallery/$image' width='50%' height='100%' alt='Uploaded Mini'>";

									} else if ($row["externalimage"]) {
									
										echo "<img src='$image' width='50%' height='100%' alt='External Mini Image'>";
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
								<td class="text_head" width="20%">Description:</td>
								<td class="text_small_dark"><?php echo $row["cardesc"] ?></td>
							</tr>
							<tr>
								<td class="text_head">Category:</td>
								<td class="text_small_dark"><?php echo $row["category"] ?></td>
							</tr>
							<tr>
								<td class="text_head">Year:</td>
								<td class="text_small_dark"><?php echo $row["year"] ?></td>
							</tr>
							<?php if (isset($row["city"]) || isset($row["country"])) { ?>
								<tr>
									<td class="text_head">Posted by user from:</td>
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
											echo "<img src='/mini/images/flags/world/" . strtolower($countrycode) . ".png' title='" . $row["country"] . "' alt='Flag'>";
										}
									}
									?>
									
									<?php echo $row["city"] . ", " . $row["country"] ?></td>
								</tr>
							<?php } ?>
							<tr>
								<td class="text_head" valign="top">More Information:</td>
								<td class="text_small_dark"><?php echo stripslashes($row["moreinfo"]); ?></td>
							</tr>
						</table>
					<?php
						}
					} else { 
					?>

					
						<div align="center" width="100%" class="text_small_dark">
							Sorry, this gallery image(s) are currently unavailable. If this problem persists please contact the website administrator at <a href="mailto:info@ayrshireminis.com?Subject=Website Problem">info@ayrshireminis.com</a>
						</div>
					
					

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