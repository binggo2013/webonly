<?php
session_start();
error_reporting(E_ALL^E_NOTICE);
//error_reporting(0);
define("ROOT_PATH",dirname(__FILE__));
//echo ROOT_PATH."<BR>";
set_include_path(".".PATH_SEPARATOR."./vendor".
    PATH_SEPARATOR.get_include_path());
ini_set("cgi.fix_pathinfo", 1);
//echo get_include_path();
require_once 'kong/loader.class.php';
require_once 'vendor/smarty/Smarty.class.php';
require_once "application/configs/config.php";
$smarty=new Smarty();
//注册一个
spl_autoload_register(array('loader','myAutoloader'));
Factory::run();

?>