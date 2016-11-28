<?php /* Smarty version Smarty-3.1.19, created on 2016-06-29 14:46:18
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/index.html" */ ?>
<?php /*%%SmartyHeaderCode:140928896564739a66a9814-04840688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba5f78f789319cb5784c780238b51fe9e2005c3a' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/index.html',
      1 => 1467182773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140928896564739a66a9814-04840688',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564739a671fd97_46711342',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564739a671fd97_46711342')) {function content_564739a671fd97_46711342($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="public/scripts/jquery-1.10.2.js"></script>
		<script src="public/scripts/bootstrap.js"></script>
		<link href="public/styles/bootstrap.css" rel="stylesheet" />
		<link href="public/styles/font-awesome.css" rel="stylesheet" />
		<!-- <script src="public/scripts/admin.js"></script> -->
		<link href="public/styles/admin.css" rel="stylesheet">
		<title><?php echo @constant('SITE_NAME');?>
后台首页</title>
	</head>
	<body>
<div id="mask"></div>
		<div class="container">
			<div class="row top">
				<div class="col-md-4">后台管理</div>
<div class="col-md-8 memberInfo">
					<dl>
<dd>
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuDivider" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <span class="glyphicon glyphicon-user"></span>
    <?php echo $_SESSION['username'];?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuDivider">
    <li><a href="#">管理员等级:<?php echo $_SESSION['oneAdmin']->name;?>
</a></li>
    <li role="separator" class="divider"></li>
	<li><a href="#">登录次数:<?php echo $_SESSION['oneAdmin']->login_num;?>
</a></li>
    <li role="separator" class="divider"></li>
	<li><a href="#">登录时间:<?php echo $_SESSION['oneAdmin']->last_time;?>
</a></li>
	<li role="separator" class="divider"></li>
	<li><a href="#">登录IP:<?php echo $_SESSION['oneAdmin']->last_ip;?>
</a></li>
	<li role="separator" class="divider"></li>
    <li><a href="?a=index&action=logout">注销</a></li>
  </ul>
</div>
</dd>
<dd><a href='index.php' target="_blank" class="home"><i class="glyphicon glyphicon-home" title="首页"></i></a></dd>
</dl>
</div>
			</div>
			<div class="row">
				<div class="col-md-2 menu">
					<div class="panel-group" id="accordion">
			<div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title text-center"><a data-parent="#accordion" href="#collapseOne"><i class="fa fa-home adminFront"></i><a href='?a=index&action=welcome' target="main">后台首页</a></h4>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-edit"></i> 内容管理</a></h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=ad&action=show" target="main">广告管理</a></li>
        	<li><a href="?a=nav&action=showMainNav" target="main">导航管理</a></li>
        	<li><a href="?a=comment&action=adminShow" target="main">评论管理</a></li>
        	<li><a href="?a=article&action=show" target="main">文章管理</a></li> 
        	<li><a href="?a=dict&action=admin" target="main">字典管理</a></li> 
        	<li><a href="?a=feedback&action=admin" target="main">用户反馈</a></li>         	
        </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center"><a data-toggle="collapse" data-parent="#accordion" href="#download"><i class="fa fa-download"></i> 下载管理</a></h4>
    </div>
    <div id="download" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=topic&action=show" target="main">下载主题</a></li>
        	<li><a href="?a=download&action=show" target="main">下载内容</a></li>        	     	
        </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-user"></i> 管理员管理</a></h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=permission&action=show" target="main">权限管理</a></li>
        	<li><a href="?a=level&action=show" target="main">等级管理</a></li>
        	<li><a href="?a=admin&action=show" target="main">管理员管理</a></li>
        	<li><a href="?a=user&action=show" target="main">前台会员管理</a></li>
        </ul>
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="glyphicon glyphicon-shopping-cart"></i> 商品管理</a></h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=category&action=show" target="main">商品分类</a></li>
        	<li><a href="?a=product&m=adminShow" target="main">商品管理</a></li>
        	<li><a href="?a=order&action=show" target="main">订单管理</a></li>
        </ul>
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="glyphicon glyphicon-time"></i> 学习管理</a></h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=learning&action=showCourse" target="main">课程管理</a></li>
        	<li><a href="?a=learning&action=showChoice" target="main">选择题管理</a></li>
        	<li><a href="?a=learning&action=showJudge" target="main">判断题管理</a></li>
        	<li><a href="?a=learning&action=showExam" target="main">试卷管理</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><i class="fa fa-comments"></i> 问答管理</a></h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=ask&action=show" target="main">问答管理</a></li>
        	<li><a href="?a=setting&action=backup" target="main">数据库备份</a></li>
        	<li><a href="#">待定配置</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><i class="glyphicon glyphicon-cog"></i> 系统管理</a></h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=setting&action=config" target="main">网站配置</a></li>
        	<li><a href="?a=setting&action=backup" target="main">数据库备份</a></li>
        	<li><a href="#">待定配置</a></li>
        </ul>
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title text-center">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><i class="fa fa-info-circle"></i> 网站帮助</a></h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
      <div class="panel-body">
        <ul>
        	<li><a href="?a=readme&action=catalogoue" target="main">目录结构</a></li>
        	<li><a href="?a=readme&action=func" target="main">基本功能</a></li>
        	<li><a href="?a=readme&action=feature" target="main">KongCMS特色</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
				</div>
				<div class="col-md-10 rightFrame">
					<iframe src="?a=index&action=welcome" name="main" scrolling="yes" id="mainFrame"></iframe>
				</div>
			</div>
	<div class="row">
		<div class="col-md-12 footer">
			<dl>
				<dd>
				<a href="javascript:void(0)">关于我们</a> |
				<a href="javascript:void(0)">About WEBONLY</a> |
				<a href="javascript:void(0)">服务协议</a> |
				<a href="javascript:void(0)">隐私政策</a> |
				<a href="javascript:void(0)">开放平台</a> |
				<a href="javascript:void(0)">广告服务</a> |
				<a href="javascript:void(0)">招聘</a> |
				<a href="javascript:void(0)">公益</a> |
				<a href="javascript:void(0)">客服中心</a> |
				<a href="javascript:void(0)">网站导航 </a></dd>
				<dd>Copyright © 1998 - 2014 Webonly. All Rights Reserved</dd>
				<dd> WB公司 版权所有 </dd>
			</dl>
		</div>
	</div>
		</div>
	</body>
</html>
<?php }} ?>
