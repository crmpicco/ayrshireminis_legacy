<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="{S_CONTENT_DIRECTION}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset={S_CONTENT_ENCODING}">
<meta http-equiv="Content-Style-Type" content="text/css">
{META}
{NAV_LINKS}
<title>{SITENAME} :: {PAGE_TITLE}</title>
<link rel="stylesheet" href="templates/czar_green/{T_HEAD_STYLESHEET}" type="text/css" />

<!-- BEGIN switch_enable_pm_popup -->
<script language="Javascript" type="text/javascript">
<!--
	if ( {PRIVATE_MESSAGE_NEW_FLAG} )
	{
		window.open('{U_PRIVATEMSGS_POPUP}', '_phpbbprivmsg', 'HEIGHT=225,resizable=yes,WIDTH=400');;
	}
//-->
</script>
<!-- END switch_enable_pm_popup -->
<!-- SMR_RESIZE_MOD:START -->
<script language="javascript" type="text/javascript" src="templates/SMRcode.js"></script>
<!-- SMR_RESIZE_MOD:END -->
</head>
<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">

<a name="top"></a>

<table class="bodyline" width="765" cellspacing="0" cellpadding="0" border="0" align="center"> 
	<tr> 
		<td class="header"><a href="{U_INDEX}"><img src="images/spacer.gif" alt="logo" class="logo" /></a>
		<!-- BEGIN switch_user_logged_in -->
		<div class="member"><a href="{U_PROFILE}">{L_PROFILE}</a> | <a href="{U_LOGIN_LOGOUT}">{L_LOGIN_LOGOUT}</a>&nbsp;</div>
		<!-- END switch_user_logged_in -->
		<!-- BEGIN switch_user_logged_out -->
		<form method="post" action="{S_LOGIN_ACTION}" class="member">
		<input name="username" type="text" class="login" value="{L_USERNAME}" size="10" onfocus="if (this.value == '{L_USERNAME}') this.value = '';" />
		      <span class="gensmall">
		      <input name="password" type="password" class="login" value="{L_PASSWORD}" size="10" maxlength="32" onfocus="if (this.value == '{L_PASSWORD}') this.value = '';" />
		      </span>
		            <span class="gensmall">
		            <input type="submit" class="mainoption" name="login" value="{L_LOGIN}" />
		            </span>
		</form>
		<!-- END switch_user_logged_out -->
		    <div class="topnav"><a href="{U_FAQ}">{L_FAQ}</a><a href="{U_SEARCH}">{L_SEARCH}</a><a href="{U_MEMBERLIST}">{L_MEMBERLIST}</a><a href="{U_GROUP_CP}">{L_USERGROUPS}</a><a href="{U_PRIVATEMSGS}">{PRIVATE_MESSAGE_INFO}</a>
		        <!-- BEGIN switch_user_logged_out -->
		        <a href="{U_REGISTER}">{L_REGISTER}</a></div>
			<!-- END switch_user_logged_out -->
	  </td></tr><tr>
			<td><table cellpadding="0" cellspacing="0" border="0" class="main" width="100%"><tr><td>
