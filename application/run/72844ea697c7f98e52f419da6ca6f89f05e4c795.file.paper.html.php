<?php /* Smarty version Smarty-3.1.19, created on 2015-09-10 09:15:58
         compiled from "/home/xiangruikong/public_html/application/views/home/paper.html" */ ?>
<?php /*%%SmartyHeaderCode:1306254895559bbeb8edd9a4-74794781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72844ea697c7f98e52f419da6ca6f89f05e4c795' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/paper.html',
      1 => 1441847549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1306254895559bbeb8edd9a4-74794781',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559bbeb90057a8_95240949',
  'variables' => 
  array (
    'show' => 0,
    'allCourse' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559bbeb90057a8_95240949')) {function content_559bbeb90057a8_95240949($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>quzi</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<link href="public/styles/paper.css" rel="stylesheet">
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-10 allCourse">
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allCourse']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<dl>
				<dt class="btn btn-success"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</dt>
				<dd><a href="?a=quiz&m=show&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">参加</a></dd>
			</dl>
			<?php } ?>
		</div>
		<div class="col-md-2">
			coming soon
		</div>
	</div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>
