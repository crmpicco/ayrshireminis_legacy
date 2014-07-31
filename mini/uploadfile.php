
<?php 

if ($_POST["submit"]) {

	$target_path = "images/gallery/";

	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

	echo "target_path: " . $target_path . "<br>";

	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
		echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
		" has been uploaded";
	} else{
		echo "There was an error uploading the file, please try again!";
	}

}

?>
<form enctype="multipart/form-data" action="uploadfile.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" name="submit" value="Upload File" />
</form>