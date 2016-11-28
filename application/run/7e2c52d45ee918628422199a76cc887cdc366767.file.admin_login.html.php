<?php /* Smarty version Smarty-3.1.19, created on 2015-06-16 11:32:07
         compiled from "C:\xampp\htdocs\KongCELS\application\views\admin\admin_login.html" */ ?>
<?php /*%%SmartyHeaderCode:16319557f98b7132ab1-98949533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e2c52d45ee918628422199a76cc887cdc366767' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongCELS\\application\\views\\admin\\admin_login.html',
      1 => 1433863607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16319557f98b7132ab1-98949533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557f98b715f272_28724898',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f98b715f272_28724898')) {function content_557f98b715f272_28724898($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>KongCMS后台登录</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<div id="mask"></div><i class="fa fa-spinner fa-spin loading"></i>
<body id="loginBody">
	<div id="admin_login">
		<dl>
			<dd class="feedback text-danger text-center"></dd>
			<dd><i class="fa fa-user"></i><input type="text" class="form-control" id="username" placeholder='用户名'></dd>
			<dd><i class="fa fa-lock"></i><input type="password" class="form-control" id="pwd" placeholder="密码"></dd>
			<dd><input type="button" class="btn btn-success btn-block" id="loginBtn" value="登录"></dd>
		</dl>
	</div>
</body>
</html><?php }} ?>
