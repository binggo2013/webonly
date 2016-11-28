<?php /* Smarty version Smarty-3.1.19, created on 2015-07-07 10:54:33
         compiled from "C:\xampp\htdocs\KongMPMS\application\views\home\quiz.html" */ ?>
<?php /*%%SmartyHeaderCode:2368155938be45681e5-50628357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8548d3ba9c4a181aee5ae84196a97c3c0c8ce21' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongMPMS\\application\\views\\home\\quiz.html',
      1 => 1436237653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2368155938be45681e5-50628357',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_55938be45eb3f1_47484439',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55938be45eb3f1_47484439')) {function content_55938be45eb3f1_47484439($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>quzi</title>
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<script src="public/scripts/quiz.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/quiz.css" rel="stylesheet">
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-10">
		<form method="post" action="?a=quiz&m=result" id="exam">
			<dl class="choice"><h1>选择题</h1>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<a name="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"></a>
				<dt><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
</dt>
				<dd><input type="hidden" name='choice<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
'/></dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='A' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]a" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/><label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]a"><?php echo $_smarty_tpl->tpl_vars['value']->value->a;?>
</label></dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='B' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]b" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/><label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]b"><?php echo $_smarty_tpl->tpl_vars['value']->value->b;?>
</label></dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='C' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]c" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/><label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]c"><?php echo $_smarty_tpl->tpl_vars['value']->value->c;?>
</label></dd>
				<dd><input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='D' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]d" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/><label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]d"><?php echo $_smarty_tpl->tpl_vars['value']->value->d;?>
</label></dd>
				<?php } ?>
			</dl>
			<dl class="judge"><h1>判断题</h1>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['judges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<a name="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"></a>
				<dt><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['v']->value->question;?>
</dt>
				<dd><input type="hidden" name='judge<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
'/></dd>
				<dd>
					正确：<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="1" num="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/>
					错误：<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="0" num="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"/>
				</dd>
				<?php } ?>
			</dl>
			<span>
				<input type="hidden" name="choiceNum" value="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
">
				<input type="hidden" name="judgeNum" value="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
			</span>
			<div><input type="submit" name="send" value="提交" class="btn btn-success"></div>
		</form>
		</div>
		<div class="col-md-2 rightSide">
			<ul class="jump">
				<h5 class="countdown">剩余时间:<span>50:00</span></h5>
				<h5>选择题</h5>
				<div class="content1"></div>
				<div class="clearfix"></div>
				<h5>判断题</h5>
				<div class="content2"></div>
				<div class="clearfix"></div>
			</ul>
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
<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>
