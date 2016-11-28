<?php /* Smarty version Smarty-3.1.19, created on 2015-11-14 21:43:43
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/administrator.html" */ ?>
<?php /*%%SmartyHeaderCode:63517788256473a8f25d614-49390582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c4b69ba98af49db60393460d60d1bb925b0f5ac' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/administrator.html',
      1 => 1447292252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63517788256473a8f25d614-49390582',
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
    'all' => 0,
    'level' => 0,
    'page' => 0,
    'update' => 0,
    'oneAdmin' => 0,
    'add' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56473a8f326f14_88055802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56473a8f326f14_88055802')) {function content_56473a8f326f14_88055802($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员管理</title>
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
			<li><a href='?a=admin&action=show'>管理员管理</a></li>
			<li class="active">显示管理员</li>
			<li><a href="?a=admin&action=add" title='添加管理员'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<form action="?a=admin&action=deleteAll" method="post">
		<tr>
			<td>编号</td>
			<td>名称</td>
			<td>等级</td>
			<td>登录次数</td>
			<td>登录IP</td>
			<td>登录时间</td>
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
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->login_num;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_ip;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_time;?>
</td>
			<td><a href="?a=admin&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a><a href="?a=admin&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a></td>
			<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="8"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
		</tr>
		<?php } else { ?>
		<tr><td colspan="8">暂无数据</td></tr>
		<?php }?>
		</form>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
	<form method="get" style="display:inline">
		<input type="hidden" name="action" value="show">
		<input type="hidden" name="a" value="admin">
		<select name="level" class="input-sm">
			<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有等级</option>
			<?php echo $_smarty_tpl->tpl_vars['level']->value;?>

		</select>
		<input type="submit" name="send" value="提交" class="btn btn-success">
	</form>
	<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=show'>广告管理</a></li>
					<li class="active">显示广告</li>
					<li><a href="?a=admin&action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneAdmin']->value->id;?>
">
			<input type="hidden" name="pwd2" value="<?php echo $_smarty_tpl->tpl_vars['oneAdmin']->value->pwd;?>
">
			<tr><td class="text-right">管理员名</td><td><input type="text" name="username" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneAdmin']->value->username;?>
"></td></tr>
			<tr><td class="text-right">管理员密码</td><td><input type="password" name="pwd" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneAdmin']->value->pwd;?>
"></td></tr>
			<tr>
				<td class="text-right">管理员等级</td>
				<td>
					<select class="input-sm" name="level">
					<option>选择等级</option>
					<?php echo $_smarty_tpl->tpl_vars['level']->value;?>

					</select>
				</td>
			</tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
		</table>
		</div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=show'>广告管理</a></li>
					<li class="active">显示广告</li>
					<li><a href="?a=admin&action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr><td class="text-right">管理员名</td><td><input type="text" name="username" class="form-control"></td></tr>
			<tr><td class="text-right">管理员密码</td><td><input type="password" name="pwd" class="form-control"></td></tr>
			<tr>
				<td class="text-right">管理员等级</td>
				<td>
					<select class="input-sm" name="level">
					<option>选择等级</option>
					<?php echo $_smarty_tpl->tpl_vars['level']->value;?>

					</select>
				</td>
			</tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
		</table>
		</div>
	</div>
	<?php }?>
</body>
</html><?php }} ?>
