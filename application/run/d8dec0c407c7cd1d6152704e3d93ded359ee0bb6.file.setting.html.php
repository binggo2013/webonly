<?php /* Smarty version Smarty-3.1.19, created on 2015-09-28 22:30:00
         compiled from "/home/xiangruikong/public_html/application/views/admin/setting.html" */ ?>
<?php /*%%SmartyHeaderCode:12245305815472e02e204c82-30772148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8dec0c407c7cd1d6152704e3d93ded359ee0bb6' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/setting.html',
      1 => 1443353479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12245305815472e02e204c82-30772148',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5472e02e25c473_07228572',
  'variables' => 
  array (
    'config' => 0,
    'export' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5472e02e25c473_07228572')) {function content_5472e02e25c473_07228572($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>网站配置</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
<link href="public/styles/admin.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['config']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=admin&action=welcome'>后台首页</a></li>
			<li><a href='?action=show'>网站配置</a></li>
			<li class="active">显示配置</li>
			<li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr class="text-center text-primary"><td colspan="2">网站配置</td></tr>
			<tr>
				<td class="text-right" id="title">网站名称</td><td><input type="text" value="<?php echo @constant('SITE_NAME');?>
" class="form-control" name="sitename"></td>
			</tr>
			<tr>
				<td class="text-right">网站关键字</td><td><input type="text" value="<?php echo @constant('KEY_WORDS');?>
" class="form-control" name="keywords"></td>
			</tr>
			<tr>
				<td class="text-right">网站描述</td><td><textarea name="description" class="form-control"><?php echo @constant('DESCRIPTION');?>
</textarea></td>
			</tr>
			<tr>
				<td class="text-right">slider个数</td><td><input type="text" value="<?php echo @constant('SLIDER_NUM');?>
" class="form-control" name="slidernum"></td>
			</tr>
			<tr class="text-center text-primary"><td colspan="2">数据库配置</td></tr>
			<tr>
				<td class="text-right">主机名称</td><td><input type="text" value="<?php echo @constant('DB_HOST');?>
" class="form-control" name="host"></td>
			</tr>
			<tr>
				<td class="text-right">用户名</td><td><input type="text" value="<?php echo @constant('DB_USER');?>
" class="form-control" name="user"></td>
			</tr>
			<tr>
				<td class="text-right">密码</td><td><input type="text" value="<?php echo @constant('DB_PWD');?>
" class="form-control" name="pwd"></td>
			</tr>
			<tr>
				<td class="text-right">数据库名</td><td><input type="text" value="<?php echo @constant('DB_NAME');?>
" class="form-control" name="dbname"></td>
			</tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
		</table>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['export']->value) {?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>恭喜!</strong> <?php echo $_smarty_tpl->tpl_vars['export']->value;?>
.
		</div>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
