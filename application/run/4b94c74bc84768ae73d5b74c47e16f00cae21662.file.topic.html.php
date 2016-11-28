<?php /* Smarty version Smarty-3.1.19, created on 2015-09-27 19:31:50
         compiled from "/home/xiangruikong/public_html/application/views/admin/topic.html" */ ?>
<?php /*%%SmartyHeaderCode:11130839155f6dfc71e0ca7-88442495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b94c74bc84768ae73d5b74c47e16f00cae21662' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/topic.html',
      1 => 1443353479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11130839155f6dfc71e0ca7-88442495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55f6dfc72cb472_09666464',
  'variables' => 
  array (
    'show' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'add' => 0,
    'update' => 0,
    'onetopic' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55f6dfc72cb472_09666464')) {function content_55f6dfc72cb472_09666464($_smarty_tpl) {?><!DOCTYPE html>
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
					<a href="?a=topic&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>
					<a href="?a=topic&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
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
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
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
</html><?php }} ?>
