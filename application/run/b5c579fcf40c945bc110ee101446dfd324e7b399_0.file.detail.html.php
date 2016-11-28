<?php
/* Smarty version 3.1.29, created on 2016-09-09 14:52:56
  from "/data/home/qyu1988070001/htdocs/application/views/home/detail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d25c480e4200_57883574',
  'file_dependency' => 
  array (
    'b5c579fcf40c945bc110ee101446dfd324e7b399' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/detail.html',
      1 => 1473403972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/common.html' => 1,
    'file:home/header.html' => 1,
  ),
),false)) {
function content_57d25c480e4200_57883574 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</title>
<link href="libs/bootstrap/styles/bootstrap.css" rel="stylesheet">
<link href="libs/fontawesome/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/common.css" rel="stylesheet">
<link href="public/styles/header.css" rel="stylesheet">
<link href="public/styles/detail.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="libs/Require/RequireJS.js" data-main='public/scripts/front'><?php echo '</script'; ?>
>
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
	<div class="row">
		<div class="col-md-12" id="breadcrumb">
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
						<div class="jiathis_style_24x24">
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_weixin"></a>
							<a class="jiathis_button_renren"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
							<a class="jiathis_counter_style"></a>
						</div>
					</dd>
				<?php } else { ?>
					<dt class="title">新闻标题</dt>
					<dd class="subtitle">2014年10月09日02:39  新京报 我有话说(2,906人参与) 80人已读</dd>
					<dd>正文</dd>
					<dd class="tag"> 文章关键词：<a href="#">团伙帮派</a>  <a href="#">利益集团 </a> </dd>
					<dd class="share">
					<!-- JiaThis Button BEGIN -->
						<div class="jiathis_style_24x24">
							<a class="jiathis_button_qzone"></a>
							<a class="jiathis_button_tsina"></a>
							<a class="jiathis_button_tqq"></a>
							<a class="jiathis_button_weixin"></a>
							<a class="jiathis_button_renren"></a>
							<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
							<a class="jiathis_counter_style"></a>
						</div>
					<!-- JiaThis Button END -->
					</dd>
				<?php }?>
				</dl>
			</div>
			<div class="comment">
				<dl>
					<dd>	<textarea class="comment_content"></textarea></dd>
					
					<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->id;?>
" id="aid">
					<dd class="text-right"><input type="button" value="发表评论" class="btn btn-success" id="commentBtn"></dd>						
					</dd>
					<dd id="showComment">

					</dd>
				</dl>
			</div>
		</div>			
		<div class="recommend col-md-4">	
			<table class="table table-bordered table-striped table-hover table-condensed">
				<tr><td class="text-center">好 书 推 荐</td></tr>
				<?php
$_from = $_smarty_tpl->tpl_vars['recommend']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_0_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_0_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
				<tr><td class="text-center"><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
"></a></td></tr>
				<tr>	<td class="text-center"><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></td></tr>
				<tr>	<td class="text-center"><?php echo $_smarty_tpl->tpl_vars['value']->value->author;?>
&nbsp;&nbsp;&nbsp;&nbsp;¥&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td></tr>			
				<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_local_item;
}
if ($__foreach_value_0_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_0_saved_item;
}
if ($__foreach_value_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_0_saved_key;
}
?>
			</table>
		</div>
	</div>
</div>
<ul id="indicator">
	<li><span>首页</span><i class="fa fa-home"></i></li>
	<li style="border-bottom:1"><span><a data-toggle="modal" data-target="#reportModal">反馈</a></span><i class="fa fa-comment"></i></li>
	<li style="border-bottom:0" id="up"><span>回到顶部</span><i class="fa fa-chevron-up"></i></li>
</ul>
<?php echo '<script'; ?>
 type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
