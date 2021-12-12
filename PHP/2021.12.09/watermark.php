<?php
require_once('upload.php');

function resizeImage($image, $w, $h)
{
    $posw = imagesx($image);
    $posh = imagesy($image);
    $temp = imagecreatetruecolor($w, $h);

    imagecopyresampled($temp, $image, 0, 0, 0, 0, $w, $h, $posw, $posh);

    return $temp;
}
// Load the stamp and the photo to apply the watermark to
$ext = pathinfo($path, PATHINFO_EXTENSION);
$ext = strtolower($ext);
if($ext == 'jpg' || $ext == 'jpeg'){
    $stamp = imagecreatefromjpeg($path);
    $stamp = resizeImage($stamp, 700, 450);
}elseif($ext == 'png'){
    $stamp = imagecreatefrompng($path);
    $stamp = resizeImage($stamp, 700, 450);
}
$im = imagecreatefrompng('./assets/images/background.png');

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 670;
$marge_bottom = 1492;

$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo 
// width to calculate positioning of the stamp. 
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

// Allocate A Color For The Text
$black = imagecolorallocate($im, 0, 0, 0);

// Set Path to Font File
$font_path = './assets/fonts/open-sans/OpenSans-SemiboldItalic.ttf';

// Set Text to Be Printed On Image
$name = !empty($_POST['name']) ? $_POST['name'] : '';
$name = 'Vardas:      ' . $name;
$surname = !empty($_POST['surname']) ? $_POST['surname'] : '';
$surname = 'Pavardė:    ' . $surname;
$city = !empty($_POST['city']) ? $_POST['city'] : '';
$city = 'Miestas:    ' . $city;

if (isset($_POST['langs'])) {
    $langs = implode(" ,  ", $_POST['langs']);
} else {
    $langs = '';
}
$langs = 'Programavimo kalbos:     ' . $langs;
$content = !empty($_POST['content']) ? $_POST['content'] : '';
$content = 'Papildoma informacija:  ' . $content;

// Print Text On Image
imagettftext($im, 35, 0, 200, 827, $black, $font_path, $name);
imagettftext($im,  35, 0, 200, 947, $black, $font_path, $surname);
imagettftext($im,  35, 0, 200, 1067, $black, $font_path, $city);
imagettftext($im,  35, 0, 200, 1187, $black, $font_path, $langs);
imagettftext($im,  35, 0, 200, 1307, $black, $font_path, $content);

// Output and free memory
$generatedName = generateRandomString();
$path = "./uploads/photos/{$generatedName}.jpg";

imagejpeg($im, $path);
imagedestroy($im);
echo $path;//paduot path
?>