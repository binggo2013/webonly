<?php
/**
 *  Smarty初始化
 *  @version 19
 *   */
//开启session;
session_start();
header("Content-Type:text/html;charset=utf-8");
//设置默认时区
//__FILE__完整的路径和文件名
//echo dirname(__FILE__);
//substr($str,0,-10):从第一位开始数，修剪掉后面的20个字符；
define("ROOT_PATH",substr(dirname(__FILE__),0,-20)."/");
include ROOT_PATH."application/configs/config.php";
//include 'application/includes/UploadFile.class.php';
//include 'application/includes/Page.class.php';
//smarty 3.x的自动加载；
spl_autoload_register('myautoload');
function myautoload($_className){
	//根据类名称的最后几位数，相应的导入不同目录下的类文件；
	if(substr($_className, -6)=='Action'){
		include 'application/controllers/'.$_className.".class.php";
	}elseif(substr($_className, -5)=='Model'){
		include 'application/models/'.$_className.".class.php";
	}else{
		include 'application/includes/'.$_className.".class.php";
	}
}
date_default_timezone_set("PRC");
//error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ALL ^ E_STRICT ^ E_NOTICE ^ E_WARNING);
include 'libs/smarty/Smarty.class.php';
//$smarty=new Smarty();
//定义网站根目录下的模板目录
//$smarty->template_dir=ROOT_PATH."application/views";
//$smarty->compile_dir=ROOT_PATH."application/run";
//var_dump($smarty);
Factory::setAction()->run();
/* if(file_exists(ROOT_PATH."application/database/install.php")){
	echo "有";
	header("Location:?a=install");
}else{
	echo "没有";
} */
?>