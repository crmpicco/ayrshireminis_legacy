<?php 
/*
header.php
header file used on every page, has buttons to all main pages
03-Nov-2007
*/
date_default_timezone_set('Europe/London');
// Temp Disable Site
//if ($_SERVER["REMOTE_ADDR"] != "81.107.214.225") {
//	die("<font color=white><h1>AyrshireMinis.com</h1></font>");
//}

$today = date("Y-m-d"); // 03.10.01
// which directory to go to...
if (isset($_SESSION["lang"])) {
	if ($_SESSION["lang"] == "DE" || $_SESSION["lang"] == "de") {
		$dir = "de";
		$homepage = "/mini/de/index.php";
	} else {
		$dir = "en";
		$homepage = "/mini/index.php";
	}
} else {
	$dir = "en";
	$homepage = "/mini/index.php";
}
?>
<div align="center">
	<img src="/mini/images/ambanner.jpg" height="70" border="0" alt="AyrshireMinis.com Site Banner" onClick="location.href='http://www.ayrshireminis.com<?php $goto = ($dir == "de") ? $homepage . "?lang=DE" : ""; echo $goto; ?>'">
</div>
<div style="position: absolute; width: 300px; top: 0; right: 0">
<table width="90%" align="right">
	<tr>
		<td align="right" style="vertical-align: bottom;">
					<img src="/mini/images/flag_en.gif" border="1" width="25" height="15" onMouseOver="style.cursor='pointer'" title="<?php if (isset($_SESSION["lang"]) == "de") { echo "Englisch"; } else { echo "English";} ?>" onClick="location.href='/'" alt="EN">
			<img src="/mini/images/flag_de.gif" border="1" width="25" height="15" onMouseOver="style.cursor='pointer'" title="Deutsch" onClick="location.href='/mini/index.php?lang=de'" alt="DE">
							<?php
							if (isset($_SESSION["lang"])) {
								if ($_SESSION["lang"] == "de") {
									$selected = "selected";
								} else {
									$selected = "";
								}
							} else {
								$selected = "";	
							}

							?>

								<select name="lang" id="lang" onChange="langredirect(this.value);" class="select_small">
									<option value="EN">English</option>
									<option value="DE" <?php echo $selected; ?>>Deutsch</option>
								</select>&nbsp;
							</td>
	</tr>
	<tr>
		<td colspan="4" class="text_small_dark" align="right"><?php echo strftime('%A, %d. %B %Y') ?>&nbsp;</td>
	</tr>
</table>
</div>
<br>
<div id="main">
<ul id="tabs">
	<li <?php if (gettab($_SERVER["SCRIPT_NAME"]) == "Home") { echo "class='on'"; } ?>><a href="/"><span style="font-size: 9pt;">Home</span></a></li>
	<li <?php if (gettab($_SERVER["SCRIPT_NAME"]) == "Forum") { echo "class='on'"; } ?>><a href="/mini/phpBB2/index.php"><span style="font-size: 9pt;">Forum</span></a></li>
	<li <?php if (gettab($_SERVER["SCRIPT_NAME"]) == "Galleries") { echo "class='on'"; } ?>><a href="/mini/<?php echo $dir; ?>/galleries.php"><span style="font-size: 9pt;"><?php $gallerytxt = ($dir == "de") ? "Galerien" : "Galleries"; echo $gallerytxt; ?></span></a></li>
	<li <?php if (gettab($_SERVER["SCRIPT_NAME"]) == "Contact") { echo "class='on'"; } ?>><a href="/mini/<?php echo $dir; ?>/contact.php"><span style="font-size: 9pt;"><?php $gallerytxt = ($dir == "de") ? "Kontakt" : "Contact"; echo $gallerytxt; ?></span></a></li>
	<li <?php if (gettab($_SERVER["SCRIPT_NAME"]) == "Links") { echo "class='on'"; } ?>><a href="/mini/<?php echo $dir; ?>/links.php"><span style="font-size: 9pt;">Links</span></a></li>
</ul>
</div>
<br>