<?php /* Smarty version Smarty-3.1.19, created on 2015-09-28 22:30:25
         compiled from "/home/xiangruikong/public_html/application/views/admin/readme.html" */ ?>
<?php /*%%SmartyHeaderCode:15866419475539ca8da8ad00-43995713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243d6dd202c6c2efe2b9f30884813b4c299e7520' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/readme.html',
      1 => 1443353479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15866419475539ca8da8ad00-43995713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5539ca8df01879_66515566',
  'variables' => 
  array (
    'feature' => 0,
    'func' => 0,
    'catalogoue' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5539ca8df01879_66515566')) {function content_5539ca8df01879_66515566($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>网站信息</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<body id="readme">
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
<?php if ($_smarty_tpl->tpl_vars['feature']->value) {?>
<div class="row">
	<div class="col-md-12 catalogoue">
	<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li class="active">网站特色</li>
			</ul>
		<ul>
			<li>面向对象</li>
			<li>MVC</li>
			<li>Smarty</li>
			<li>Bootstrap</li>
			<li>单入口</li>
			<li>HMTL5</li>
			<li>CSS3</li>
			<li>Ajax</li>
		</ul>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['func']->value) {?>
<div class="row">
	<div class="col-md-12 catalogoue">
	<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li class="active">网站功能</li>
			</ul>
		<ul>
			<li>评论管理</li>
			<li>广告管理</li>
			<li>导航管理</li>
			<li>文章管理</li>
			<li>网站配置</li>
			<li>管理员管理 </li>
			<li>等级管理 </li>
			<li>权限管理  </li>
		</ul>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['catalogoue']->value) {?>
<div class="row">
	<div class="col-md-12 catalogoue">
	<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li class="active">网站结构</li>
			</ul>
		<ul>
			<li>application
				<ul>
					<li>configs</li>
					<li>controllers</li>
					<li>includes</li>
					<li>models</li>
					<li>run</li>
					<li>src
						<ul>
							<li>admin</li>
							<li>home</li>
						</ul>
					</li>
					<li>ueditor</li>
					<li>views
						<ul>
							<li>admin</li>
							<li>home</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>libs</li>
			<li>public
				<ul>
					<li>fonts</li>
					<li>images</li>
					<li>scripts</li>
					<li>styles</li>
					<li>uploads
						<ul>
							<li>ad</li>
							<li>article</li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
