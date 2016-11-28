<?php /* Smarty version Smarty-3.1.19, created on 2015-06-16 11:32:12
         compiled from "C:\xampp\htdocs\KongCELS\application\views\admin\index.html" */ ?>
<?php /*%%SmartyHeaderCode:9855557f98bc8fd3b9-67700636%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd567df5056274cb9fdfcfe49e3a8cae1803b4129' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongCELS\\application\\views\\admin\\index.html',
      1 => 1433863607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9855557f98bc8fd3b9-67700636',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557f98bc944314_46222396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f98bc944314_46222396')) {function content_557f98bc944314_46222396($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<script src="public/scripts/jquery-1.10.2.js"></script>
		<script src="public/scripts/bootstrap.js"></script>
		<link href="public/styles/bootstrap.css" rel="stylesheet" />
		<link href="public/styles/font-awesome.css" rel="stylesheet" />
		<script src="public/scripts/admin.js"></script>
		<link href="public/styles/admin.css" rel="stylesheet">
		<title>KongCMS后台首页</title>
	</head>
	<body>
		<div class="container">
			<div class="row top">
				<div class="col-md-4">KongCMS后台管理系统</div>
				<div class="col-md-8 memberInfo">
					<dl>
						<dd><a href="index.php?a=admin&action=logout" title="注销"><i class="fa fa-sign-out"></i></a><i class="fa fa-user"> <?php echo $_SESSION['username'];?>
</i></dd>
						<dd>
							<ul><span class="fa fa-caret-up"></span>
								<li class="text-primary">管理员等级:<?php echo $_SESSION['oneAdmin']->name;?>
<i class="fa fa-times closeBtn"></i></li>
								<li class="text-primary">登录次数:<?php echo $_SESSION['oneAdmin']->login_num;?>
</li>
								<li class="text-primary">登录时间:<?php echo $_SESSION['oneAdmin']->last_time;?>
</li>
								<li class="text-primary">登录IP:<?php echo $_SESSION['oneAdmin']->last_ip;?>
</li>
							</ul>
						</dd>
						<dd><a href='index.php' target="_blank"><i class="fa fa-home front" title="首页"></i></a></dd>
					</dl>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 menu">
					<div class="panel-group" id="accordion">
			<div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title text-center"><a data-parent="#accordion" href="#collapseOne"><i class="fa fa-home adminFront"></i><a href="?a=admin&action=welcome" target="main">后台首页</a></h4>
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
        	<li><a href="?a=vote&action=showSubject" target="main">投票管理</a></li>
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
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="glyphicon glyphicon-cog"></i> 系统管理</a></h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
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
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-info-circle"></i> 网站帮助</a></h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
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
					<iframe src="?a=admin&action=welcome" name="main" scrolling="yes"></iframe>
				</div>
			</div>
		</div>


	</body>
</html>
<?php }} ?>
