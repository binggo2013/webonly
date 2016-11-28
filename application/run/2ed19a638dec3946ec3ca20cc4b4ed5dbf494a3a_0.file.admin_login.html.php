<?php
/* Smarty version 3.1.29, created on 2016-09-01 00:05:06
  from "/data/home/qyu1988070001/htdocs/application/views/admin/admin_login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57c70032a59486_52355831',
  'file_dependency' => 
  array (
    '2ed19a638dec3946ec3ca20cc4b4ed5dbf494a3a' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/admin_login.html',
      1 => 1472659503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57c70032a59486_52355831 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
后台登录</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/admin.js"><?php echo '</script'; ?>
>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<div id="mask"></div><i class="fa fa-spinner fa-spin loading"></i>
<body id="loginBody">
<!-- 登录界面-->
	<div id="admin_login" class="panel panel-default">
		<i class="fa fa-times closeBar"></i>
		<div class="panel-heading">
			
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
					<!-- <div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block"
							id="loginBtn" value="登 录">
					</div> -->
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<div class="form-group">
			<input type="submit" class="btn btn-lg btn-primary btn-block" id="loginBtn" value="登 录">
			</div>
		</div>
	</div>
</body>
</html><?php }
}
