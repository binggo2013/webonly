<?php
session_start();
if(strtolower($_POST['code'])!=strtolower($_SESSION['captcha']['code'])){
    echo "wrongCode";
}else{
    echo "ok";
}
?>