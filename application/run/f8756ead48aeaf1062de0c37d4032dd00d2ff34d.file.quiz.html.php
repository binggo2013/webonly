<?php /* Smarty version Smarty-3.1.19, created on 2015-06-15 11:32:30
         compiled from "C:\xampp\htdocs\quiz\application\views\home\quiz.html" */ ?>
<?php /*%%SmartyHeaderCode:20221557e474e62b086-50393555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8756ead48aeaf1062de0c37d4032dd00d2ff34d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\home\\quiz.html',
      1 => 1434087984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20221557e474e62b086-50393555',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'choices' => 0,
    'key' => 0,
    'value' => 0,
    'judges' => 0,
    'k' => 0,
    'v' => 0,
    'result' => 0,
    'choiceOutput' => 0,
    'judgeOutput' => 0,
    'total' => 0,
    'ticked' => 0,
    'resultNum' => 0,
    'resultNum2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557e474e6af1c0_13726619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557e474e6af1c0_13726619')) {function content_557e474e6af1c0_13726619($_smarty_tpl) {?><!DOCTYPE html>
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
dd{
	margin-left:20px;
}
.right{
	color:green;
	font-weight:bold;
}
.wrong{
	color:red;
	font-weight:bold;
}
</style>
</head>
<body>
<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-10">
		<form method="post" action="?a=quiz&m=result">
			<dl><h1>选择题</h1>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dt><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
</dt>
				<dd><input type="hidden" name='choice<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
'/></dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='A'/><?php echo $_smarty_tpl->tpl_vars['value']->value->a;?>
</dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='B'/><?php echo $_smarty_tpl->tpl_vars['value']->value->b;?>
</dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='C'/><?php echo $_smarty_tpl->tpl_vars['value']->value->c;?>
</dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='D'/><?php echo $_smarty_tpl->tpl_vars['value']->value->d;?>
</dd>
				<?php } ?>
			</dl>
			<dl><h1>判断题</h1>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['judges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<dt><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['v']->value->question;?>
</dt>
				<dd><input type="hidden" name='judge<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
'/></dd>
				<dd>
					正确：<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="1"/>
					错误：<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="0"/>
				</dd>
				<?php } ?>
			</dl>
			<span>
				<input type="hidden" name="choiceNum" value="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
">
				<input type="hidden" name="judgeNum" value="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
			</span>
			<div><input type="submit" name="send" value="提交"></div>
		</form>
		</div>
		<div class="col-md-2">
			coming soon
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['result']->value) {?>
<div class='row'>
	<div class="col-md-10">
	<dl><h1>选择题</h1>
		<?php echo $_smarty_tpl->tpl_vars['choiceOutput']->value;?>

	</dl>
	<dl><h1>判断题</h1>
		<?php echo $_smarty_tpl->tpl_vars['judgeOutput']->value;?>

	</dl>
	<div>共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
道题，做了<?php echo $_smarty_tpl->tpl_vars['ticked']->value;?>
道题,对了<?php echo $_smarty_tpl->tpl_vars['resultNum']->value+$_smarty_tpl->tpl_vars['resultNum2']->value;?>
题，得分<?php echo $_smarty_tpl->tpl_vars['resultNum']->value*10+$_smarty_tpl->tpl_vars['resultNum2']->value*10;?>
分</div>
	</div>
	<div class="col-md-2">Coming soon</div>
</div>
<?php }?>
</div>
</body>
</html><?php }} ?>
