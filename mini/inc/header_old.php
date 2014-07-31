<?php 
/*
header.php
header file used on every page, has buttons to all main pages
03-Nov-2007
*/

// Temp Disable Site
//if ($_SERVER["REMOTE_ADDR"] != "81.107.214.225") {
//	die("<font color=white><h1>AyrshireMinis.com</h1></font>");
//}

$today = date("Y-m-d"); // 03.10.01

?>

<table style="width: 100%; background-color: #FFFFFF;" border="0" cellpadding="0" cellspacing="0">
 <tr>
      <td width="100%" height="100" valign="top">
		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td class="menu_banner">
					<img height="100" width="750" src="/mini/images/banner5.jpg" border="0" alt="AyrshireMinis.com Site Banner" onClick="location.href='http://www.ayrshireminis.com'">
				</td>
				<td align="right" class="menu_lang">
					<table width="90%" align="right">
						<tr>
							<td width="20%">&nbsp;</td>
							<td align="right" width="7%">
								<img src="/mini/images/flag_en.gif" border="1" width="25" height="15" onMouseOver="style.cursor='pointer'" title="<?php if ($_SESSION["lang"] == "de") { echo "Englisch"; } else { echo "English";} ?>" onClick="location.href='/mini/index.php?lang=en'" alt="EN">
							</td>
							<td align="right" width="7%">
								<img src="/mini/images/flag_de.gif" border="1" width="25" height="15" onMouseOver="style.cursor='pointer'" title="Deutsch" onClick="location.href='/mini/index.php?lang=de'" alt="DE">
							</td>
							<td align="right" width="40%" valign="bottom">
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
				</td>
			</tr>
		</table>
      </tr>
</table>

<table class="menu">

<?php
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
	<tr>			
		<td class="menu_item" onMouseOver="this.className='menu_item_alt'; style.cursor='pointer'" onMouseOut="this.className='menu_item';" onClick="location.href='<?php echo $homepage; ?>'">Home</td>
		<td class="menu_item" onMouseOver="this.className='menu_item_alt'; style.cursor='pointer'" onMouseOut="this.className='menu_item';" onClick="location.href='/mini/<?php echo $dir; ?>/forum.php'">Forum</td>
		<td class="menu_item" onMouseOver="this.className='menu_item_alt'; style.cursor='pointer'" onMouseOut="this.className='menu_item';" onClick="location.href='/mini/<?php echo $dir; ?>/galleries.php'">
		<?php 
			if (isset($_SESSION["lang"])) {
				if ($_SESSION["lang"] == "de" || $_SESSION["lang"] == "DE") { 
					echo "Galerien";
				} else { 
					echo "Galleries";
				} 
			} else {
				echo "Galleries";
			}
		?></td>
		<td class="menu_item" onMouseOver="this.className='menu_item_alt'; style.cursor='pointer'" onMouseOut="this.className='menu_item';" onClick="location.href='/mini/<?php echo $dir; ?>/contact.php'">
		<?php
			if (isset($_SESSION["lang"])) {
				if ($_SESSION["lang"] == "de" || $_SESSION["lang"] == "DE") { 
					echo "Kontakt";
				} else { 
					echo "Contact";
				} 
			} else {
				echo "Contact";
			}
		?></td>
		<td class="menu_item" onMouseOver="this.className='menu_item_alt'; style.cursor='pointer'" onMouseOut="this.className='menu_item';" onClick="location.href='/mini/<?php echo $dir; ?>/links.php'"><?php 
			if (isset($_SESSION["lang"])) {
				if ($_SESSION["lang"] == "de" || $_SESSION["lang"] == "DE") { 
					echo "Netz-Verbindungen";
				} else { 
					echo "Links";
				} 
			} else {
				echo "Links";
			}
		?></td>	
	</tr>
</table>