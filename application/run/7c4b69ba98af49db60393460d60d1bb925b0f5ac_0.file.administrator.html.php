<?php
/* Smarty version 3.1.29, created on 2016-09-04 13:14:05
  from "/data/home/qyu1988070001/htdocs/application/views/admin/administrator.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cbad9d512a99_88402802',
  'file_dependency' => 
  array (
    '7c4b69ba98af49db60393460d60d1bb925b0f5ac' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/administrator.html',
      1 => 1471709096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57cbad9d512a99_88402802 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员管理</title>
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
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
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
</html><?php }
}
