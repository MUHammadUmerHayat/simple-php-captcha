<?php

session_start();

header ("Content-type: image/jpg");

$image = imagecreate(150, 50);
$background = imagecolorallocate($image, 0, 0, 0);

$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnoprstuvwxyz1234567890'; //Kombinasi huruf dan angka yang diacak
$string = '';

for ($i = 0; $i < 6; $i++) {
    $pos = rand(0, strlen($karakter)-1);
    $string .= $karakter{$pos};
}

$_SESSION['captcha'] = $string;

$textcolor = imagecolorallocate($image, 240, 240, 240);
$rand_x = rand(0, 95);
$rand_y = rand(0, 35);
imagestring($image, 110, $rand_x, $rand_y, $string, $textcolor);

imagepng($image);
?>