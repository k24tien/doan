<?php session_start();
 
require("captcha.php");
$captcha = new Captcha();
$code = $captcha->get_and_show_image();
 
// Luu code session
$_SESSION['captcha_code'] = $code;
 
?>