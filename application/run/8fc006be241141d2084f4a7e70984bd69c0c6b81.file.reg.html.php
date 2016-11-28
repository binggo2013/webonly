<?php /* Smarty version Smarty-3.1.19, created on 2016-04-20 06:36:58
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/reg.html" */ ?>
<?php /*%%SmartyHeaderCode:4517677715645ec4c91b8d6-00308842%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fc006be241141d2084f4a7e70984bd69c0c6b81' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/reg.html',
      1 => 1461105414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4517677715645ec4c91b8d6-00308842',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5645ec4c96cd27_15000983',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645ec4c96cd27_15000983')) {function content_5645ec4c96cd27_15000983($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员注册</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<script src="public/scripts/reg.js"></script>
<link href="public/styles/reg.css" rel="stylesheet">
</head>
<body id="home">
	<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
						<input type="text" class="form-control" id="reg_email" placeholder="邮箱用于找回密码">
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
						<input type="submit" id="submitBtn" value="立 即 注 册" class="btn btn-danger btn-block"><i class="fa reg_loading"></i>
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
		
		<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
</body>
</html><?php }} ?>
