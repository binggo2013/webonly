<?php /* Smarty version Smarty-3.1.19, created on 2015-10-07 14:39:34
         compiled from "/home/xiangruikong/public_html/application/views/home/header.html" */ ?>
<?php /*%%SmartyHeaderCode:69676415559bbe7eaf2923-35419652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73c374e219e78b9bbbf84ee52e0a0d4ad2df149e' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/header.html',
      1 => 1444199968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69676415559bbe7eaf2923-35419652',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559bbe7eb58164_99848682',
  'variables' => 
  array (
    'frontNav' => 0,
    'value' => 0,
    'logged' => 0,
    'oneUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559bbe7eb58164_99848682')) {function content_559bbe7eb58164_99848682($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
</head>
<body>
<!-- <div class="alert alert-warning alert-dismissible fade in introduction text-center" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <span>为了保证最佳的使用体验，请使用Chrome浏览器浏览。</span>
</div> -->
<div id="mask"></div><i class="fa fa-spinner fa-spin loading"></i>
<!-- 登录界面-->
	<div id="login" class="panel panel-default">
		<i class="fa fa-times closeBar"></i>
		<div class="panel-heading">
			<strong>登录到WEBONLY</strong>
		</div>
		<div class="alert alert-danger feedback text-danger text-center center-block" role="alert">...</div>
		<div class="panel-body">
			<div class="row">
				<div class="center-block">
					<img class="img-circle center-block" src="public/images/default.jpg" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-10  col-md-offset-1 ">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<i class="glyphicon glyphicon-user"></i>
							</span>
							<input class="form-control" placeholder="用户名"	id="login_username" name="loginname" type="text" autofocus>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"> <i
								class="glyphicon glyphicon-lock"></i>
							</span> <input class="form-control" placeholder="密码"
								id="login_pwd" name="password" type="password" value="">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block"
							id="loginBtn" value="登 录">
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer ">
			还没有帐号! <a href="?a=reg&m=show"> 这儿注册 </a>
		</div>
	</div>
<!--登录界面结束  -->
<div class="row top">
	<div class="col-md-12">
		<h3><a href="?"><img src="public/images/kong.jpg" class="img-circle icon" title="kong"></a></h3>
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
				<!-- <dd><a href="?a=product&m=show" target="_blank">商城</a></dd> -->
				<!-- <dd><a href="?a=paper&m=show" target="_blank">在线考试</a></dd> -->
				<dd><a href="?a=ask&m=AllAsk" target="_blank">问答</a></dd>
				<dd><a href="?a=download&m=AllDownload" target="_blank" style="color:red;">下载</a></dd>
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
<div class="dropdown clearfix memberMenu2" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>block<?php } else { ?>none<?php }?>" id="sess">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php echo $_SESSION['oneUserName']->username;?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
    <li><a href="#">点数:<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->countdown;?>
</a></li>
    <li role="separator" class="divider"></li>
    <li><?php if ($_SESSION['oneUserName']->id) {?><a href="?a=member&action=show&id=<?php echo $_SESSION['oneUserName']->id;?>
" id="memberSpace" target="_blank"><?php } else { ?><a href="" id="memberSpace" target="_blank"><?php }?>会员中心</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="?a=home&action=logout">注销</a></li>
  </ul>
</div>
		<ul>
			<li><a href="?a=reg&m=show" id="regBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">注册</a></li>
			<li><a href="javascript:void(0)" id="loginBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">登录</a></li>
<div class="dropdown clearfix memberMenu" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>" id="member">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class='getName'></span>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
    <li><a href="#" id="countdownBox"></a></li>
    <li role="separator" class="divider"></li>
    <li><?php if ($_SESSION['oneUserName']->id) {?><a href="?a=member&action=show&id=<?php echo $_SESSION['oneUserName']->id;?>
" id="memberSpace" target="_blank"><?php } else { ?><a href="" id="memberSpace2" target="_blank"><?php }?>会员中心</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="?a=home&action=logout">注销</a></li>
  </ul>
</div>
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
