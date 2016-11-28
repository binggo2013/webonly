<?php /* Smarty version Smarty-3.1.19, created on 2015-06-16 10:27:41
         compiled from "C:\xampp\htdocs\quiz\application\views\admin\admin_login.html" */ ?>
<?php /*%%SmartyHeaderCode:8670557f899d560257-50907230%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae7d0d9fd3ae6784b570fae991ae049b29fe7d07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\admin\\admin_login.html',
      1 => 1433863607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8670557f899d560257-50907230',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557f899d63da70_86514747',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f899d63da70_86514747')) {function content_557f899d63da70_86514747($_smarty_tpl) {?><!DOCTYPE html>
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
