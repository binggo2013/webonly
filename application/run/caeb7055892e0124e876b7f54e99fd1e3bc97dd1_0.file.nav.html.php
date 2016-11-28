<?php
/* Smarty version 3.1.29, created on 2016-10-24 11:29:44
  from "/data/home/qyu1988070001/htdocs/application/views/admin/nav.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_580d8028ca3100_82199883',
  'file_dependency' => 
  array (
    'caeb7055892e0124e876b7f54e99fd1e3bc97dd1' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/nav.html',
      1 => 1471709098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580d8028ca3100_82199883 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>导航管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/admin.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/nav.js"><?php echo '</script'; ?>
>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<body>
<!--modal模态框开始  -->
<div class="confirm modal-content" id="myModal" aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true" id="confirmCloseBtn"></span><span class="rs-only"></span>
				</button>
				<h4 class="modal-title" id="myModalLabel">确定要删除吗</h4>
			</div>
			<div class="modal-body body">
				<span class="text-danger h4">删除是不可逆的，确定要删除吗？</span>
			</div>
			<div class="modal-footer">
				<a href="" type="button" class="btn btn-success" id="true">确定</a>
				<a href="" type="button" class="btn btn-danger" data-dismiss="modal" id="falseBtn">取消</a>
			</div>
</div>
<!--modal模态框结束  -->
<?php if ($_smarty_tpl->tpl_vars['showSubNav']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=nav&action=showMainNav'>导航管理</a></li>
			<li class="active">显示子导航</li>
			<li><a href="?a=nav&action=addSubNav&id=<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->id;?>
" title='添加子导航'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<caption class="text-success"><strong>主导航:<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
</strong></caption>
		<form action='?a=nav&action=deleteAll&type=SubNav&id=<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->id;?>
' method="post">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>描述</td>
				<td>显示|隐藏</td>
				<td>操作</td>
				<td>排序</td>
				<td><input type="checkbox" id="selectBar">全选</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
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
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td>
					<a href="?a=nav&action=update&type=SubNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
					<a href="?a=nav&action=delete&type=SubNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
				<td><input type="text" name="sort[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
" class="form-control sort"></td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
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
			<tr class="text-right">
				<td colspan="7"><input type="submit" value="排序" class="btn btn-success" name="send"><input type="submit" value="全删" class="btn btn-success deleteAll" name="send"></td>
			</tr>
			<?php } else { ?>
			<tr>
				<td colspan="7">暂无数据</td>
			</tr>
			<?php }?>
		</form>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['showMainNav']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=nav&action=showMainNav'>导航管理</a></li>
			<li class="active">显示主导航</li>
			<li><a href="?a=nav&action=addMainNav" title='添加主导航'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<form action='?a=nav&action=deleteAll&type=MainNav' method="post">
			<tr>
				<td>编号</td>
				<td>名称</td>
				<td>描述</td>
				<td>显示|隐藏</td>
				<td>操作</td>
				<td>排序</td>
				<td><input type="checkbox" id="selectBar">全选</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_1_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_1_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td>
					<a href="?a=nav&action=update&type=MainNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
					<a href="?a=nav&action=delete&type=MainNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>|
					<a href="?a=nav&action=showSubNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">查看子导航</a>|
					<a href="?a=nav&action=addSubNav&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">增加子导航</a>
				</td>
				<td><input type="text" name="sort[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->sort;?>
" class="form-control sort"></td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_local_item;
}
if ($__foreach_value_1_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_item;
}
if ($__foreach_value_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_1_saved_key;
}
?>
			<tr class="text-right">
				<td colspan="7"><input type="submit" value="排序" class="btn btn-success" name="send"><input type="submit" value="全删" class="btn btn-success deleteAll" name="send"></td>
			</tr>
			<?php } else { ?>
			<tr>
				<td colspan="7">暂无数据</td>
			</tr>
			<?php }?>
		</form>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
		<li><a href='?a=nav&action=showMainNav'>导航管理</a></li>
		<li class="active">添加主导航</li>
		<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
	</ul>
	<table class="table table-bordered table-striped table-hover table-condensed">
		<form action='' method="post">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->id;?>
">
		<tr>
				<td class="text-right" width=120>是否有子导航</td>
				<td>
					<div class="radio">
						<label>
							<input type="radio" id='yes' name="hasChild" value=1>有子导航
						</label>
						<label>
							<input type="radio" id='yes' name="hasChild" value=0>无子导航
						</label>
					</div>
				</td>
			</tr>
			<tr><td class="text-right">名称</td><td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
"></td></tr>
			<tr><td class="text-right">URL</td><td><input type="text" name="url" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->url;?>
"></td></tr>
			<tr><td class="text-right">描述</td><td><textarea class="form-control" name="description"><?php echo $_smarty_tpl->tpl_vars['oneNav']->value->description;?>
</textarea></td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" name="send" class="btn btn-success" value="提交"></td></tr>
		</form>
	</table>
</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['addMainNav']->value) {?>
<div class="row">
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
		<li><a href='?a=nav&action=showMainNav'>导航管理</a></li>
		<li class="active">添加导航</li>
		<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
	</ul>
	<table class="table table-bordered table-striped table-hover table-condensed">
		<form action='' method="post">
			<tr>
				<td class="text-right" width=120>是否有子导航</td>
				<td>
					<div class="radio">
						<label>
							<input type="radio" id='yes' name="hasChild" value=1>有子导航
						</label>
						<label>
							<input type="radio" id='no' name="hasChild" value=0>无子导航
						</label>
					</div>
					<div id="feedback" class="text-danger"></div>
				</td>
			</tr>
			<tr><td class="text-right">名称</td><td><input type="text" name="name" class="form-control"></td></tr>
			<tr ><td class="text-right">URL</td><td><input type="text" name="url" class="form-control" id='url' placeholder='输入完整的url'></td></tr>
			<tr><td class="text-right">描述</td><td><textarea class="form-control" name="description"></textarea></td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" name="send" class="btn btn-success" value="提交" id="subBtn"></td></tr>
		</form>
	</table>
</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['addSubNav']->value) {?>
<div class="row">
<div class="col-md-12">
	<ul class="breadcrumb">
		<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
		<li><a href='?a=nav&action=showMainNav'>导航管理</a></li>
		<li class="active">添加子导航</li>
		<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
	</ul>
	<table class="table table-bordered table-striped table-hover table-condensed">
	<caption class="text-success"><strong>主导航:<?php echo $_smarty_tpl->tpl_vars['oneNav']->value->name;?>
</strong></caption>
		<form action='' method="post">
			<tr><td class="text-right">名称</td><td><input type="text" name="name" class="form-control"></td></tr>
			<tr><td class="text-right">描述</td><td><textarea class="form-control" name="description"></textarea></td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" name="send" class="btn btn-success" value="提交"></td></tr>
		</form>
	</table>
</div>
</div>
<?php }?>
</body>
</html><?php }
}
