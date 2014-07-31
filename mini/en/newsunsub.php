<?php 
/*
newsunsub.php
Unsubscription form for users wishing to be removed from the AM mailing list
16-Mar-2008
*/
include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/dbconn.php");

// full error reporting on
error_reporting(E_ALL);

if (isset($_GET["lang"])) {
	$lang = $_GET["lang"];
}

if (isset($_POST["email"])) {
	$email = mysql_real_escape_string($_POST["email"]);
}

if (isset($_POST["process"])) {
	$process	= mysql_real_escape_string($_POST["process"]);
} else {
	$process	= "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
<META NAME="KEYWORDS" CONTENT="mini, cooper, rover, clubman, british leyland, austin, bmw, ayrshire minis, ayrshire mini, ayrshire, ayr, mauchline, kilmarnock, chat, forum, gallery, german, english, germany, new mini, mini cooper, contact us, links">
<META NAME="DESCRIPTION" CONTENT="a place for Mini enthusiasts to meet and discuss about all things Mini">
<TITLE>Ayrshire Minis - Newsletter Unsubscription</TITLE>
<META HTTP-EQUIV="CONTENT-LANGUAGE" CONTENT="EN">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=ISO-8859-1">
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
?>
<table align="center" style="width: 80%; background-color: #FFFFFF; *margin-top: -11px;" bgcolor="FFFFFF">
<tbody>
    <tr>
      <td>
      <table style="text-align: left; width: 100%;" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td valign="top">

<table border="0" cellpadding="1" cellspacing="0" width="100%" id="main-box">
	<tr>
		<td width="100%" valign="top">
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<td><span class="heading"><a href="/mini/en/newsunsub.php">Newsletter</a></span>&nbsp;>&nbsp;<span class="sub_heading">Unsubscribe</span><br>

						<span class="text_small_dark">If you would like to be removed from the Ayrshire Minis Email Newsletter then please enter your email address below and you will receive no more</span><br>
						<span class="text_small_dark">If there is anything that you would like to add or tell us why you wish to leave you can let us know by clicking.... <a href="/mini/en/contact.php"><b>Here</b></a>.</span><br>
						<br>
						<div class="question">
							<?php if ($process != "unsub") { ?>
								<form id="unsub" method="post" action="newsunsub.php" enctype="multipart/form-data" onsubmit="return unsubscribe();">
									<table style="border: 2px solid #000;" width="80%" align="center">
										<tr>
											<td colspan="2" class="text_v_small_dark" align="center"><span class="required">*</span>&nbsp;Donates Mandatory Fields</td>
										</tr>
										<tr>
											<td class="text_head" width="30%" align="right">Email Address&nbsp;<span class="required">*</span></td>
											<td width="70%"><input type="text" name="email" id="email" size="45" class="textbox"></td>
										</tr>							
										<tr>
											<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Remove Me" onMouseOver="style.cursor='pointer'" title="Send Message to Us!"></td>
										</tr>
									</table>
									<input type="hidden" name="process" id="process" value="unsub">
								</form>
							<?php } else { 
								# remove the user from the mailing list
								
								# check that the user exists first.....
								$user = mysql_query("SELECT id FROM `ayrshire_mini`.`newsletter` WHERE email = '" . $email . "'") or die(mysql_error());
								
								if (mysql_num_rows($user)) {
									mysql_query("UPDATE `ayrshire_mini`.`newsletter` SET unsubscribed = '1', lefton = now() WHERE email = '" . $email . "'") or die(mysql_error()); 
								?>
								<table>
									<tr class="text_small_dark">
										<td>The email address - <?php echo $email; ?> - has been successfully removed from the Ayrshire Minis newsletter list</td>
									</tr>
									<tr class="text_small_dark">
										<td>Sorry to see you go.......</td>
									</tr>
								</table>
								<?php } else { ?>
								<table>
									<tr class="text_small_dark">
										<td>The email address you entered - <?php echo $email; ?> - does not exist in the system and has not been removed from the Ayrshire Minis newsletter list</td>
									</tr>
								</table>
								<?php } ?>
							<?php } ?>
						</div>
						<table align="center">
							<tr>
									<td align="center">
										<table align="center">
											<tr>
												<td>
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
										</table>
									</td>
							</tr>
						</table>
						
							<br><br>
					</td>

				</tr>
			</table>
		</td>
	</tr>
</table>
                                                   </td>
          </tr>
        </tbody>
      </table>

      </td>
    </tr>
</tbody>
</table>
<div align="center">
	<?php include($_SERVER["DOCUMENT_ROOT"] . "/mini/inc/footer.php") ?>
</div>
</BODY>
</HTML>