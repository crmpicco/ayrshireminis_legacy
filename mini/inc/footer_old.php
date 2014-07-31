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
<div class="text_v_small" style="width: 100%">
	Copyright &copy; 2007 ¦ AyrshireMinis.com ¦ <a href="mailto:info@ayrshireminis.com?Subject=Message from AyrshireMinis.com" style="color: #FFFFFF; text-decoration: underline;">CRMPicco</a><br>
	<a href="#">
		<img src="/mini/images/mysql.gif" alt="MySQL" title="<?php echo $mysql ?>" onMouseOver="style.cursor='pointer'">
	</a>
	<a href="http://jigsaw.w3.org/css-validator/validator?uri=www.ayrshireminis.com/mini/inc/style.css">
		<img src="/mini/images/css.png" alt="Valid CSS" title="<?php echo $css ?>" onMouseOver="style.cursor='pointer'">
	</a>
	<a href="http://validator.w3.org/check?uri=http://www.<?php echo $_SERVER["SERVER_NAME"] . $_SERVER["PHP_SELF"]; ?>">
		<img alt="Valid HTML" title="<?php echo $html ?>" src="/mini/images/html401.png" onMouseOver="style.cursor='pointer'">
	</a>
	<a href="#">
		<img alt="PHP" title="<?php echo $php ?>" src="/mini/images/php.gif" onMouseOver="style.cursor='pointer'">
	</a>
</div>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript"></script>
<script type="text/javascript">
_uacct = "UA-2769290-1";
urchinTracker();
</script>