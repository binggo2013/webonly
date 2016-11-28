<?php /* Smarty version Smarty-3.1.19, created on 2015-09-28 22:26:05
         compiled from "/home/xiangruikong/public_html/application/views/admin/level.html" */ ?>
<?php /*%%SmartyHeaderCode:81349980755a2f3a5d164c8-40998572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '546df03b869df0f515fad553d7468eb34fd813e9' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/level.html',
      1 => 1443353476,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81349980755a2f3a5d164c8-40998572',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55a2f3a5e36c97_29467299',
  'variables' => 
  array (
    'show' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'showPermission' => 0,
    'oneLevel' => 0,
    'permission' => 0,
    'back' => 0,
    'add' => 0,
    'update' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55a2f3a5e36c97_29467299')) {function content_55a2f3a5e36c97_29467299($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>等级管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
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
				<li><a href='?a=level&action=show'>等级管理</a></li>
				<li class="active">显示等级</li>
				<li><a href="?a=level&action=add" title='添加等级'><i class="fa fa-plus-circle"></i></a></li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed alllevel">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>描述</td>
				<td>权限</td>
				<td>操作</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
				<td>
					<a href="?a=level&action=showPermission&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">查看权限</a>
				</td>
				<td><a href="?a=level&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a><a href="?a=level&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a></td>
			</tr>
			<?php } ?>
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
	<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showPermission']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=level&action=show'>等级管理</a></li>
			<li class="active">显示权限</li>
			<li><a href="?a=level&action=add" title='添加等级'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<tr class="text-center text-success"><td><?php echo $_smarty_tpl->tpl_vars['oneLevel']->value->name;?>
</td></tr>
		<?php if ($_smarty_tpl->tpl_vars['permission']->value) {?>
		<tr class="text-center"><td><?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
</td></tr>
		<?php } else { ?>
		<tr><td>暂无权限</td></tr>
		<?php }?>
		<tr class="text-center"><td><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" class="btn btn-success">返回</a></td></tr>
		</table>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=level&action=show'>等级管理</a></li>
				<li class="active">添加等级</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr><td class="text-right">等级名称</td><td><input type="text" name="name" class="form-control"></td></tr>
			<tr><td class="text-right">等级描述</td><td><textarea name="description" class="form-control"></textarea></td></tr>
			<tr><td class="text-right">等级描述</td><td><?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
</td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=level&action=show'>等级管理</a></li>
				<li class="active">添加等级</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneLevel']->value->id;?>
">
			<tr><td class="text-right">等级名称</td><td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneLevel']->value->name;?>
"></td></tr>
			<tr><td class="text-right">等级描述</td><td><textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneLevel']->value->description;?>
</textarea></td></tr>
			<tr><td class="text-right">等级描述</td><td><?php echo $_smarty_tpl->tpl_vars['permission']->value;?>
</td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }?>
</body>
</html><?php }} ?>
