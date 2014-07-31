<?php 
/*
forum.php
page with iframe of PHPBB2 fprum software
27-Oct-2007
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/style.css");
?>
<html>
<frameset rows="25%,75%" frameborder="0">
  <frame src="/mini/inc/header.php">
  <frame src="/mini/phpBB2/index.php">
</frameset>
</html>