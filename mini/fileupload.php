<form action="fileupload.php" method="post" enctype="multipart/form-data">
<p>Pictures:<br>
<input type="file" name="pictures[]" /><br>
<input type="file" name="pictures[]" /><br>
<input type="file" name="pictures[]" /><br>
<input type="submit" name="submit" value="Send" />
</p>
</form>

     

<?php

if ($_POST["submit"]) {
	echo "SUBMITTED<br>";
	foreach ($_FILES["pictures"]["error"] as $key => $error) {
		echo "go throught the files<br>";
		if ($error == UPLOAD_ERR_OK) {
			echo "ERROR: " . $error . "<br>";
			$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
			echo "tmp_name: " . $tmp_name . "<br>";
			$name = $_FILES["pictures"]["name"][$key];
			echo "name: " . $name . "<br>";
			move_uploaded_file($tmp_name, "data/$name");
		}
	}
}
?> 