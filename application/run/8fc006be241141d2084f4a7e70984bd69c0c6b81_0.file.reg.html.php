<?php
/* Smarty version 3.1.29, created on 2016-09-11 20:55:13
  from "/data/home/qyu1988070001/htdocs/application/views/home/reg.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d55431a46514_55389828',
  'file_dependency' => 
  array (
    '8fc006be241141d2084f4a7e70984bd69c0c6b81' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/reg.html',
      1 => 1473598510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/common.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_57d55431a46514_55389828 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员注册</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/home.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/reg.js"><?php echo '</script'; ?>
>
<link href="public/styles/reg.css" rel="stylesheet">
</head>
<body id="home">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="container">
		
		<div class="row main">
			<div class="col-md-6 reg">
			<form class="form-horizontal" id="reg_form">
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">用户名</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="reg_username">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">设置密码</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="reg_pwd" placeholder="密码必须包含大小写、数字、特殊字符">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">确认密码</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" id="confirm_reg_pwd">
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-asterisk"></span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">邮箱</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="reg_email" placeholder="邮箱用于找回密码" required>
					</div>
				</div>
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label">头像</label>
					<div class="col-sm-10">
						<img src="public/images/default.jpg" class="img-circle"><a href="javascript:void(0)" id="iconBtn">太丑了，换一张</a>
						<input type="file" class="form-control" name="reg_icon" id="reg_icon" accept="image/*">
					</div>
				</div>
				<div class="form-group">
					<label for="InputName" class="col-sm-2 control-label"></label>
					<div class="col-sm-10 submit">
						<a href="#" id="submitBtn" class="btn btn-success btn-block">立 即 注 册<i class="fa reg_loading"></i></a>
					</div>
				</div>
			</form>
			</div>
			<div class="col-md-6 right">
				<div class="alert">
					<!--glyphicon-ok| glyphicon-remove|alert-danger -->
					<span class="glyphicon"></span><i></i>
					<strong></strong>
				</div>
				<div class="alert">
					<span class="glyphicon "></span>
					<strong></strong>
				</div>
				<div class="alert">
					<span class="glyphicon"></span>
					<strong></strong>
				</div>
				<div class="alert">
					<span class="glyphicon"></span>
					<strong></strong>
				</div>
				<div class="alert">
					<span class="glyphicon"></span>
					<strong></strong>
				</div>
			</div>
		</div>
		
		<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	</div>
</body>
</html><?php }
}
