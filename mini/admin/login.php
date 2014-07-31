<?php

/*
login.php
Admin login script to access admin section
14-Oct-2007
*/

include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site'])) {
	//if there is, it logs you in and directes you to the members page

	$username = $_COOKIE['ID_my_site'];
	$pass = $_COOKIE['Key_my_site'];
	$check = mysql_query("SELECT * FROM users WHERE username = '$username'") or die(mysql_error());
	while($info = mysql_fetch_array( $check )) {
		if ($pass == $info['password']) {
			header("Location: menu.php");
		}
	}
}

//if the login form is submitted
if (isset($_POST['submit'])) { // if form has been submitted

	// makes sure they filled it in
	if(!$_POST['username'] | !$_POST['pass']) {
		header("Location: login.php?nofield=1");
	}
	// checks it against the database

	if (!get_magic_quotes_gpc()) {
		$_POST['email'] = addslashes($_POST['email']);
	}
	$check = mysql_query("SELECT * FROM users WHERE username = '" . mysql_escape_string($_POST['username']) . "'")or die(mysql_error());

	//Gives error if user dosen't exist
	$check2 = mysql_num_rows($check);
	if ($check2 == 0) {
		header("Location: login.php?nouser=1");
	}
	while($info = mysql_fetch_array( $check )) {

		$_POST['pass'] = stripslashes($_POST['pass']);
		$info['password'] = stripslashes($info['password']);
		
		//gives error if the password is wrong
		if ($_POST['pass'] != $info['password']) {
			header("Location: login.php?error=1");
		} else {

			// if login is ok then we add a cookie
			$_POST['username'] = stripslashes($_POST['username']);
			$hour = time() + 3600;
			setcookie(ID_my_site, $_POST['username'], $hour);
			setcookie(Key_my_site, $_POST['pass'], $hour);

			// then redirect them to the members area
			header("Location: menu.php");
		}
	}
} else {

// if they are not logged in
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
?>
<form id="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<br>
<table border="0" align="center">
<tr style="font-family: Verdana; color: #FFFFFF;"><td colspan=2><h3>Login</h3></td></tr>
<tr style="font-family: Verdana; font-size: 10pt; color: #FFFFFF;"><td>Username:</td><td>
<input type="text" name="username" id="username" maxlength="40">
</td></tr>
<tr style="font-family: Verdana; font-size: 10pt; color: #FFFFFF;"><td>Password:</td><td>
<input type="password" name="pass" maxlength="50">
</td></tr>
<tr><td colspan="2" align="right">
<input type="submit" name="submit" id="submit" value="Login">
</td></tr>
<?php if ($_GET["error"]) { ?>
<script language="JavaScript" type="text/javascript">
<!--
document.getElementById("username").focus();
-->
</script>
<tr style="background-color: #FFFFFF; font-family: Verdana; font-size: 8pt; color: #FF0000;">
	<td colspan="2">Incorrect password, please try again.</td>
</tr>
<?php } ?>


<?php if ($_GET["nouser"]) { ?>
<script language="JavaScript" type="text/javascript">
<!--
document.getElementById("username").focus();
-->
</script>
<tr style="background-color: #FFFFFF; font-family: Verdana; font-size: 8pt; color: #FF0000;">
	<td colspan="2">There is no user under this name.</td>
</tr>
<?php } ?>

<?php if ($_GET["nofield"]) { ?>
<script language="JavaScript" type="text/javascript">
<!--
document.getElementById("username").focus();
-->
</script>
<tr style="background-color: #FFFFFF; font-family: Verdana; font-size: 8pt; color: #FF0000;">
	<td colspan="2">You did not fill in a required field.</td>
</tr>
<?php } ?>

</table>
</form>
</BODY>
</html>
<?php
}

?>