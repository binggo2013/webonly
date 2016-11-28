<?php
/* Smarty version 3.1.29, created on 2016-08-14 10:42:33
  from "/data/home/qyu1988070001/htdocs/application/views/home/subnavdetail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57afda9989aa35_24754225',
  'file_dependency' => 
  array (
    '475164c361d044015430c1ee837ba7daaaa59f62' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/subnavdetail.html',
      1 => 1447292383,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_57afda9989aa35_24754225 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
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
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/home.js"><?php echo '</script'; ?>
>
<link href="public/styles/home.css" rel="stylesheet">
</head>
<body id="home">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
		<?php
$_from = $_smarty_tpl->tpl_vars['articles']->value;
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
		<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['value']->value->thumbnail;?>
"></a></td><td class="newstitle"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,20,"...");?>
</a></td></tr>
				<tr><td colspan="2" class="newscontent"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->lead,120,"...");?>
</td></tr>
		</table>
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
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
