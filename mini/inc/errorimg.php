<?php
# check and limit input values to prevent abuse 
if(!$width = min(640, abs(intval($width)))) $width = 240; if(!$height = min(480, abs(intval($height)))) $height = 160; 

# create image
$img = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream"); 

# define background colour (white) 
$background_color = imagecolorallocate($img, 255, 255, 255); 

# define line colour (red) 
$line_color = imagecolorallocate($img, 255, 0, 0);

# draw box and lines
imagerectangle($img, 0, 0, $width-1, $height-1, $line_color); 
imageline($img, 0, 0, $width, $height, $line_color); 
imageline($img, $width, 0, 0, $height, $line_color); 

# display the image and free memory
Header("Content-type: image/jpeg");
imagejpeg($img);
imagedestroy($img); 
?>