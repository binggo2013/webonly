<?php /* Smarty version Smarty-3.1.19, created on 2015-11-13 21:08:14
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/admin_login.html" */ ?>
<?php /*%%SmartyHeaderCode:15447909515645e0bea67f42-34083911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ed19a638dec3946ec3ca20cc4b4ed5dbf494a3a' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/admin_login.html',
      1 => 1447292253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15447909515645e0bea67f42-34083911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5645e0beaa11b5_04932690',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645e0beaa11b5_04932690')) {function content_5645e0beaa11b5_04932690($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>KongMPMS后台登录</title>
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
<!-- 登录界面-->
	<div id="admin_login" class="panel panel-default">
		<i class="fa fa-times closeBar"></i>
		<div class="panel-heading">
			<strong>KongMPMS后台管理</strong>
		</div>
		<div class="alert alert-danger feedback text-danger text-center center-block" role="alert">...</div>
		<div class="panel-body">
			<div class="row">
				<div class="center-block">
					<img class="img-circle center-block" src="public/images/default.jpg" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-10  col-md-offset-1 ">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
							</span>
							<input class="form-control" placeholder="用户名"	id="login_username" name="loginname" type="text" autofocus>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"> <i
								class="glyphicon glyphicon-lock"></i>
							</span> <input class="form-control" placeholder="密码"
								id="login_pwd" name="password" type="password" value="">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block"
							id="loginBtn" value="登 录">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html><?php }} ?>
