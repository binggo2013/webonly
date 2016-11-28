<?php /* Smarty version Smarty-3.1.19, created on 2015-09-10 17:41:50
         compiled from "/home/xiangruikong/public_html/application/views/home/newarrival.html" */ ?>
<?php /*%%SmartyHeaderCode:317149595464b4cf7df260-48096997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ef7f1e563204dbf52cbc0e192c6faaacff4ef8a' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/newarrival.html',
      1 => 1441847548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317149595464b4cf7df260-48096997',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5464b4cfcdbfa7_40814760',
  'variables' => 
  array (
    'member' => 0,
    'oneUser' => 0,
    'allComments' => 0,
    'value' => 0,
    'page' => 0,
    'update' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5464b4cfcdbfa7_40814760')) {function content_5464b4cfcdbfa7_40814760($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/admin.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
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
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<dd class="divider"><i class="fa fa-pencil-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</dd>						
						<?php } ?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
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
</html><?php }} ?>
