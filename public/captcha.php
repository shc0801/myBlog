<?php
session_start();
header('Content-type: image/gif');

$captcha = '';

$patten = '123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';

for($i = 0, $len = strlen($patten) - 1; $i < 6; $i++){ 
    $captcha .= $patten[rand(0, $len)];
}

$_SESSION['capt'] = $captcha;

$img = imagecreatetruecolor(60, 20); 
imagefilledrectangle($img, 0,0,100,100,0xc80000); 
imagestring($img, 5, 3, 3, $captcha, 0xffffff); 
imageline($img,0,rand() % 20,100,rand() % 20, 0x001458); 
imagegif($img);
imagedestroy($img);