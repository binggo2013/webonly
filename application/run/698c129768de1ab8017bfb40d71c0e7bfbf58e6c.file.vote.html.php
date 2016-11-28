<?php /* Smarty version Smarty-3.1.19, created on 2014-11-12 22:23:03
         compiled from "/home/xiangruikong/public_html/application/views/admin/vote.html" */ ?>
<?php /*%%SmartyHeaderCode:43447178754636d4733e2c0-23573023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '698c129768de1ab8017bfb40d71c0e7bfbf58e6c' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/admin/vote.html',
      1 => 1415798604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43447178754636d4733e2c0-23573023',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addSubject' => 0,
    'update' => 0,
    'oneVote' => 0,
    'subject' => 0,
    'addItem' => 0,
    'showItem' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'showSubject' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_54636d4761f044_87898241',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54636d4761f044_87898241')) {function content_54636d4761f044_87898241($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>配置管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<link href="public/styles/admin.css" rel="stylesheet">
</head>
<body>
<!--modal模态框开始  -->
<div class="modal fade" id="myModal" aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="rs-only"></span>
				</button>
				<h4 class="modal-title" id="myModalLabel">确定要删除吗</h4>
			</div>
			<div class="modal-body">
				<span>hello</span>
			</div>
			<div class="modal-footer">
				<a href="" type="button" class="btn btn-success" id="true">确定</a>
				<a href="" type="button" class="btn btn-danger" data-dismiss="modal">取消</a>
			</div>
		</div>
	</div>
</div>
<!--modal模态框结束  -->
<?php if ($_smarty_tpl->tpl_vars['addSubject']->value) {?>
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
					<li><a href='?a=admin&action=welcome'>后台首页</a></li>
					<li><a href='?a=vote&action=showSubject'>投票管理</a></li>
					<li class="active">添加投票主题</li>
				</ul>
				<table class="table table-bordered table-striped table-hover table-condensed">
					<form action="" method="post">
						<tr>
							<td class="text-right">投票主题</td><td><input type="text" name="title" class="form-control"></td>
						</tr>
						<tr>
							<td class="text-right">主题描述</td><td><textarea name="description" class="form-control"></textarea>
						</tr>
						<tr class="text-center"><td colspan="2"><input type="submit" name="send" value="提交" class="btn btn-success"></td></tr>
					</form>
				</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
					<li><a href='?a=admin&action=welcome'>后台首页</a></li>
					<li><a href='?a=vote&action=showSubject'>投票管理</a></li>
					<li class="active">修改投票</li>
				</ul>
				<table class="table table-bordered table-striped table-hover table-condensed">
					<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneVote']->value->id;?>
">
					<?php if ($_smarty_tpl->tpl_vars['subject']->value) {?>
						<tr>
							<td class="text-center" colspan="2">所属主题:<span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['subject']->value->title;?>
</span></td>
						</tr>
					<?php }?>
						<tr>
							<td class="text-right">名称</td><td><input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneVote']->value->title;?>
"></td>
						</tr>
						<tr>
							<td class="text-right">描述</td><td><textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneVote']->value->description;?>
</textarea>
						</tr>
						<tr class="text-center"><td colspan="2"><input type="submit" name="send" value="提交" class="btn btn-success"></td></tr>
					</form>
				</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addItem']->value) {?>
	<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
					<li><a href='?a=admin&action=welcome'>后台首页</a></li>
					<li><a href='?a=vote&action=showSubject'>投票管理</a></li>
					<li class="active">添加投票项目</li>
				</ul>
				<table class="table table-bordered table-striped table-hover table-condensed">
					<form action="" method="post">
						<tr>
							<td class="text-center" colspan="2">所属主题:<span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['oneVote']->value->title;?>
</span></td>
						</tr>
						<tr>
							<td class="text-right">项目名称</td><td><input type="text" name="title" class="form-control"></td>
						</tr>
						<tr>
							<td class="text-right">主题描述</td><td><textarea name="description" class="form-control"></textarea>
						</tr>
						<tr class="text-center"><td colspan="2"><input type="submit" name="send" value="提交" class="btn btn-success"></td></tr>
					</form>
				</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showItem']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=admin&action=welcome'>后台首页</a></li>
				<li><a href='?a=vote&action=showSubject'>投票管理</a></li>
				<li class="active">显示投票项</li>
				<li><a href="?a=vote&action=addItem&id=<?php echo $_smarty_tpl->tpl_vars['oneVote']->value->id;?>
"><i class="fa fa-plus-circle" title="增加投票主题"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<form action="?a=vote&action=deleteAll&id=<?php echo $_smarty_tpl->tpl_vars['oneVote']->value->id;?>
" method="post">
			<tr>
				<td class="text-center" colspan="6">所属主题:<span class="text-danger"><?php echo $_smarty_tpl->tpl_vars['oneVote']->value->title;?>
</span></td>
			</tr>
			<tr>
				<td>编号</td>
				<td>主题</td>
				<td>投票数</td>
				<td>显示|隐藏</td>
				<td>操作</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->amount;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td>
					<a href="?a=vote&action=update&type=item&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>||
					<a href="?a=vote&action=delete&type=item&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
			</tr>
			<?php } ?>
			<tr><td colspan="6"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td></tr>
			<?php } else { ?>
			<tr><td colspan="6">暂无内容</td></tr>
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
<?php if ($_smarty_tpl->tpl_vars['showSubject']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=admin&action=welcome'>后台首页</a></li>
				<li><a href='?a=vote&action=showSubject'>投票管理</a></li>
				<li class="active">显示投票主题</li>
				<li><a href="?a=vote&action=addSubject"><i class="fa fa-plus-circle" title="增加投票主题"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<form action="?a=vote&action=deleteAll&type=subject" method="post">
			<tr>
				<td>编号</td>
				<td>主题</td>
				<td>投票项</td>
				<td>显示|隐藏</td>
				<td>总投票数</td>
				<td>操作</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
				<td>
					<a href="?a=vote&action=showItem&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">查看投票项</a>
					<a href="?a=vote&action=addItem&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">增加投票项</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['value']->value->totalCount) {?><?php echo $_smarty_tpl->tpl_vars['value']->value->totalCount;?>
<?php } else { ?>暂无投票<?php }?></td>
				<td>
					<a href="?a=vote&action=update&type=subject&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>||
					<a href="?a=vote&action=delete&type=subject&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
			</tr>
			<?php } ?>
			<tr><td colspan="7"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td></tr>
			<?php } else { ?>
			<tr><td colspan="7">暂无内容</td></tr>
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
</body>
</html><?php }} ?>
e { ?>
			<tr><td colspan="7">暂无内容</td></tr>
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
</body>
</html><?php }} ?>
