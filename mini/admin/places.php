<?php	
/*
places.php
27-Oct-2007
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


$countries = mysql_query("SELECT * FROM `ayrshire_mini`.`countries` ORDER BY countryname, cityname") or die(mysql_error());

?>

	<table align="center" width="80%">
		<tr style="font-family: Verdana; font-weight: bold; color: #FFFFFF"><td>Places</td></tr>
		<tr><td><a href="/mini/admin/addplace.php" style="font: Verdana; color: #FF00FF; font-weight: bold;">Add New Place</a></td></tr>

		<?php if ($_POST["submit"]) { ?>
		<tr style="background-color: #FF0000; font-size: 8pt; font-weight: bold; font-family: Verdana; color: #000000;">
			<td colspan="4">Places Updated</td>
		</tr>
		<?php } ?>
		<tr style="font-family: Verdana; font-weight: bold; font-size: 10pt; color: #FFFFFF">
			<td nowrap>Country</td>
			<td nowrap>City</td>
			<td nowrap>Country Code</td>
			<td nowrap>Province Code</td>
			<td nowrap>Province Name</td>
		</tr>
		<form id="form" action="gallery.php" method="post">
		<?php
			if (mysql_num_rows($countries)) {
				$count = 1;
				while ($row = mysql_fetch_assoc($countries)) {
				?>
					<tr style="font-family: Verdana; font-size: 8pt; color: #FFFFFF">
						<td><?php echo $row["countryname"] ?></td>
						<td><?php echo $row["cityname"] ?></td>
						<td><?php echo $row["countrycode"] ?></td>
						<td><?php echo $row["provincecode"] ?></td>
						<td><?php echo $row["provincename"] ?></td>
					</tr>
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