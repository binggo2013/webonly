<?php
/* Smarty version 3.1.29, created on 2016-09-05 22:34:43
  from "/data/home/qyu1988070001/htdocs/application/views/home/resetpwd.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cd8283386b12_14675786',
  'file_dependency' => 
  array (
    '99b0a1bfa6e4e2f49794b6d764b62450b7569557' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/resetpwd.html',
      1 => 1473086071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/common.html' => 1,
    'file:home/header.html' => 1,
  ),
),false)) {
function content_57cd8283386b12_14675786 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>忘记密码</title>
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/resetpwd.js"><?php echo '</script'; ?>
>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/resetpwd.css" rel="stylesheet">
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container main">
	<?php if ($_smarty_tpl->tpl_vars['forget']->value) {?>
	<div class="row">
		<div class="col-md-12 text-center ">
			<p>请输入注册时的用户名和密码</p>
			<dl>
				<dd><input type="text" placeholder="用户名" class="form-control" id="username" required></dd>
				<dd><input type="email" placeholder="请输入注册时的邮箱" class="form-control" id="email" required></dd>
				<dd><input type="button" value="下一步" class="btn btn-success" id="nextBtn"></dd>
			</dl>			
		</div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['reset']->value) {?>
	<div class="row main">
		<div class="col-md-12 text-center">
		<p>设置新的密码</p>
			<dl>
				<dd><input type="password" placeholder="密码" class="form-control" id="pwd"></dd>
				<dd><input type="password" placeholder="再输入一次确认" class="form-control" id="repwd"></dd>
				<dd>
					<a href="?a=resetpwd&action=forget" class="btn btn-success pull-left">上一步</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" value="提 交" class="btn btn-success" id="submitBtn">
				</dd>
			</dl>			
		</div>
	</div>
	<?php }?>
</div>
</body>
</html><?php }
}
