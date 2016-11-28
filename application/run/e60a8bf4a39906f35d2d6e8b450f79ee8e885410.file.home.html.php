<?php /* Smarty version Smarty-3.1.19, created on 2015-06-17 10:12:17
         compiled from "C:\xampp\htdocs\KongCELS\application\views\home\home.html" */ ?>
<?php /*%%SmartyHeaderCode:9689557f98a10cf1b3-36571880%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e60a8bf4a39906f35d2d6e8b450f79ee8e885410' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongCELS\\application\\views\\home\\home.html',
      1 => 1434507133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9689557f98a10cf1b3-36571880',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557f98a11f6220_18618858',
  'variables' => 
  array (
    'logged' => 0,
    'banner' => 0,
    'slider' => 0,
    'key' => 0,
    'value' => 0,
    'frontNav' => 0,
    'headline' => 0,
    'LatestUser' => 0,
    'fullcolumn' => 0,
    'focus' => 0,
    'pickup' => 0,
    'subject' => 0,
    'items' => 0,
    'topic' => 0,
    'recommend' => 0,
    'sidebar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f98a11f6220_18618858')) {function content_557f98a11f6220_18618858($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\xampp\\htdocs\\KongCELS\\libs\\plugins\\modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
<meta name="keywords" content="<?php echo @constant('KEY_WORDS');?>
">
<meta name="description" content="<?php echo @constant('DESCRIPTION');?>
">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
</head>
<!-- <?php echo $_smarty_tpl->getSubTemplate ("home/includedemo.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 -->
<body id="home">
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
<div class="container">
	<div class="row">
		<div class="col-md-3 logo"><img src="public/images/logo.png"></div>
		<div class="col-md-9 banner"><?php if ($_smarty_tpl->tpl_vars['banner']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['banner']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['banner']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['banner']->value->description;?>
"></a><?php } else { ?><img src="public/images/bannerDemo.jpg" title="示例Banner"><?php }?></div>
	</div>
	<div class="row">
		<div class="col-md-12 slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators:指示 -->
					<!-- 设置图片的大小 -->
					<ol class="carousel-indicators">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></li>
						<?php } ?>
						<?php }?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
					    <!--一张图片  -->
						<div class="item">
							<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['value']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
"></a>
							<div class="carousel-caption">
								<!-- <h3><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</h3> -->
	                            <p><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</p>
							</div>
						</div>
						<?php } ?>
						<?php } else { ?>
						<div class="item">
							<img src="public/uploads/ad/20140909142825572.jpg" alt="...">
							<div class="carousel-caption">
								<h3>标题</h3>
	                            <p>阿斯顿发第三方</p>
                            </div>
						</div>
						<?php }?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic"
						role="button" data-slide="prev"> <span
						class="glyphicon glyphicon-chevron-left"></span> <span
						class="sr-only">Previous</span>
					</a> <a class="right carousel-control" href="#carousel-example-generic"
						role="button" data-slide="next"> <span
						class="glyphicon glyphicon-chevron-right"></span> <span
						class="sr-only">Next</span>
					</a>
				</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 navList">
			<ul class="nav nav-pills">
				<li class="active"><a href="index.php">首页</a></li>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['frontNav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<li><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></li>
				<?php } ?>
				<li><a href="?a=product&m=show" target="_blank">商城</a></li>
				<li><a href="?a=paper&m=show" target="_blank">在线考试</a></li>
				<?php } else { ?>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li style="border:0"><a href="#">关于我们</a></li>
				<?php }?>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div>
	<div class="row up">
		<div class="col-md-8 headline">
			<dl>
				<?php if ($_smarty_tpl->tpl_vars['headline']->value) {?>
				<dd><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['headline']->value->id;?>
" target="_blank" id="headlineFrame"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['headline']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['headline']->value->title;?>
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
		<div class="col-md-4 member bg-primary">
			<dl class="text-center">
			<?php if ($_smarty_tpl->tpl_vars['LatestUser']->value) {?>
				<dt class="bg-info">最新会员</dt>
				<dd><a href="?a=user&action=member2"><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['LatestUser']->value->icon;?>
"></a></dd>
				<dd class="name bg-info"><a href="?a=user&action=member2&id=<?php echo $_smarty_tpl->tpl_vars['LatestUser']->value->id;?>
" class="text-danger" target="_blank"><?php echo $_smarty_tpl->tpl_vars['LatestUser']->value->username;?>
</a></dd>
			<?php } else { ?>
			<dt class="bg-primary">最新会员</dt>
				<dd><img src="public/images/default.jpg"></dd>
				<dd class="name bg-primary">张三</dd>
			<?php }?>
			</dl>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 fullcolumn"><?php if ($_smarty_tpl->tpl_vars['fullcolumn']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value->description;?>
"></a><?php } else { ?><img src="public/images/fullcolumnDemo.jpg"><?php }?></div>
	</div>
	<div class="row middle">
		<div class="col-md-8">
		<?php if ($_smarty_tpl->tpl_vars['focus']->value) {?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['focus']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['focus']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['focus']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['focus']->value->title;?>
</a></h2></td><td style="width:70px;"><span><a href="#"></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['focus']->value->lead,120,"...");?>
</td></tr>
		</table>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['pickup']->value) {?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['pickup']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['pickup']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['pickup']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pickup']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['pickup']->value->lead,120,"...");?>
</td></tr>
		</table>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		</div>
		<div class="col-md-4 vote">
			<dl>
			<div id="voteFeedback"></div>
			<form action="home.php" method="post">
				<dt class="text-center text-success"><?php if ($_smarty_tpl->tpl_vars['subject']->value) {?><?php echo $_smarty_tpl->tpl_vars['subject']->value->title;?>
<?php } else { ?>投票主题<?php }?></dt>
				<?php if ($_smarty_tpl->tpl_vars['items']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<dd><i class="fa fa-dot-circle-o"></i><input type="radio" name="vote" id="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"><label for="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</label></dd>
				<?php } ?>
				<?php } else { ?>
				<dd><input type="radio" name="vote">一</dd>
				<?php }?>
				<dd class="text-center"><input type="submit" id="voteBtn" name="send" class="btn btn-success" value="投票">&nbsp;&nbsp;<a href="javascript:void(0)" url="?a=vote&action=showResult&id=<?php echo $_smarty_tpl->tpl_vars['subject']->value->id;?>
" id="showBtn" target="_blank">查看投票结果</a></dd>
			</form>
			</dl>
		</div>
	</div>
	<div class="row down">
		<div class="col-md-8">
		<?php if ($_smarty_tpl->tpl_vars['topic']->value) {?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['topic']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['topic']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['topic']->value->lead,120,"...");?>
</td></tr>
			</table>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2" class="newscontent">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['recommend']->value) {?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['recommend']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['recommend']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['recommend']->value->lead,120,"...");?>
</td></tr>
			</table>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/0.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		</div>
		<div class="col-md-4 sidebar"><?php if ($_smarty_tpl->tpl_vars['sidebar']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['sidebar']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['sidebar']->value->description;?>
"></a><?php } else { ?><img src="public/images/sidebarDemo.jpg"><?php }?></div>
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
<ul class="sidebarFloat">
	<li><a href="mailto:kongxiangrui@gmail.com"><i class="fa fa-envelope" title="反馈"></i></a></li>
	<li class="backTop" title="回到顶部"><i class="fa fa-angle-up"></i></li>
</ul>
</body>
</html><?php }} ?>
