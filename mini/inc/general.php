<?php
/*
general.php
General PHP function used throughout the site
27-Sep-2007
*/

function fixbadchars($val) {

	$val = str_replace("£", "&#163;", $val);
	return $val;
}

function fixapostrophe($val) {
	$val = str_replace("'", "&#39;", $val);
	return $val;
}

/* 
Name: badimage
Purpose: update the database when a user has flagged an image up as inappropriate
*/
function badimage($id) {

	$flagupdate = mysql_query("UPDATE `ayrshire_mini`.`gallery` SET flagged = 'Y' WHERE id = '$id'") or die(mysql_error());
	
	// DEV: SEND EMAIL TO ME THAT IMAGE HAS BEEN MARKED AS INNAPPROPRIATE
	//sendemail()
}

/*
Name: escape_data
Purpose: Makes data ok for inserting into MySQL tables
*/
function escape_data ($data) { 
	
	global $conn; // need the connection.
	if (ini_get('magic_quotes_gpc')) {
		$data = stripslashes($data);
	}
	return mysql_real_escape_string($data, $conn);
}

function mysqlDatetimeToUnixTimestamp($datetime){
	$val = explode(" ",$datetime);
	$date = explode("-",$val[0]);
	$time = explode(":",$val[1]);
	return mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
}

function redirect($to,$code=301) {

  $location = null;
  $sn = $_SERVER['SCRIPT_NAME'];
  $cp = dirname($sn);
  if (substr($to,0,4)=='http') $location = $to; // Absolute URL
  else
  {
    $schema = $_SERVER['SERVER_PORT']=='443'?'https':'http';
    $host = strlen($_SERVER['HTTP_HOST'])?$_SERVER['HTTP_HOST']:$_SERVER['SERVER_NAME'];
    if (substr($to,0,1)=='/') $location = "$schema://$host$to";
    elseif (substr($to,0,1)=='.') // Relative Path
    {
      $location = "$schema://$host/";
      $pu = parse_url($to);
      $cd = dirname($_SERVER['SCRIPT_FILENAME']).'/';
      $np = realpath($cd.$pu['path']);
      $np = str_replace($_SERVER['DOCUMENT_ROOT'],'',$np);
      $location.= $np;
      if ((isset($pu['query'])) && (strlen($pu['query'])>0)) $location.= '?'.$pu['query'];
    }
  }

  $hs = headers_sent();
  if ($hs==false)
  {
    if ($code==301) header("301 Moved Permanently HTTP/1.1"); // Convert to GET
    elseif ($code==302) header("302 Found HTTP/1.1"); // Conform re-POST
    elseif ($code==303) header("303 See Other HTTP/1.1"); // dont cache, always use GET
    elseif ($code==304) header("304 Not Modified HTTP/1.1"); // use cache
    elseif ($code==305) header("305 Use Proxy HTTP/1.1");
    elseif ($code==306) header("306 Not Used HTTP/1.1");
    elseif ($code==307) header("307 Temorary Redirect HTTP/1.1");
    else trigger_error("Unhandled redirect() HTTP Code: $code",E_USER_ERROR);
    header("Location: $location");
    header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
  }
  elseif (($hs==true) || ($code==302) || ($code==303))
  {
    // todo: draw some javascript to redirect
    $cover_div_style = 'background-color: #ccc; height: 100%; left: 0px; position: absolute; top: 0px; width: 100%;'; 
    echo "
\n"; $link_div_style = 'background-color: #fff; border: 2px solid #f00; left: 0px; margin: 5px; padding: 3px; '; $link_div_style.= 'position: absolute; text-align: center; top: 0px; width: 95%; z-index: 99;'; echo "
\n"; echo "

Please See: ".htmlspecialchars($location)."
\n"; echo "
\n
\n";
  }
  exit(0);
}

/*
Name: isemail
Purpose: checks the email address entered from the newsletter subscription
alerts the user if the address is invalid
*/
function isemail($email) {

	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
		return true;
	} else {
		return false;
	}

}

/*
Name: gettab
Purpose: dependant on the page that the user is on it will return the section
of the site that they are on, so we can highlight the correct tab - Home, Galleries, etc...
*/
function gettab($page) {

	if ($page == "/index.php") {
		return "Home";
	} else if ($page == "/mini/en/galleries.php" or $page == "/mini/en/gallerymini.php" or $page == "/mini/en/addmini.php") {
		return "Galleries";
	} else if ($page == "/mini/en/contact.php") {
		return "Contact";
	} else if ($page == "/mini/en/links.php") {
		return "Links";
	} else {
		return false;
	}

}
?>