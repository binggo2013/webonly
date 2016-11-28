<?php /* Smarty version Smarty-3.1.19, created on 2015-09-28 22:28:22
         compiled from "/home/xiangruikong/public_html/application/views/admin/order.html" */ ?>
<?php /*%%SmartyHeaderCode:74258420155af3131ad4ef0-03041346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666ee4959cdd399b205d5945b70000e9e69794e4' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/order.html',
      1 => 1443353477,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74258420155af3131ad4ef0-03041346',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55af3131b690a7_80681677',
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
    'detail' => 0,
    'oneOrder' => 0,
    'back' => 0,
    'add' => 0,
    'update' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55af3131b690a7_80681677')) {function content_55af3131b690a7_80681677($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/home/xiangruikong/public_html/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
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
				<li><a href='?a=level&action=show'>订单管理</a></li>
				<li class="active">显示订单</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed alllevel">
			<form action="?a=order&action=deleteAll" method="post">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>商品</td>
				<td>总价</td>
				<td>是否付款</td>
				<td>是否发货</td>
				<td>操作</td>
				<td>日期</td>
				<td><input type="checkbox" id="selectBar"></td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->orderId;?>
</td>
				<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->pid;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->pid,10,"...");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->total;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->payed;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->sent;?>
</td>
				<td>
					<a href="?a=order&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>|
					<a href="?a=order&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">详细</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->orderTime;?>
</td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="11" class='text-right'><input type="submit" class="btn btn-success" name="send" value="全删"></td>
			</tr>
			<?php } else { ?>
			<tr><td colspan="5">暂无数据</td></tr>
			<?php }?>
			</form>
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
		</table>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['detail']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=level&action=show'>订单管理</a></li>
			<li class="active">订单详细</li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr>
				<td class="text-right">订单ID</td>
				<td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->orderId;?>
" disabled></td>
			</tr>
			<tr>
				<td class="text-right">订购商品</td>
				<td><input name="description" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->productName;?>
" disabled></td>
			</tr>
			<tr>
				<td class="text-right">商品总价</td>
				<td><input name="description" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->total;?>
" disabled></td>
			</tr>
			<tr>
				<td class="text-right">是否付款</td>
				<td><?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->payed;?>
</td>
			</tr>
			<tr>
				<td class="text-right">是否发货</td>
				<td><?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->sent;?>
</td>
			</tr>
			<tr>
				<td class="text-right">顾客</td>
				<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->username;?>
" disabled></td>
			</tr>
			<tr>
				<td class="text-right">订单日期</td>
				<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneOrder']->value->orderTime;?>
" disabled></td>
			</tr>
			<tr class="text-center">
				<td colspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" class="btn btn-success">返回</a></td>
			</tr>
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
