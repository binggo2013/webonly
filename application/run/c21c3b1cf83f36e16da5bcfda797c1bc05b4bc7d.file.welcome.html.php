<?php /* Smarty version Smarty-3.1.19, created on 2015-09-27 20:41:56
         compiled from "/home/xiangruikong/public_html/application/views/admin/welcome.html" */ ?>
<?php /*%%SmartyHeaderCode:236525442546364000918a3-59820326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c21c3b1cf83f36e16da5bcfda797c1bc05b4bc7d' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/welcome.html',
      1 => 1443357651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236525442546364000918a3-59820326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_546364000cbd89_09888007',
  'variables' => 
  array (
    'articleNum' => 0,
    'userNum' => 0,
    'productNum' => 0,
    'choiceNum' => 0,
    'judgeNum' => 0,
    'examNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_546364000cbd89_09888007')) {function content_546364000cbd89_09888007($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/base.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<link href="public/styles/welcome.css" rel="stylesheet">
<body>
<div class="jumbotron" style="padding:0;height:496px;">
	<div class="alert alert-info alert-dismissible msg" role="alert">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <strong>恭喜!</strong> 您现在使用的是KongMPMS多功能管理系统9.0。
	</div>
	<table class="table table-bordered table-striped table-hover table-condensed">
		<caption class="h3 text-primary text-head">快捷操作</caption>
		<tr class="text-center">
			<td><a class="btn btn-primary" href="?a=article&action=show">文章管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['articleNum']->value;?>
</span></a></td>
			<td><a class="btn btn-primary" href="?a=download&action=show">下载管理 <span class="badge">4</span></a></td>
			<td><a class="btn btn-primary" href="?a=user&action=show">会员管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['userNum']->value;?>
</span></a></td>
		</tr>
		<tr class="text-center">
			<td><a class="btn btn-primary" href="?a=product&m=adminShow">商品管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['productNum']->value;?>
</span></a></td>
			<td><a class="btn btn-primary" href="?a=learning&action=showChoice">选择题管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['choiceNum']->value;?>
</span></a></td>
			<td><a class="btn btn-primary" href="?a=learning&action=showJudge">判断管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['judgeNum']->value;?>
</span></a></td>
		</tr>
		<tr class="text-center">
			<td><a class="btn btn-primary" href="?a=learning&action=showExam">试卷管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['examNum']->value;?>
</span></a></td>
			<td><a class="btn btn-primary" href="?a=order&action=show">订单管理 <span class="badge">4</span></a></td>	
			<td><a class="btn btn-primary" href="?a=readme&action=func">网站帮助 <span class="badge">4</span></a></td>			
		</tr>
	</table>
</div>
</body>
</html><?php }} ?>
