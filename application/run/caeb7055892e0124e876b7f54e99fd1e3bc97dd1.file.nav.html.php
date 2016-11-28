<?php /* Smarty version Smarty-3.1.19, created on 2016-07-08 11:07:39
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/nav.html" */ ?>
<?php /*%%SmartyHeaderCode:2097980025564746b6c3b2d7-51169257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caeb7055892e0124e876b7f54e99fd1e3bc97dd1' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/nav.html',
      1 => 1467947252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2097980025564746b6c3b2d7-51169257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564746b6d61454_42812267',
  'variables' => 
  array (
    'showSubNav' => 0,
    'oneNav' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'showMainNav' => 0,
    'update' => 0,
    'addMainNav' => 0,
    'addSubNav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564746b6d61454_42812267')) {function content_564746b6d61454_42812267($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>导航管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
<script src="public/scripts/nav.js"></script>
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
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
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
			<?php } ?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showMainNav']->value) {?>
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
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
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
			<?php } ?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addMainNav']->value) {?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addSubNav']->value) {?>
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
</html><?php }} ?>
