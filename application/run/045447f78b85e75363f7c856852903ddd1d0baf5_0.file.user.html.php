<?php
/* Smarty version 3.1.29, created on 2016-08-21 00:12:46
  from "/data/home/qyu1988070001/htdocs/application/views/admin/user.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b8817e4274e8_55217345',
  'file_dependency' => 
  array (
    '045447f78b85e75363f7c856852903ddd1d0baf5' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/user.html',
      1 => 1471709104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b8817e4274e8_55217345 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>前台会员管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/admin.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
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
<?php echo '<script'; ?>
 src="public/scripts/addpoint.js"><?php echo '</script'; ?>
>
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
<!--modal消息模态框开始  -->
<div class="msg modal-content" id="myModal2" aria-labelledby='myModalLabel2' style="height:auto;">
				<div class="modal-header">
				<h4 class="modal-title text-primary" id="myModalLabel">您现在的操作</h4>
			</div>
			<div class="modal-body body" style="height:50px;">
				<span class="text-danger h4"></span>
			</div>
			<div class="modal-footer">
					<a href="http://www.webonly.org" target="_blank" class="h3 text-primary">www.webonly.org</a>					
			</div>
</div>
<!--modal模态框结束  -->
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
	<div class="col-md-12">
	<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=article&action=show'>前台管理员管理</a></li>
			<li class="active">显示前台管理员</li>
			<li><a href="?a=article&a=article&action=add" title='添加前台管理员'><i class="fa fa-plus-circle"></i></a></li>
	</ul>
<table class="table table-bordered table-striped table-hover table-condensed">
		<form action="?a=user&action=deleteAll" method="post">
			<tr>
				<td>编号</td>
				<td>用户名</td>
				<td>邮箱</td>
				<!-- <td>头像</td> -->
				<td>充值</td>
				<td style="width:75px;">登录次数</td>
				<td>登录IP</td>
				<td>登录时间</td>
				<td>注册时间</td>
				<td>禁言</td>
				<td>操作</td>
				<td><input type="checkbox" id="selectBar"></td>
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
				<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->username,10,"..");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->email;?>
</td>
				<!-- <td><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" style="width:50px;height:50px;"></td> -->
				<td style="width:130px;">
					<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->countdown;?>
" class="form-control" style="width:50px;display:inline-block;">&nbsp;&nbsp;
					<a class="btn btn-success addPoint" href="javascript:void(0);" info="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">确认</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->login_num;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_ip;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->last_time;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->regTime;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td><a href="?a=user&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
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
				<td colspan="12" class='text-right'><input type="submit" class="btn btn-success" name="send" value="全删"></td>
			</tr>
			<?php } else { ?>
			<tr><td colspan="11">暂无文章</td></tr>
			<?php }?>
			</form>
		</table>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
</div>
<?php }?>







</body>
</html><?php }
}
