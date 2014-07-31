<?php	
/*
gallery.php
Admin gallery section to view images uploaded to site,
can switch off/on if flagged as inappropriate
15-Oct-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Admin: AyrshireMinis.com</TITLE>
<script language="JavaScript" type="text/javascript" src="/mini/js/general.js"></script>
<link rel="stylesheet" type="text/css" href="/mini/inc/style.css">
<link rel="shortcut icon" href="/favicon.ico">
</HEAD>
<BODY>
<?php
include($_SERVER["DOCUMENT_ROOT"] . "/mini/admin/header.php");


// the form has been submitted
if ($_POST["submit"]) {

	// set the image to not authenticated
	
	for ($i = 1; $i <= $_POST["totalimages"]; $i += 1) {

		//echo "<font color=white>";
		//echo "UPDATE IMAGES<br>";
		//echo "AUTH: " . $_POST["auth$i"] . "<br>";
		//echo "AUTH: " . $_POST["auth".$i] . "<br>";
		//echo "IMAGE ID: " . $_POST["image$i"] . "<br>";
		//echo "</font>";

		if ($_POST["auth$i"] && $_POST["image$i"]) {
		
			// if the image has been sent to be turned off the website
			if ($_POST["auth$i"] == "N") {
				//echo "<font color=white>";
				//echo "UPDATE `crmpicco_mini`.`gallery` SET authenticated = 'N' WHERE id = '" . mysql_escape_string($_POST["image$i"]) . "'<br>"; 
				//echo "</font>";

				$updateauth = mysql_query("UPDATE `crmpicco_mini`.`gallery` SET authenticated = 'N' WHERE id = '" . mysql_escape_string($_POST["image$i"]) . "'") or die(mysql_error());
				mysql_free_result($updateauth);
			}
			
		}
	
	}

}

$gallery = mysql_query("SELECT * FROM `crmpicco_mini`.`gallery` ORDER BY flagged DESC") or die("MySQL Error: Selecting from gallery");

?>

	<table align="center" width="80%">
		<tr style="font-family: Verdana; font-weight: bold; color: #FFFFFF"><td>Images</td></tr>
		<?php if ($_POST["submit"]) { ?>
		<tr style="background-color: #FF0000; font-size: 8pt; font-weight: bold; font-family: Verdana; color: #000000;">
			<td colspan="4">Image Permissions Updated</td>
		</tr>
		<?php } ?>
		<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #FFFFFF">
			<td>&nbsp;</td>
			<td>Description</td>
			<td align="center">Flagged</td>
			<td align="center">Authenticated</td>
		</tr>
		<form id="form" action="gallery.php" method="post">
		<?php
			if (mysql_num_rows($gallery)) {
				$count = 1;
				while ($row = mysql_fetch_assoc($gallery)) {
				?>
					<tr style="font-family: Verdana; font-size: 8pt; color: #FFFFFF">
						<td>
						<?php
							if ($row["image"]) {
						?>
							<img src="/mini/images/<?php echo $row["image"] ?>" width="40" height="40">
						<?php } else if ($row["externalimage"]) { ?>
							<img src="<?php echo $row["externalimage"] ?>" width="40" height="40">
						<?php } ?>
						</td>
						<td><?php echo $row["cardesc"] ?></td>
						<td align="center"><?php echo $row["flagged"] ?></td>
						<td align="center">
						<?php echo $row["authenticated"] ?>
							<select name="auth<?php echo $count ?>" id="auth<?php echo $count ?>" class="select">
								<option <?php if ($row["authenticated"] == "Y") { ?> selected <?php } ?>>Y</option>
								<option <?php if ($row["authenticated"] == "N") { ?> selected <?php } ?>>N</option>
							</select>
						</td>
					</tr>
					<input type="hidden" name="image<?php echo $count ?>" id="image<?php echo $count?>" value="<?php echo $row["id"] ?>">
				<?php
					$count++;
				} ?>
				<input type="hidden" name="totalimages" id="totalimages" value="<?php echo $count ?>">
				<?php
			}
		?>
		<tr><td align="center" colspan="4" style="background-color: #00EE00;"><input type="submit" name="submit" id="submit" value="Save Changes" onMouseOver="style.cursor='pointer'"></td></tr>
		</form>
	</table>
</BODY>
</HTML>