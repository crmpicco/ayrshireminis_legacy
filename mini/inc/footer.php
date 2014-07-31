<?php
/*
AyrshireMinis.com
Footer table for MySQL, HTML, CSS and PHP Web Button Images
05-Oct-2007
*/

if (isset($_SESSION["lang"])) {
	// change the image titles for the German site
	if ($_SESSION["lang"] == "de") {
		// Deutsch translations of mouseover titles
		$mysql	= "Angetrieben durch MySQL";
		$php	= "Angetrieben durch PHP";
		$css	= "Diese Web site verwendet gültigen CSS";
		$html	= "Diese Web site verwendet gültigen HTML 4.01 Transitional";
	} else {
		// normal English titles
		$mysql	= "Powered by MySQL";
		$php	= "Powered by PHP";
		$css	= "This website uses Valid CSS";
		$html	= "This website uses Valid HTML 4.01 Transitional";
	}
} else {
	// normal English titles
	$mysql	= "Powered by MySQL";
	$php	= "Powered by PHP";
	$css	= "This website uses Valid CSS";
	$html	= "This website uses Valid HTML 4.01 Transitional";
}

?>
<div class="text_v_small_dark" style="width: 100%">
	Copyright &copy; 2007-<?php echo date("Y"); ?> ¦ AyrshireMinis.com ¦ Site by <a href="http://www.crmpicco.co.uk" style="text-decoration: underline;">Ballochmyle Web Solutions</a><br><br>
	<a href="#" style="text-decoration: none;">
		<img src="/mini/images/mysql.gif" alt="MySQL" title="<?php echo $mysql ?>" onMouseOver="style.cursor='pointer'" style="border-style: none;">
	</a>
	<a href="http://jigsaw.w3.org/css-validator/validator?uri=www.ayrshireminis.com/mini/inc/style.css" style="text-decoration: none;">
		<img src="/mini/images/css.png" alt="Valid CSS" title="<?php echo $css ?>" onMouseOver="style.cursor='pointer'" style="border-style: none;">
	</a>
	<a href="http://validator.w3.org/check?uri=http://<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"]; ?>"  style="text-decoration: none;">
		<img alt="Valid HTML" title="<?php echo $html ?>" src="/mini/images/html401.png" onMouseOver="style.cursor='pointer'" style="border-style: none;">
	</a>
	<a href="#" style="text-decoration: none;">
		<img alt="PHP" title="<?php echo $php ?>" src="/mini/images/php.gif" onMouseOver="style.cursor='pointer'" style="border-style: none;">
	</a>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2769290-1";
urchinTracker();
</script>