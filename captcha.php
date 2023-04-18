<?php
session_start();
$captcha = generateCaptcha();
$_SESSION['captcha'] = $captcha;
$im = imagecreate(100, 30);
$bg = imagecolorallocate($im, 255, 255, 255);
$textcolor = imagecolorallocate($im, 0, 0, 0);
imagestring($im, 5, 10, 10, $captcha, $textcolor);
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

function generateCaptcha() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    for ($i = 0; $i < 6; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}
?>
