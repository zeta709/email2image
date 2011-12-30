<?php
if (!isset($_GET['addr'])) {
	echo 'Invalid input';
	exit;
}
$text = trim($_GET['addr']);
$max_length = 254;
if (strlen($text) > $max_length) {
	 echo 'Too long address';
	 exit;
}

// font
putenv('GDFONTPATH=' . realpath('./font/'));
$font = 'NanumGothic';
$fontsize = 10;
$baseline = 11;
$below_baseline = 4;
$ysize = $baseline + $below_baseline;

// bounding box
$bbox  = imagettfbbox($fontsize, 0, $font, $text);
$min_x = min(array($bbox[0], $bbox[2], $bbox[4], $bbox[6])); 
$max_x = max(array($bbox[0], $bbox[2], $bbox[4], $bbox[6])); 
//$min_y = min(array($bbox[1], $bbox[3], $bbox[5], $bbox[7])); 
//$max_y = max(array($bbox[1], $bbox[3], $bbox[5], $bbox[7])); 

// image size
$xmargin = 2;
$ymargin = 2;
$width   = ($max_x - $min_x) + 2 * $xmargin;
$height  = $ysize + 2 * $ymargin;

// image create
$pic = @imagecreatetruecolor($width, $height)
	or die("gg");
imagesavealpha($pic, true); // !!!

// predefined colors
$black = imagecolorallocate($pic, 0, 0, 0);
$white = imagecolorallocate($pic, 255, 255, 255);

// text color
if (isset($_GET['r']) && isset($_GET['g']) && isset($_GET['b'])) {
	$tmp_r = intval($_GET['r']);
	$tmp_g = intval($_GET['g']);
	$tmp_b = intval($_GET['b']);
	if (isset($_GET['a'])) {
		$tmp_a = intval($_GET['a']);
	} else {
		$tmp_a = 0;
	}
	if ((0 <= $tmp_r && $tmp_r <= 255)
		&& (0 <= $tmp_g && $tmp_g <= 255)
		&& (0 <= $tmp_b && $tmp_b <= 255)
		&& (0 <= $tmp_a && $tmp_a <= 127)) {
		$textcolor = imagecolorallocatealpha($pic, $tmp_r, $tmp_g, $tmp_b, $tmp_a);
	} else {
		echo 'Wrong text color';
		exit;
	}
} else {
	$textcolor = $black;
}

// background color
if (isset($_GET['br']) && isset($_GET['bg']) && isset($_GET['bb'])) {
	$tmp_r = intval($_GET['br']);
	$tmp_g = intval($_GET['bg']);
	$tmp_b = intval($_GET['bb']);
	if (isset($_GET['ba'])) {
		$tmp_a = intval($_GET['ba']);
	} else {
		$tmp_a = 0;
	}
	if ((0 <= $tmp_r && $tmp_r <= 255)
		&& (0 <= $tmp_g && $tmp_g <= 255)
		&& (0 <= $tmp_b && $tmp_b <= 255)
		&& (0 <= $tmp_a && $tmp_a <= 127)) {
		$bgcolor = imagecolorallocatealpha($pic, $tmp_r, $tmp_g, $tmp_b, $tmp_a);
	} else {
		echo 'Wrong background color';
		exit;
	}
} else {
	$bgcolor = $white;
}

// background
imagealphablending($pic, false); // !!!
imagefilledrectangle($pic, 0, 0, $width, $height, $bgcolor);
imagealphablending($pic, true); // !!!

// text
$yoffset = $baseline + $ymargin;
imagettftext($pic, $fontsize, 0, $xmargin, $yoffset, $textcolor, $font, $text);

// output
header("Content-Type: image/png");
//header("Content-Disposition: attachment; filename=\"mail.png\"");
header("Content-Disposition: inline; filename=\"mail.png\"");
imagepng($pic);
imagedestroy($pic);
?>
