/*
******************************************************
AyrshireMinis.com
General Javascript functions used throughout site
27-Sep-2007

written by Craig R Morton
[ info AT ayrshireminis DOT com ]
******************************************************
*/

/*
FUNCTION: langredirect
for the English/German language selection dropdown
- redirect to the correct index file
*/
function langredirect(val) {

	if (val == "DE")
	{
		// Selected: German
		window.location = "/mini/de/index.php?lang=DE";
	}
	else 
	{
		window.location = "/";
	}
}

/*
FUNCTION: validateform
validate the form passed to it (CONTACT PAGE)
*/
function validateform(frm) {

	if (document.getElementById("name").value == "")
	{
		alert("Please Enter your Name");
		return false;
	}
	if (document.getElementById("email").value == "")
	{
		alert("Please Enter your Email Address");
		return false;
	}
	else
	{
		var isvalidemail = validemail(document.getElementById("email").value);
		if (isvalidemail == "false")
		{
			return false;
		}
	}
	if (document.getElementById("message").value == "")
	{
		alert("Please Enter your Message");
		return false;
	}
	if (document.getElementById("message").value == "Enter your message here")
	{
		// check if they actually meant to leave the 'Enter msg here' in the message box
		var answer = confirm("Are you sure you do not want to enter a message to send to AyrshireMinis.com?");
		if (!answer)
		{
			return false;
		}
	}
}

function showregistration(val) {

	if (val == "no")
	{
		document.getElementById("reg_member").style.display = "inline";
	}
	else 
	{
		document.getElementById("reg_member").style.display = "none";
	}

}

function showreg(itemID,val) {

	// Toggle visibility between none and inline
	if ((document.getElementById(itemID).style.display == 'none') && (val == "No"))
	{
		document.getElementById(itemID).style.display = 'inline';
	} else {
		if (val != "No")
		{
			document.getElementById(itemID).style.display = 'none';
		}		
	}
}


/*
FUNCTION: show_hide_extra_images
Toggle between showing and hiding the image browse fields or
the additional textboxes for external urls to images
*/
function show_hide_extra_images(itemID) {

      // Toggle visibility between none and inline
      if ((document.getElementById(itemID).style.display == 'none'))
      {
        document.getElementById(itemID).style.display = 'inline';
      } else {
        document.getElementById(itemID).style.display = 'none';
      }
}

/*
FUNCTION: check_gallery_form
validate the user's input from the 'Add Mini' page
*/
function check_gallery_form(frm) {

	// no car description entered
	if (document.getElementById("cardesc").value == "")
	{
		alert("Please enter a Description for the Mini");
		return false;
	}

	// no image information entered
	if ((document.getElementById("filename").value == "") && (document.getElementById("imgurl").value == ""))
	{
		alert("Please either upload an image or link to an image");
		return false;
	}

}

/*
FUNCTION: changeyear
when the category is changed then change the year appropriately,
Classic - 1959 to Present and New is 2001 to Present Day
*/
function changeyear(val) {

	var element = document.getElementById("year");

	var date = new Date();
	var thisyear = date.getFullYear();

	// BMW New MINI
	if (val == "New Mini (MINI)")
	{
		// remove all the <option> current in the drop down
		while (element.firstChild) {
			element.removeChild(element.firstChild);
		}

		// Add in 'Any' to top of list
		element.options[element.options.length] = new Option("Any", "Any");

		// MINI - 2001 to Present Day
		for(var y = parseInt(thisyear); y >= 2001; y--)
		{
			element.options[element.options.length] = new Option(y, y);
		}   
	  
	} else {

		// remove all the <option> current in the drop down
		while (element.firstChild) {
			element.removeChild(element.firstChild);
		}

		// Add in 'Any' to top of list
		element.options[element.options.length] = new Option("Any", "Any");

		// Classic Mini - 1959 to Present Day (for new registrations)
		for(var y = parseInt(thisyear); y >= 1959; y--)
		{
			element.options[element.options.length] = new Option(y, y);
		}
	}
}

/*
FUNCTION: validemail
check if the email entered is valid or not, if it is
not then prompt the user and do not validate the form
*/
function validemail(str) {

	if ((str.indexOf(".") > 2) && (str.indexOf("@") > 0))
	{
		// valid email address, does include (dot) and (@)
		return "true";
	}
	else
	{
		// invalid email address
		alert("Please Enter a Valid Email Address");
		return "false";
	}
}

/*
FUNCTION: unsubscribe
ask ther user to confirm if they want to unsubscribe from the AM newsletter
*/
function unsubscribe() {

	// check if they actually want to unsubscribe
	var answer = confirm("Are you 100% certain you wish to unsubscribe from the Ayrshire Minis newsletter?");
	if (!answer)
	{
		return false;
	}
}