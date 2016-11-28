<?php /* Smarty version Smarty-3.1.19, created on 2016-06-10 18:51:30
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/comment.html" */ ?>
<?php /*%%SmartyHeaderCode:1744180683575a9bb26c29e7-79604734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924e25ec228f09c8a7c2bfa45acd82f82cc9a894' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/comment.html',
      1 => 1447292254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1744180683575a9bb26c29e7-79604734',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_575a9bb274b956_64901432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575a9bb274b956_64901432')) {function content_575a9bb274b956_64901432($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>评论管理</title>
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
				<li><a href='?a=comment&action=show'>评论管理</a></li>
				<li class="active">显示评论</li>
			</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=comment&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>文章名</td>
					<td>评论者</td>
					<td>内容</td>
					<td>审批</td>
					<td>评论时间</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
					<td><a href="?a=comment&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a></td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="8"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="8">暂无评论</td></tr>
				<?php }?>
			</form>
			</table>
		</div>
	</div>
	<div class="row text-center"><dlv class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</dlv></div>
	<?php }?>
</body>
</html><?php }} ?>
