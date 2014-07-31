<?php	
/*
addplaces.php
add a new place into the database to get it listed in the drop down
on the add mini and contact page
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

// the form has been submitted
if ($_POST["submit"]) {

	// add a new place into the countries table

	if ($_POST["capital"] == "on") {
		$capital = "1";
	}
	
	$newplace = mysql_query("INSERT INTO `ayrshire_mini`.`countries` (capital, countryname, countrycode, cityname, provincename, provincecode, Geog_loc) VALUES ('" . $capital . "', '" . $_POST["country"] . "', '" . $_POST["countrycode"] . "', '" . $_POST["city"] . "', '" . $_POST["province"] . "', '" . $_POST["provincecode"] . "', '" . $_POST["geog_loc"] . "')") or die(mysql_error());

}

?>

	<table align="center" width="80%">
		<tr style="font-family: Verdana; font-weight: bold; color: #FFFFFF"><td>Places</td></tr>
		<tr><td><a href="/mini/admin/addplace.php" style="font: Verdana; color: #FF00FF; font-weight: bold;">Add New Place</a></td></tr>
		
		<?php if ($_POST["submit"]) { ?>
		<tr style="background-color: #FF0000; font-size: 8pt; font-weight: bold; font-family: Verdana; color: #000000;">
			<td colspan="4">New Place Added</td>
		</tr>
		<?php } ?>

		<form id="form" action="addplace.php" method="post">
	
			<table align="center">
				<tr>
					<td class="text_medium">Country</td>
					<td>
						<select name="country" id="country" class="select">
						<?php
						
						$countries = mysql_query("SELECT DISTINCT(countryname) FROM `ayrshire_mini`.`countries` ORDER BY countryname") or die(mysql_error());
						if (mysql_num_rows($countries)) {

							while ($crow = mysql_fetch_assoc($countries)) {
		
								if ($crow["countryname"] == "United Kingdom") {
									$selected = "selected";
								} else {
									$selected = "";
								}
								echo "<option value='" . $crow["countryname"] . "' $selected>" . $crow["countryname"] . "</option>";
							}
						}
						mysql_free_result($countries);
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="text_medium">Country Code</td>
					<td>
						<select name="countrycode" id="countrycode" class="select">
							<option></option>
						<?php
						
						$countrycodes = mysql_query("SELECT DISTINCT(countrycode) FROM `ayrshire_mini`.`countries` ORDER BY countrycode") or die(mysql_error());
						if (mysql_num_rows($countrycodes)) {

							while ($countryrow = mysql_fetch_assoc($countrycodes)) {
		
								if ($countryrow["countrycode"] == "Scotland") {
									$selected = "selected";
								} else {
									$selected = "";
								}
								echo "<option value='" . $countryrow["countrycode"] . "' $selected>" . $countryrow["countrycode"] . "</option>";
							}
						}
						mysql_free_result($countrycodes);
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="text_medium">City</td>
					<td>
						<input type="text" name="city" id="city" class="text_medium_dark" size="50">
					</td>
				</tr>
				<tr>
					<td class="text_medium">Province Name</td>
					<td>
						<select name="province" id="province" class="select">
							<option></option>
						<?php
						
						$provinces = mysql_query("SELECT DISTINCT(provincename) FROM `ayrshire_mini`.`countries` ORDER BY provincename") or die(mysql_error());
						if (mysql_num_rows($provinces)) {

							while ($prow = mysql_fetch_assoc($provinces)) {
		
								if ($prow["provincename"] == "Scotland") {
									$selected = "selected";
								} else {
									$selected = "";
								}
								echo "<option value='" . $prow["provincename"] . "' $selected>" . $prow["provincename"] . "</option>";
							}
						}
						mysql_free_result($provinces);
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="text_medium">Province Code</td>
					<td>
						<select name="provincecode" id="provincecode" class="select">
							<option></option>
						<?php
						
						$provincecodes = mysql_query("SELECT DISTINCT(provincecode) FROM `ayrshire_mini`.`countries` ORDER BY provincecode") or die(mysql_error());
						if (mysql_num_rows($provincecodes)) {

							while ($pcoderow = mysql_fetch_assoc($provincecodes)) {
		
								if ($pcoderow["provincecode"] == "Scotland") {
									$selected = "selected";
								} else {
									$selected = "";
								}
								echo "<option value='" . $pcoderow["provincecode"] . "' $selected>" . $pcoderow["provincecode"] . "</option>";
							}
						}
						mysql_free_result($provincecodes);
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="text_medium">Geographical Location</td>
					<td>
						<select name="geog_loc" id="geog_loc" class="select">
						<?php
						
						$geogloc = mysql_query("SELECT DISTINCT(Geog_loc) FROM `ayrshire_mini`.`countries` ORDER BY Geog_loc") or die(mysql_error());
						if (mysql_num_rows($geogloc)) {

							while ($grow = mysql_fetch_assoc($geogloc)) {
		
								if ($grow["Geog_loc"] == "European Union") {
									$selected = "selected";
								} else {
									$selected = "";
								}

								echo "<option value='" . $grow["Geog_loc"] . "' $selected>" . $grow["Geog_loc"] . "</option>";
							}
						}
						mysql_free_result($geogloc);
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="text_medium">Capital</td>
					<td>
						<input type="checkbox" name="capital" id="capital">
					</td>
				</tr>
				<tr><td align="center" colspan="2" style="background-color: #00EE00;"><input type="submit" name="submit" id="submit" value="Save Changes" onMouseOver="style.cursor='pointer'"></td></tr>
			</table>
			
		</form>
	</table>
</BODY>
</HTML>