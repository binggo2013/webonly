<?php /* Smarty version Smarty-3.1.19, created on 2016-01-26 01:36:42
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/resetpwd.html" */ ?>
<?php /*%%SmartyHeaderCode:56423247356a643092b3fe4-74687295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99b0a1bfa6e4e2f49794b6d764b62450b7569557' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/resetpwd.html',
      1 => 1453743347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56423247356a643092b3fe4-74687295',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56a643092f6ff1_73197280',
  'variables' => 
  array (
    'forget' => 0,
    'reset' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56a643092f6ff1_73197280')) {function content_56a643092f6ff1_73197280($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>忘记密码</title>
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/resetpwd.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/resetpwd.css" rel="stylesheet">
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
	<?php if ($_smarty_tpl->tpl_vars['forget']->value) {?>
	<div class="row">
		<div class="col-md-12 text-center">
			<dl>
				<dd><input type="text" placeholder="用户名" class="form-control" id="username"></dd>
				<dd><input type="text" placeholder="请输入注册时的邮箱" class="form-control" id="email"></dd>
				<dd><input type="button" value="下一步" class="btn btn-success" id="nextBtn"></dd>
			</dl>			
		</div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['reset']->value) {?>
	<div class="row">
		<div class="col-md-12 text-center">
			<dl>
				<dd><input type="password" placeholder="密码" class="form-control" id="pwd"></dd>
				<dd><input type="password" placeholder="再输入一次确认" class="form-control" id="repwd"></dd>
				<dd><input type="button" value="提交" class="btn btn-success" id="submitBtn"></dd>
			</dl>			
		</div>
	</div>
	<?php }?>
</div>
</body>
</html><?php }} ?>
