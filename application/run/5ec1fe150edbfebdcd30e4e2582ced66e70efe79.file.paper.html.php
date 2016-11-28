<?php /* Smarty version Smarty-3.1.19, created on 2015-06-15 11:32:26
         compiled from "C:\xampp\htdocs\quiz\application\views\home\paper.html" */ ?>
<?php /*%%SmartyHeaderCode:31358557e4718b90b16-99764435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ec1fe150edbfebdcd30e4e2582ced66e70efe79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\home\\paper.html',
      1 => 1434339143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31358557e4718b90b16-99764435',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557e4718be4464_89179190',
  'variables' => 
  array (
    'show' => 0,
    'allCourse' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557e4718be4464_89179190')) {function content_557e4718be4464_89179190($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>quzi</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<style>
.allCourse dl{
	border:1px solid #ddd;
	width:100px;
	text-align:center;
	float:left;
	margin-left:25px;
	box-shadow:0 0 8px #ddd;
}
</style>
</head>
<body>
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
</div>
</body>
</html><?php }} ?>
