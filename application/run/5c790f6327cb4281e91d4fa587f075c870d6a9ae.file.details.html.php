<?php /* Smarty version Smarty-3.1.19, created on 2015-09-25 10:20:23
         compiled from "/home/xiangruikong/public_html/application/views/home/details.html" */ ?>
<?php /*%%SmartyHeaderCode:122411180454636cfbe81010-26669557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c790f6327cb4281e91d4fa587f075c870d6a9ae' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/details.html',
      1 => 1443147588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122411180454636cfbe81010-26669557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54636cfbf00c63_33128712',
  'variables' => 
  array (
    'oneArticle' => 0,
    'mainNav' => 0,
    'subNav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54636cfbf00c63_33128712')) {function content_54636cfbf00c63_33128712($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">

<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/comment.js"></script>
</head>
<body id="home">
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
<div id="feedback"></div>
<div id="mask"></div><i class="fa fa-spinner fa-spin loading"></i>
<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding:0">
		<ul class="breadcrumb" style="background:url(public/images/topbar_bg.gif)">
			<li><a href='index.php'>首页</a></li>
		<?php if ($_smarty_tpl->tpl_vars['mainNav']->value) {?>
			<li><a href='?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['mainNav']->value->name;?>
</a></li>
			<li><a href="?a=subnavdetail&action=show&name=<?php echo $_smarty_tpl->tpl_vars['subNav']->value->name;?>
&father=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->name;?>
&fid=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['subNav']->value->name;?>
</a></li>
		<?php } else { ?>
			<li><a href='?a=subnav&action=show'>主导航</a></li>
			<li><a href='?a=subnavdetail&action=show'>子导航</a></li>
		<?php }?>
			<li class="active">正文</a></li>
		</ul>
			<div class="article">
				<dl>
				<?php if ($_smarty_tpl->tpl_vars['oneArticle']->value) {?>
				<dt class="title"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</dt>
					<dd class="subtitle"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->date;?>
  <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->source;?>
  <a href="#">我有话说(2,906人参与)</a> <?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->pageview;?>
人已读</dd>
					<?php if ($_smarty_tpl->tpl_vars['oneArticle']->value->lead) {?><dd class="lead"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->lead;?>
</dd><?php }?>
					<dd class="content"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->content;?>
</dd>
					<dd class="tag"> 文章关键词：<a href="#"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->tag;?>
</a></dd>
					<dd class="share">
					<div class="bshare-custom icon-medium"><a title="分享到QQ空間" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人網" class="bshare-renren"></a><a title="分享到騰訊微博" class="bshare-qqmb"></a><a title="分享到網易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.com/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=3&amp;lang=zh_TW"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.com/b/bshareC0.js"></script>
					</dd>
				<?php } else { ?>
					<dt class="title">新闻标题</dt>
					<dd class="subtitle">2014年10月09日02:39  新京报 我有话说(2,906人参与) 80人已读</dd>
					<dd>正文</dd>
					<dd class="tag"> 文章关键词：<a href="#">团伙帮派</a>  <a href="#">利益集团 </a> </dd>
					<dd class="share">
					<div class="bshare-custom icon-medium"><a title="分享到QQ空間" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人網" class="bshare-renren"></a><a title="分享到騰訊微博" class="bshare-qqmb"></a><a title="分享到網易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.com/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=3&amp;lang=zh_TW"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.com/b/bshareC0.js"></script>
					</dd>
				<?php }?>
				</dl>
			</div>
			<div class="comment">
				<dl>
					<dd><div class="alert alert-danger" style="display:none;"></div></dd>
					<dd class="post">					
					<?php if ($_SESSION['oneUserName']->username) {?><strong><span class="text-danger user" id="member"><?php echo $_SESSION['oneUserName']->username;?>
</span>&nbsp;&nbsp;&nbsp;<a href="?a=home&action=logout">注销</a></strong><?php } else { ?><strong><span class="text-danger user" id="member"></span>&nbsp;&nbsp;&nbsp;<a href="?a=home&action=logout" id="logout"></a></strong><?php }?>
						<textarea class="form-control" id="content"></textarea>
						<input type="hidden" id="aid" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->id;?>
">
						<input type="hidden" id="icon" value="<?php echo $_SESSION['oneUserName']->icon;?>
">
						<input type="hidden" id="uid" value="<?php echo $_SESSION['oneUserName']->id;?>
">
						<input type="button" value="发表评论" class="btn btn-success commentBtn">						
						<div class="clearfix"></div>
					</dd>
					<dd id="showComment">

					</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
<ul id="indicator">
	<li><span>首页</span><i class="fa fa-home"></i></li>
	<li style="border-bottom:1"><span><a href="mailto:xiangrui@live.com">反馈</a></span><i class="fa fa-reply"></i></li>
	<li style="border-bottom:0" id="up"><span>回到顶部</span><i class="fa fa-chevron-up"></i></li>
</ul>
</body>
</html><?php }} ?>
