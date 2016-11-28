<?php /* Smarty version Smarty-3.1.19, created on 2015-06-15 11:33:51
         compiled from "C:\xampp\htdocs\quiz\application\views\admin\quiz.html" */ ?>
<?php /*%%SmartyHeaderCode:8092557e479fa1ba08-75456104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '489404afc3cc26b4bb1591314bc58a447c0ac5ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\admin\\quiz.html',
      1 => 1434335343,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8092557e479fa1ba08-75456104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'add' => 0,
    'course' => 0,
    'addJudge' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557e479fa624a5_30733352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557e479fa624a5_30733352')) {function content_557e479fa624a5_30733352($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>quzi</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
		<div class="row">
			<div class="col-md-10">
				<form method="post" action="?a=quiz&m=choice">
					<dl>
						<dt>问题： <input name="question" type="text" class="form-control"/><dt>
						<dd>选项A： <input name="choice_a" type="text" class="form-control"/></dd>
						<dd>选项B： <input name="choice_b" type="text" class="form-control"/></dd>
						<dd>选项C： <input name="choice_c" type="text" class="form-control"/></dd>
						<dd>选项D： <input name="choice_d" type="text" class="form-control"/></dd>
						<dt>正确答案： A:<input name="answer" type="radio" value="A" /> B:<input
								name="answer" type="radio" value="B" /> C:<input name="answer"
								type="radio" value="C" /> D:<input name="answer" type="radio"
								value="D" /><dt>
						<dd>
						<select class="input-sm" name="course">
							<option>所属课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select>
					</dd>
						<dd> <input type="submit" name="send" value="添　加　试　题" class="btn btn-success"/></dd>
						</p>
					</dl>
				</form>
			</div>
			<div class="col-md-2">coming soon</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['addJudge']->value) {?>
		<div class="row">
			<div class="col-md-10">
				<form method="post" action="?a=quiz&m=addJudge">
					<dl>
						<dt>问题： <input name="question" type="text" class="form-control"/><dt>
						<dd>选项A： 正确；选项B： 错误</dd>
						<dt>正确答案：
							A:<input name="answer" type="radio" value="1" />
							B:<input name="answer" type="radio" value="0" /> <dt>
						<dd> <input type="submit" name="send" value="添　加　试　题" class="btn btn-success"/></dd>
						</p>
					</dl>
				</form>
			</div>
			<div class="col-md-2">coming soon</div>
		</div>
		<?php }?>
	</div>
</body>
</html><?php }} ?>
