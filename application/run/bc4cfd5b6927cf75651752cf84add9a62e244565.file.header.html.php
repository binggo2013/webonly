<?php /* Smarty version Smarty-3.1.19, created on 2015-07-01 14:41:42
         compiled from "C:\xampp\htdocs\KongMPMS\application\views\home\header.html" */ ?>
<?php /*%%SmartyHeaderCode:25127559355a477e9d7-60981078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc4cfd5b6927cf75651752cf84add9a62e244565' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongMPMS\\application\\views\\home\\header.html',
      1 => 1435732898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25127559355a477e9d7-60981078',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559355a47c2555_40969230',
  'variables' => 
  array (
    'frontNav' => 0,
    'value' => 0,
    'logged' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559355a47c2555_40969230')) {function content_559355a47c2555_40969230($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
</head>
<body>
<div id="mask"></div><i class="fa fa-spinner fa-spin loading"></i>
<div id="login">
		<dl><i class="fa fa-times closeBar"></i>
			<dd class="feedback text-danger text-center"></dd>
			<dd><i class="fa fa-user"></i><input type="text" class="form-control" id="login_username" placeholder='用户名'></dd>
			<dd><i class="fa fa-lock"></i><input type="password" class="form-control" id="login_pwd" placeholder="密码"></dd>
			<dd><input type="button" class="btn btn-success btn-block" id="loginBtn" value="登录"></dd>
		</dl>
</div>
<div id="reg">
		<dl><i class="fa fa-times closeBar"></i>
			<dd class="feedback text-danger text-center"></dd>
			<dd><i class="fa fa-user"></i><input type="text" class="form-control" id="reg_username" placeholder='用户名(必填)'></dd>
			<dd><i class="fa fa-lock"></i><input type="password" class="form-control" id="reg_pwd" placeholder="密码(必填)"></dd>
			<dd><i class="fa fa-envelope" style="font-size:14px;"></i><input type="text" class="form-control" id="reg_email" placeholder="邮箱"></dd>
			<!-- <dd><i class="fa fa-image" style="font-size:14px;"> </i><input type="file" class="form-control" id="reg_icon" name='reg_icon' placeholder="头像"></dd> -->
			<dd><input type="button" class="btn btn-success btn-block" id="regBtn" value="注册"></dd>
		</dl>
</div>
<div class="row top">
	<div class="col-md-12">
		<h3><a href="javascript:void(0)">KongMPMS</a></h3>
		<dl class="nav nav-pills navList">
				<dd class="active"><a href="index.php">首页</a></dd>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['frontNav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
				<?php } ?>
				<dd><a href="?a=product&m=show" target="_blank">商城</a></dd>
				<dd><a href="?a=paper&m=show" target="_blank">在线考试</a></dd>
				<?php } else { ?>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd style="border:0"><a href="#">关于我们</a></dd>
				<?php }?>
				<div class="clearfix"></div>
			</dl>
		<ul>
			<li class="memberBar"><a style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>block<?php } else { ?>none<?php }?>" id="sess"><?php echo $_SESSION['oneUserName'];?>
<i class="caret"></i></a></li>
			<li><a href="javascript:void(0)" id="regBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">注册</a></li>
			<li><a href="javascript:void(0)" id="loginBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">登录</a></li>
			<li class="memberBar"><a style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>" id="member"></a></li>
			<dl class="more">
				<dd><a href="javascript:void(0)">demo</a></dd>
				<dd><a href="javascript:void(0)">demo</a></dd>
				<dd><?php if ($_SESSION['id']) {?><a href="?a=user&action=member&id=<?php echo $_SESSION['id'];?>
" id="memberSpace" target="_blank"><?php } else { ?><a href="" id="memberSpace" target="_blank"><?php }?>会员中心</a></dd>
				<dd><a href="?a=home&action=logout">注销</a></dd>
			</dl>
			<div class="clearfix"></div>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="head_bottom">
			<div class="inner"></div>
		</div>
	</div>
</div>
</body>
</html><?php }} ?>
