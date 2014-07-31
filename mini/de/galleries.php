<?php 
/*
galleries.php
Gallery that displays the images that have been uploaded to the site
13-Oct-2007
[Deutsch Version]
*/

include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);

session_start();
//echo "<font color=white>SESSION -> " . $_SESSION["lang"] . "</font><br>";

if (isset($_GET["lang"])) {
	$lang		= $_GET["lang"];	
}
if (isset($_GET["badimage"])) {
	$badimage	= $_GET["badimage"];
}
if (isset($_GET["page"])) {
	$page		= $_GET["page"];
}

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
<TITLE>Ayrshire Minis - Galerien für die Classic Minis und New Minis</TITLE>
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

// submitted form fields from Gallery search
if (isset($_POST["category"])) {
	$category	= escape_data($_POST["category"]);
} else {
	$category	= "";
}
if (isset($_POST["year"])) {
	$year		= escape_data($_POST["year"]);
} else {
	$year		= "";
}

// if an image has been flagged up and inappropriate
if (isset($badimage)) {
	// update the database and 
	badimage($badimage);
}

if (isset($_SESSION["lang"])) {
	$dir = ($_SESSION["lang"] == "de" ? "de" : "en");
} else {
	$dir = "en";
}

$foundimage = false;
?>
<table align="center" style="width: 80%; background-color: #FFFFFF; *margin-top: -11px;" bgcolor="FFFFFF">
  <tbody>
    <tr>
      <td>
      <table class="sec_table" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%" id="main-box">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td class="heading"><a href="/mini/de/galleries.php">Galerie</a></td>
				</tr>
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
				<tr>
					<td align="center">
						<img src="/mini/images/addmini_de.jpg" alt="Mini hinzufügen" title="Mini hinzufügen" onClick="location.href='/mini/de/addmini.php'" onMouseOver="style.cursor='pointer'">
					</td>
				</tr>
				<tr>
					<td class="text_small_dark">Eine Galerie für Rover, Austin und BMW Minis, von Euch hochgeladen. Wenn Ihr einen Mini oder MINI seht, dann ladet das Bild hier hoch, um es mit anderen zu teilen. Wenn Ihr ein Bild seht, das Ihr für ungeeignet haltet, dann klickt bitte auf das "Warnung"-Symbol neben dem Foto, um es uns anzuzeigen.</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<table>
							<tr>	
								<td align="center">
									<span class="heading" style="font-size: 13pt">Suche nach Mini in der Galerie:&nbsp;</span><br>
										<form id="form" action="/mini/de/galleries.php" method="post">
											<select name="category" id="category" class="select" onChange="changeyear(this.value);">
												<option value="Any" selected>Any</option>
												<option value="Classic Mini (Mini)" <?php if ($category == "Classic Mini (Mini)") { ?> selected <?php } ?>>Classic Mini (Mini)</option>
												<option value="New Mini (MINI)" <?php if ($category == "New Mini (MINI)") { ?> selected <?php } ?>>New Mini (MINI)</option>
											</select>
											<select name="year" id="year" class="select">
												<option value="Any">Any</option>
											<?php 
												for ($i = date("Y"); $i >= 1959; $i = $i-1) {

													if ($year == $i) {
														$selected = "selected";
													} else {
														$selected = "";
													}

													echo "<option value='" . $i . "' $selected>$i</option>";
												}
											?>
											</select>					
											<input type="submit" name="search" id="search" value="Go!" class="text_small_dark" onMouseOver="style.cursor='pointer'">
										</form>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<?php 
					// if an image has been flagged up as inappropriate then show the message
					if (isset($badimage)) { ?>

				<table align="center" width="95%" style="border: 1px solid #000000; background-color: #FF0000;">
					<tr>
						<td class="text_medium" nowrap align="center">Das Bild, das Sie berichtet wurde gekennzeichnet als unangemessen und wird entfernt von der Website, wenn notwendig erachteten</td>
					</tr>
				</table>
				<br>
				<?php } ?>

				<tr>
					<td align="center">
<?php 

$allsubmissions = mysql_query("SELECT DISTINCT(submissionid) FROM `ayrshire_mini`.`gallery_submissions` ORDER BY id DESC") or die(mysql_error());
$totalimages = 0;

?>
<?php
	$shownimage = 0;
	if (mysql_num_rows($allsubmissions)) {
		while ($row = mysql_fetch_assoc($allsubmissions)) {

			if ($category == "Any" || $year == "Any") {

				// Any Category and Specified Year
				if ($category == "Any" && $year != "Any") {
					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND year = '$year' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";

				// Any Year and Specified Year
				} else if ($category != "Any" && $year == "Any") {

					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND category = '$category' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";

				// Any Year and Any Category
				} else if ($category == "Any" && $year == "Any") {

					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";
				}


			} else {
				if ($category != "" && $year != "") {
					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND category = '$category' AND year = '$year' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";
				} else if ($category != "" && $year == "") {
					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND category = '$category' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";
				} else if ($category == "" && $year != "") {
					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND year = '$year' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";
				} else {
					$thequery = "SELECT id, cardesc, category, image, year, externalimage FROM `ayrshire_mini`.`gallery` WHERE submissionid = '$row[submissionid]' AND (authenticated IS NULL OR authenticated = 'Y') ORDER BY ID DESC";
				}
			}

			//echo "thequery: " . $thequery . "<br>";
			
			$results = mysql_query($thequery) or die(mysql_error());
			if (mysql_num_rows($results)) {
				while ($resultrow = mysql_fetch_assoc($results)) {

				$image = $resultrow["image"];
				$extimage = $resultrow["externalimage"];
				$imageid = $resultrow["id"];
				$imagename = "";

				if (!$image) {
					$imagename = $extimage;
				} else {
					$imagename = $image;	
				}

				$foundimage = true;
				$shownimage++;

				$page = isset($page) ? intval($page) : 1;
				$per_page = 10;

				$minimum = $per_page * ($page-1);
				$maximum = $per_page * $page;
				
				if ($shownimage <= $maximum) {

					if ($shownimage >= $minimum) {
?>
<div class="question">
<table class="gallery_table" cellspacing="1" cellpadding="1">
	<tr>
		<td align="left" width="30%"><?php 
			if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/mini/images/gallery/$imagename")) { 
				echo "<img src='/mini/images/gallery/$imagename' width='130' height='100' border='1' alt='Mini' onMouseOver=\"style.cursor='pointer'\" title='Sehen Sie größeres Bild' onClick='window.open(\"/mini/de/viewmini.php?id=$imageid\",\"Mini\",\"menubar=1,resizable=1,width=750,height=550\");'>";
			} else if ($extimage){ 
				echo "<img src='$imagename' width='130' height='100' border='1' alt='Mini' onMouseOver=\"style.cursor='pointer'\" title='Sehen Sie größeres Bild' onClick='window.open(\"/mini/de/viewmini.php?id=$imageid\",\"Mini\",\"menubar=1,resizable=1,width=750,height=550\");'>";
			} else {
				echo "<img src='/mini/inc/errorimg.php' width='130' height='100' title='Kein Bild verfügbar' onMouseOver=\"style.cursor='pointer'\" alt='Kein Bild verfügbar'>";
			} ?></td>
		<td align="left">
			<div class="gallery_heading"><span onClick="location.href='/mini/de/gallerymini.php?id=<?php echo $imageid ?>'" onMouseOver="style.cursor='pointer'"><?php 
			// when the description is too long trim it down a bit
			if (strlen($resultrow["cardesc"]) > 40) {	
				echo substr($resultrow["cardesc"], 0, 37) . " ...";
			} else {
				echo $resultrow["cardesc"];
			} ?></span></div>
			<div class="gallery_sub_heading"><?php echo $resultrow["category"] ?></div>
			<div class="gallery_sub_heading"><?php echo $resultrow["year"] ?></div>
			<div align="right"><img src="/mini/images/warn.png" width="20px" height="20px" alt="Flag Image" title="Bericht Bild als unangemessen" onMouseOver="style.cursor='pointer'" onClick="location.href='/mini/de/galleries.php?badimage=<?php echo $imageid ?>'">&nbsp;</div>
		</td>
	</tr>
</table>
</div>
<br>
		<?php		}
				} 
		?>

<?php 
					$totalimages++;
					// only show one gallery element per submission
					break;
				}
			}
		}
	} 
	mysql_free_result($allsubmissions);
?>

	<?php if (!$foundimage) { ?>

	<tr>
		<td class="text_small_dark">Es tut uns leid, es gibt noch keine Minis hochgeladen auf der Website für die Kriterien, die Sie eingegeben haben. <br> Versuchen Sie es mit einem anderen Kategorie oder Registrierung Jahr in der Dropdownliste Tiefen vor und klicken Sie auf 'Go!'....</td>
	</tr>

<?php
	} else {
?>

	<tr>
		<td class="text_medium_dark">
<?php

// Database Connection
//include 'db.php';

// If current page number, use it
// if not, set one!

if(!isset($_GET['page'])){
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Define the number of results per page
$max_results = 10;

// Figure out the limit for the query based
// on the current page number.
$from = (($page * $max_results) - $max_results); 

// Perform MySQL query on only the current page number's results

//$sql = mysql_query("SELECT * FROM pages LIMIT $from, $max_results");

//while($row = mysql_fetch_array($sql)){
    // Build your formatted results here.
    //echo $row['title']."<br />";
//}

// Figure out the total number of results in DB:
//$total_results = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM pages"),0);

//$total_results = 27;

// Figure out the total number of pages. Always round up using ceil()
$total_pages = ceil($totalimages / $max_results);

// Build Page Number Hyperlinks
echo "<center>";

echo "<span style='font: Verdana; font-weight: bold; font-size: 12pt;'>Seite</span><br>";


// Build Previous Link
if($page > 1){
    $prev = ($page - 1);
    echo "<span style='font: Verdana; font-weight: bold; font-size: 11pt;'><a href=\"".$_SERVER['PHP_SELF']."?page=$prev\"> << Vorherige&nbsp;</a></span>";
}

for($i = 1; $i <= $total_pages; $i++){
    if(($page) == $i){
        echo "<span style='font: Verdana: font-weight: bold; font-size: 11pt;'><b><u>$i</u></b>&nbsp;</span>";
        } else {
            echo "<span style='font: Verdana; font-weight: bold; font-size: 11pt;'><a href=\"".$_SERVER['PHP_SELF']."?page=$i\">$i&nbsp;</a></span>";
    }
}

// Build Next Link
if($page < $total_pages){
    $next = ($page + 1);
	echo "<span style='font: Verdana; font-weight: bold; font-size: 11pt;'><a href=\"".$_SERVER['PHP_SELF']."?page=$next\">Weiter >></a></span>";
}
echo "</center>";
?>
		</td>
	</tr>
<?php
	}
?>

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