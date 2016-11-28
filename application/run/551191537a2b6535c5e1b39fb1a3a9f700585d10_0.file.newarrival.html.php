<?php
/* Smarty version 3.1.29, created on 2016-08-21 23:43:28
  from "/data/home/qyu1988070001/htdocs/application/views/home/newarrival.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b9cc2014cbd8_18623339',
  'file_dependency' => 
  array (
    '551191537a2b6535c5e1b39fb1a3a9f700585d10' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/newarrival.html',
      1 => 1447292260,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b9cc2014cbd8_18623339 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/admin.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/admin.js"><?php echo '</script'; ?>
>
</head>
<body>
<div class="container">
<?php if ($_smarty_tpl->tpl_vars['member']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb" style="margin-bottom:2px;">
			<li><a href='index.php'>首页</a></li>
			<li class="active">会员中心</li>
		</ul>
		<table class="table table-bordered table-striped">
			<tr>
				<td rowspan="5" width=160 height=160><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" style='width:160px;height:160px;'></td>
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->username;?>
</td>
			</tr>
			<tr>				
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->email;?>
</td>
			</tr>
			<tr>				
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->login_num;?>
</td>
			</tr>
			<tr>				
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->last_ip;?>
</td>
			</tr>
			<tr>				
				<td colspan="2"><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->last_time;?>
</td>
			</tr>
			<tr>
				<td colspan="3">
					<dl>
						<dt>评论列表</dt>
						<?php if ($_smarty_tpl->tpl_vars['allComments']->value) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['allComments']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
						<dd class="divider"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</dd>						
						<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
if ($__foreach_value_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_0_saved_key;
}
?>
						<dd><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</dd>
						<?php } else { ?>
						<dd>暂无评论</dd>
						<?php }?>
					</dl>
				</td>
			</tr>
		</table>
		</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<table class="table table-bordered table-striped">
		<form action="?a=user&action=update" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->id;?>
">
		<input type="hidden" name="icon2" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
">
			<tr>
				<td rowspan="5" width=160 height=160><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" style='width:160px;height:160px;'></td>
				<td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->username;?>
</td><td><input type="file" name="icon" class="form-control"></td>
			</tr>
			<tr>				
				<td colspan="2"><input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->email;?>
"></td>
			</tr>
			<tr>				
				<td colspan="2"><input type="text" class="form-control" name="pwd" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
"></td>
			</tr>	
			<tr>
				<td colspan="2" class="text-center"><input type="submit" name="send" value="提交" class="btn btn-success"></td>
			</tr>	
			</form>
		</table>
		</div>
	</div>
<?php }?>
</div>
</body>
</html><?php }
}
