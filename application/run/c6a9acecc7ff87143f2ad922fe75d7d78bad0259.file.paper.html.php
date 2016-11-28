<?php /* Smarty version Smarty-3.1.19, created on 2015-07-01 14:44:05
         compiled from "C:\xampp\htdocs\KongMPMS\application\views\home\paper.html" */ ?>
<?php /*%%SmartyHeaderCode:602755938a6485d608-53289785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6a9acecc7ff87143f2ad922fe75d7d78bad0259' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongMPMS\\application\\views\\home\\paper.html',
      1 => 1435733042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '602755938a6485d608-53289785',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55938a648adfa0_04596138',
  'variables' => 
  array (
    'show' => 0,
    'allCourse' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55938a648adfa0_04596138')) {function content_55938a648adfa0_04596138($_smarty_tpl) {?><!DOCTYPE html>
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
