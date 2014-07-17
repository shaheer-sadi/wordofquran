<?php
header('Content-Type: image/png');
include 'word2uni.php';
$image = imagecreatetruecolor(200, 75);
imagefill($image, 0, 0, 0xaaaaaa);
if(isset($_GET['word']))
	{
		$text = word2uni($_GET['word']);
	}
	else
	{
		$text = word2uni('العربية');
	}

imagettftext($image, 25, 0, 20, 50, 0x000000, 'arial.ttf', $text);
imagepng($image);
?>