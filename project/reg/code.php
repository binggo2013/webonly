<?php
session_start();
/*导入验证码类*/
include 'Captcha.class.php';
//实例化验证码类
$captcha=new Captcha(100,28);
$_SESSION['captcha']['code']=$captcha->getCaptcha();
//var_dump($captcha);
//echo $captcha->getMsg();
//输出验证码图片
//var_dump($_SESSION);
$captcha->showCaptcha();
?>