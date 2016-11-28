<?php
/* Smarty version 3.1.29, created on 2016-08-21 00:05:24
  from "/data/home/qyu1988070001/htdocs/application/views/admin/welcome.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57b87fc46fdfe6_85937486',
  'file_dependency' => 
  array (
    '924b264c2a6383ee27506ec26c2e51b06467f39d' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/welcome.html',
      1 => 1471709105,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57b87fc46fdfe6_85937486 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/base.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<link href="public/styles/welcome.css" rel="stylesheet">
<body>
<div class="jumbotron" style="padding:0;height:496px;">
	<div class="alert alert-info alert-dismissible msg" role="alert">
	  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	  <strong>恭喜!</strong> 您现在使用的是KongMPMS多功能管理系统v11.0。
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
		<tr class="text-center">
			<td><a class="btn btn-primary" href="?a=dict&action=admin">词典管理 <span class="badge"><?php echo $_smarty_tpl->tpl_vars['aaa']->value;?>
</span></a></td>
			<td><a class="btn btn-primary" href="?a=dict&action=reportAdmin">新词管理 <span class="badge" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['rrr']->value;?>
</span></a></td>	
			<td><a class="btn btn-primary" href="?a=feedback&action=admin">用户反馈 <span class="badge" style="color:red;"><?php echo $_smarty_tpl->tpl_vars['fff']->value;?>
</span></a></td>			
		</tr>
	</table>
</div>
</body>
</html><?php }
}
