<?php
/* Smarty version 3.1.29, created on 2016-09-03 11:37:01
  from "/data/home/qyu1988070001/htdocs/application/views/admin/topic.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ca455d0c3f64_21090037',
  'file_dependency' => 
  array (
    'e37f0ffe4b7827de3cd48fbd8cbcae2f82cec5c8' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/topic.html',
      1 => 1471709104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ca455d0c3f64_21090037 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>等级管理</title>
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
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<body>
<!--modal模态框开始  -->
<div class="confirm modal-content" id="myModal" aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true" id="confirmCloseBtn"></span><span class="rs-only"></span>
				</button>
				<h4 class="modal-title" id="myModalLabel">确定要删除吗</h4>
			</div>
			<div class="modal-body body">
				<span class="text-danger h4">删除是不可逆的，确定要删除吗？</span>
			</div>
			<div class="modal-footer">
				<a href="" type="button" class="btn btn-success" id="true">确定</a>
				<a href="" type="button" class="btn btn-danger" data-dismiss="modal" id="falseBtn">取消</a>
			</div>
</div>
<!--modal模态框结束  -->
	<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=topic&action=show'>下载主题管理</a></li>
				<li class="active">显示下载主题</li>
				<li><a href="?a=topic&action=add" title='添加等级'><i class="fa fa-plus-circle"></i></a></li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed alllevel">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>描述</td>				
				<td>操作</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
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
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>				
				<td>
					<a href="?a=topic&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>
					<a href="?a=topic&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
			</tr>
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
			<?php } else { ?>
			<tr><td colspan="5">暂无数据</td></tr>
			<?php }?>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
	<?php }
if ($_smarty_tpl->tpl_vars['add']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=topic&action=show'>主题管理</a></li>
				<li class="active">添加等级</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr><td class="text-right" style="width:100px;">主题名称</td><td><input type="text" name="name" class="form-control"></td></tr>
			<tr><td class="text-right">主题描述</td><td><textarea name="description" class="form-control"></textarea></td></tr>			
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=topic&action=show'>下载主题管理</a></li>
				<li class="active">添加等级</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['onetopic']->value->id;?>
">
			<tr><td class="text-right" style="width:100px;">下载主题名称</td><td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['onetopic']->value->name;?>
"></td></tr>
			<tr><td class="text-right">下载主题描述</td><td><textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['onetopic']->value->description;?>
</textarea></td></tr>			
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }?>
</body>
</html><?php }
}
