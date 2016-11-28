<?php /* Smarty version Smarty-3.1.19, created on 2016-06-27 22:00:14
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/details.html" */ ?>
<?php /*%%SmartyHeaderCode:1423143186564546a9531987-21418672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '042536df8d90a221726e6e8882548ffb7602aabf' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/details.html',
      1 => 1467036011,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1423143186564546a9531987-21418672',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564546a9601f97_08743830',
  'variables' => 
  array (
    'oneArticle' => 0,
    'mainNav' => 0,
    'subNav' => 0,
    'recommend' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564546a9601f97_08743830')) {function content_564546a9601f97_08743830($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/detail.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/comment.js"></script>
</head>
<body id="home">
	<!-- reportModal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-top:5px;padding-bottom:5px;text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">感谢您的反馈</h2>
      </div>
      <div class="modal-body" style="padding-bottom:5px;">
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-user"></i>
				</span>
				<input class="form-control" placeholder="用户名"	id="username" type="text" autofocus>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				<i class="glyphicon glyphicon glyphicon-envelope"></i>
				</span> 
				<input class="form-control" placeholder="任意的联系方式" id="contact" name="password" type="password" value="">
			</div>
		</div>
		<div class="form-group" style="margin-bottom:5px;">
			<div class="input-group">
				<span class="input-group-addon">
				<i class="glyphicon glyphicon glyphicon-book"></i>
				</span> 
				<textarea class="form-control" id="reportWord" style="height:50px;"></textarea>
			</div>
		</div>
		<div class="form-group" style="margin-bottom:0;">
			<div class="input-group" style="margin:auto;">
				<span class="">
				<i></i>
				</span> 
				<button class="btn btn-primary" id="reportBar">提 交</button>
			</div>
		</div>
      </div>
      <div class="modal-footer" style="padding-top:5px;padding-bottom:5px;">
        <a>Thanks For Your Feedback</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal开始 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" id="loginBox">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">欢 迎 登 陆</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="alert alert-danger feedback"></div>
            	</div>
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
						<div class="form-group loginBtn">
							<input type="submit" class="btn btn-lg btn-primary btn-block"
								id="loginBtn" value="登 录">
						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                	还没有帐号! <a href="?a=reg&m=show"> 这儿注册 </a>
            </div>
        </div>
    </div>
</div>
<!-- Modal结束 -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-8" style="padding:0">		
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
					<dd class="post">					
					<strong class="memberUI"><span class="text-danger user" id="member"></span>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="logoutBar">注销</a></strong>
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
		<div class="recommend col-md-4">	
			<dl>
				<dt class="text-center bg-info">好 书 推 荐</dt>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommend']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd class="text-center">
					<a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
"></a>
					<div class="text-center text-primary"><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></div>
					<div class="text-center text-info"><?php echo $_smarty_tpl->tpl_vars['value']->value->author;?>
&nbsp;&nbsp;&nbsp;&nbsp;¥&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</div>
				</dd>				
				<?php } ?>
			</dl>
		</div>
	</div>
</div>
<ul id="indicator">
	<li><span>首页</span><i class="fa fa-home"></i></li>
	<li style="border-bottom:1"><span><a data-toggle="modal" data-target="#reportModal">反馈</a></span><i class="fa fa-comment"></i></li>
	<li style="border-bottom:0" id="up"><span>回到顶部</span><i class="fa fa-chevron-up"></i></li>
</ul>
</body>
</html><?php }} ?>
