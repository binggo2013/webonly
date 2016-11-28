<?php
/* Smarty version 3.1.29, created on 2016-10-29 21:42:58
  from "/data/home/qyu1988070001/htdocs/application/views/admin/message.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5814a76250db27_18110700',
  'file_dependency' => 
  array (
    'e6c82d5c7c31dff4ff1e76d6564c663d9761c9bc' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/message.html',
      1 => 1477748008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5814a76250db27_18110700 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="libs/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="libs/ueditor/ueditor.all.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=message&action=show'>信息管理</a></li>
			<li class="active">添加信息</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form action="" method="post">
		<table class="table table-bordered table-striped table-hover table-condensed">
			<tr>
				<td class="text-right">信息类型</td>
				<td>
					<input type="radio" value="1" name="type" id="one"><label for="one">公告</label>
					<input type="radio" value="2" name="type" id="two"><label for="two">通知</label>
					<input type="radio" value="3" name="type" id="three"><label for="three">用户提示</label>
				</td>
			</tr>
			<tr>
				<td class="text-right">信息范围</td>
				<td>
					<input type="radio" value="1" name="range" id="all"><label for="all">全站</label>
					<input type="radio" value="2" name="range" id="some"><label for="some">特定用户</label>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name="uid" class="form-control" placeholder="暂时不用"></textarea>
				</td>
			</tr>
			<tr>
				<td>信息标题</td>
				<td>
					<textarea name="title" class="form-control"></textarea>
				</td>
			</tr>
			<tr>
				<td class="text-right" style="width:120px;">信息内容</td>
				<td>
					<!-- 加载编辑器的容器 -->
<?php echo '<script'; ?>
 id="container" name="content" type="text/plain" style="width:100%">初始化内容<?php echo '</script'; ?>
>
    					<?php echo '<script'; ?>
 type="text/javascript">
				        var ue = UE.getEditor('container');
				    <?php echo '</script'; ?>
>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="send" value="提 交" class="btn btn-success"></td>
			</tr>
		</table>
		</form>
	</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=message&action=show'>信息管理</a></li>
			<li class="active">修改信息</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form action="" method="post">
		<table class="table table-bordered table-striped table-hover table-condensed">
			<tr>
				<td class="text-right">信息类型</td>
				<td>
					<input type="radio" value="1" name="type" id="one" <?php echo $_smarty_tpl->tpl_vars['oneMsg']->value->one;?>
><label for="one">公告</label>
					<input type="radio" value="2" name="type" id="two" <?php echo $_smarty_tpl->tpl_vars['oneMsg']->value->two;?>
><label for="two">通知</label>
					<input type="radio" value="3" name="type" id="three" <?php echo $_smarty_tpl->tpl_vars['oneMsg']->value->three;?>
><label for="three">用户提示</label>
				</td>
			</tr>
			<tr>
				<td class="text-right">信息范围</td>
				<td>
					<input type="radio" value="1" name="range" id="all"><label for="all">全站</label>
					<input type="radio" value="2" name="range" id="some"><label for="some">特定用户</label>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<textarea name="uid" class="form-control" placeholder="暂时不用"></textarea>
				</td>
			</tr>
			<tr>
				<td>信息标题</td>
				<td>
					<textarea name="title" class="form-control" ><?php echo $_smarty_tpl->tpl_vars['oneMsg']->value->title;?>
</textarea>
				</td>
			</tr>
			<tr>
				<td class="text-right" style="width:120px;">信息内容</td>
				<td>
					<!-- 加载编辑器的容器 -->
<?php echo '<script'; ?>
 id="container" name="content" type="text/plain" style="width:100%"><?php echo $_smarty_tpl->tpl_vars['oneMsg']->value->content;
echo '</script'; ?>
>
    					<?php echo '<script'; ?>
 type="text/javascript">
				        var ue = UE.getEditor('container');
				    <?php echo '</script'; ?>
>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="send" value="提 交" class="btn btn-success"></td>
			</tr>
		</table>
		</form>
	</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=message&action=show'>信息管理</a></li>
			<li class="active">显示信息</li>
			<li><a href="?a=message&action=add" title='添加信息'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<form action="?a=message&action=deleteAll" method="post">
		<table class="table table-bordered table-striped table-hover table-condensed">
			<tr>
				<td>信息类型</td>
				<td>信息范围</td>
				<td>信息内容</td>
				<td>阅读状态</td>
				<td>显示状态</td>
				<td>操作</td>
				<td>日期</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['AllMsg']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['AllMsg']->value;
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
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->type;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->range;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->readStatus;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td>
					<a href="?a=message&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
				删除
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
			</tr>
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
			<tr><td>暂无数据</td></tr>
			<?php }?>
		</table>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
</div>
<?php }?>
</body>
</html><?php }
}
