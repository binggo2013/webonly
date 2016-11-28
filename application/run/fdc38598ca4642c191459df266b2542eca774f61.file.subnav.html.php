<?php /* Smarty version Smarty-3.1.19, created on 2015-07-01 10:29:06
         compiled from "C:\xampp\htdocs\KongMPS\application\views\home\subnav.html" */ ?>
<?php /*%%SmartyHeaderCode:29957559350725771d5-79523828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdc38598ca4642c191459df266b2542eca774f61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongMPS\\application\\views\\home\\subnav.html',
      1 => 1433863607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29957559350725771d5-79523828',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oneNav' => 0,
    'headline' => 0,
    'articles' => 0,
    'kk' => 0,
    'vv' => 0,
    'value' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559350725f5e80_03861159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559350725f5e80_03861159')) {function content_559350725f5e80_03861159($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\xampp\\htdocs\\KongMPS\\libs\\plugins\\modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
</title>
<meta name="keywords" content="<?php echo @constant('KEY_WORDS');?>
">
<meta name="description" content="<?php echo @constant('DESCRIPTION');?>
">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
</head>
<body id="home">
<div class="container subnav">
	<div class="row">
		<div class="col-md-12" style="padding:0;">
		<ul class="breadcrumb" style="background:url(public/images/topbar_bg.gif)">
			<li><a href='index.php'>首页</a></li>
			<li class="active"><?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
</li>
		</ul>
		</div>
	</div>
	<div class="row up">
		<div class="col-md-8 headline">
			<dl>
				<?php if ($_smarty_tpl->tpl_vars['headline']->value) {?>
				<dd><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['headline']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['headline']->value->thumbnail;?>
"></a></dd>
				<dd><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['headline']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['headline']->value->title,20,"...");?>
</a></h2><span><a href="#"><i class="fa fa-share-alt"></i></a><br><a href="#"><i class="fa fa-comment-o"></i></a></span></dd>
				<?php } else { ?>
				<dd><img src="public/images/headline.jpg"></dd>
				<dd><h2><a href="#">新闻标题</a></h2></dd>
				<?php }?>
			</dl>
		</div>
		<div class="col-md-4 demo">
			<img src="public/images/sidebarDemo.jpg">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 articleList">
		<?php if ($_smarty_tpl->tpl_vars['articles']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value) {
$_smarty_tpl->tpl_vars['vv']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['vv']->key;
?>
		<a href="?a=subnavdetail&action=show&name=<?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
&father=<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
&fid=<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->id;?>
" class="btn btn-block" style="background:url(public/images/topbar_bg.gif)"><?php echo $_smarty_tpl->tpl_vars['kk']->value;?>
<i class="fa fa-angle-double-right"></i></a>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vv']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['value']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr><td rowspan="2" style="width:120px;" ><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['v']->value->thumbnail;?>
"></a></td><td class="newstitle"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->title,20,"...");?>
</a></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->lead,120,"...");?>
</td></tr>
		</table>
		<?php } ?>
		<?php } else { ?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg"></td><td><h2><a href="#">示例文章</a></h2></td><td style="width:70px;">22</td></tr>
			<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
		</table>
		<?php }?>
		<?php } ?>
		<?php } ?>

		<?php } else { ?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg"></td><td><h2><a href="#">示例文章</a></h2></td><td style="width:70px;">22</td></tr>
			<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
		</table>
		<?php }?>
		</div>
		<div class="col-md-4 demo2">
			<img src="public/images/demo2.jpg">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 footer">
			<dl>
				<dd> 关于腾讯 | About Tencent | 服务协议 | 隐私政策 | 开放平台 | 广告服务 | 腾讯招聘 | 腾讯公益 | 客服中心 | 网站导航 </dd>
				<dd>Copyright © 1998 - 2014 Tencent. All Rights Reserved</dd>
				<dd> 腾讯公司 版权所有 </dd>
			</dl>
		</div>
	</div>
</div>
</body>
</html><?php }} ?>
