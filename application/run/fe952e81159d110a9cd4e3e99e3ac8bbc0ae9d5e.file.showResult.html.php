<?php /* Smarty version Smarty-3.1.19, created on 2015-02-15 14:48:41
         compiled from "/home/xiangruikong/public_html/application/views/home/showResult.html" */ ?>
<?php /*%%SmartyHeaderCode:10086140105466ae416a9a48-70545435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe952e81159d110a9cd4e3e99e3ac8bbc0ae9d5e' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/showResult.html',
      1 => 1419259692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10086140105466ae416a9a48-70545435',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5466ae417be8e9_79841306',
  'variables' => 
  array (
    'oneSubject' => 0,
    'showResult' => 0,
    'data' => 0,
    'value' => 0,
    'key' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5466ae417be8e9_79841306')) {function content_5466ae417be8e9_79841306($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneSubject']->value->title;?>
</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['showResult']->value) {?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped table-hover table-condensed">
				<caption class="h4">投票结果</caption>
				<tr class="text-center"><td colspan="4">投票主题:<span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['oneSubject']->value->title;?>
</span></td></tr>
				<tr>
					<td>投票项</td>
					<td width=330>比例</td>
					<td>百分比</td>
					<td>票数</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
					<td>
						<span class="voteBg"><span class="progress-bar progress-bar-striped <?php echo $_smarty_tpl->tpl_vars['class']->value[$_smarty_tpl->tpl_vars['key']->value];?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['value']->value->percent;?>
%"><?php echo $_smarty_tpl->tpl_vars['value']->value->percent;?>
</span></span>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->percent;?>
%</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->amount;?>
</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr><td colspan="4">暂无投票</td></tr>
				<?php }?>
			</table>
		</div>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
