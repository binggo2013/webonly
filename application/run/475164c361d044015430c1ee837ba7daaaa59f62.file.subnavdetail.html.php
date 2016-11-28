<?php /* Smarty version Smarty-3.1.19, created on 2015-11-13 17:38:39
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/subnavdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:12257268835645af9f6ef5c6-90609188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475164c361d044015430c1ee837ba7daaaa59f62' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/subnavdetail.html',
      1 => 1447292383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12257268835645af9f6ef5c6-90609188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oneNav' => 0,
    'fid' => 0,
    'father' => 0,
    'headline' => 0,
    'articles' => 0,
    'value' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5645af9f7be997_62194021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645af9f7be997_62194021')) {function content_5645af9f7be997_62194021($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
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
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container subnav">
<div class="row">
	<div class="col-md-12" style="padding:0;">
		<ul class="breadcrumb" style="background:url(public/images/topbar_bg.gif)">
			<li><a href='index.php'>首页</a></li>
			<li><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['fid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['father']->value;?>
</a></li>
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
		<div class="col-md-8 middle">
		<?php if ($_smarty_tpl->tpl_vars['articles']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['value']->value->thumbnail;?>
"></a></td><td class="newstitle"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,20,"...");?>
</a></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->lead,120,"...");?>
</td></tr>
		</table>
		<?php } ?>
		<?php } else { ?>
		<table border="0" cellspacing="0" cellpadding="0">
			<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/default.jpg"></td><td><h2><a href="#">示例文章</a></h2></td><td style="width:70px;">22</td></tr>
			<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
		</table>
		<?php }?>
		<div class="row page">
			<div class="col-md-12"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
		</div>
		</div>
		<div class="col-md-4 demo2">
			<img src="public/images/demo2.jpg">
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>
