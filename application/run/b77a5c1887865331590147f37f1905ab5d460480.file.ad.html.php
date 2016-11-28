<?php /* Smarty version Smarty-3.1.19, created on 2015-11-30 00:21:38
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/ad.html" */ ?>
<?php /*%%SmartyHeaderCode:465204638565b2612db64d1-63304950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b77a5c1887865331590147f37f1905ab5d460480' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/ad.html',
      1 => 1447292252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '465204638565b2612db64d1-63304950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'AllAd' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'all' => 0,
    'fullcolumn' => 0,
    'banner' => 0,
    'slider' => 0,
    'sidebar' => 0,
    'page' => 0,
    'add' => 0,
    'update' => 0,
    'oneAd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_565b26130166f5_60927665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565b26130166f5_60927665')) {function content_565b26130166f5_60927665($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
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
	<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=ad&action=show'>广告管理</a></li>
					<li class="active">显示广告</li>
					<li><a href="?a=ad&action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li>
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=ad&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>标题</td>
					<td>链接</td>
					<td>类型</td>
					<td width=80>显示|隐藏</td>
					<td>描述</td>
					<td width=80>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['AllAd']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllAd']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->link;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->type;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->description,"10","...");?>
</td>
					<td>
						<a href="?a=ad&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>
						<a href="?a=ad&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn" info="">删除</a>
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="8"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="7">暂无广告</td></tr>
				<?php }?>
			</form>
			</table>
		</div>
	</div>
	<div class="row">
			<div class="col-md-12 text-center">
				<form action="" method="get" style="display:inline">
				<input type="hidden" name="action" value="show">
				<input type="hidden" name="a" value="ad">
					<select name="kind" class="input-sm">
						<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有广告</option>
						<option value="1" <?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value;?>
>通栏广告</option>
						<option value="2" <?php echo $_smarty_tpl->tpl_vars['banner']->value;?>
>banner广告</option>
						<option value="3" <?php echo $_smarty_tpl->tpl_vars['slider']->value;?>
>slider广告</option>
						<option value="4" <?php echo $_smarty_tpl->tpl_vars['sidebar']->value;?>
>侧栏广告</option>
					</select>
					<input type="submit" name="send" value="提交" class="btn btn-success">
				</form>
			<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

			</div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=ad&action=show'>广告管理</a></li>
					<li class="active">添加商品</li>
				</ul>
				<table class="table table-bordered table-striped table-hover table-condensed">
				<form action="" method="post" class="form-inline" enctype="multipart/form-data">
					<tr>
						<td class="text-right">广告类型</td>
						<td>
							<label class="checkbox-inline"><input type="radio" name="type" value="1" class="form-controlo">通栏广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="2" class="form-controlo">Banner广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="3" class="form-controlo">Slider广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="4" class="form-controlo">侧栏广告</label>
						</td>
					</tr>
					<tr><td class="text-right">广告标题</td><td><input type="text" name="title" class="form-control"></td></tr>
					<tr><td class="text-right">广告链接</td><td><input type="text" name="link" class="form-control"></td></tr>
					<tr><td class="text-right">广告描述</td><td><textarea name="description" class="form-control"></textarea></td></tr>
					<tr><td class="text-right">广告图片</td><td><input type="file" name="thumbnail" class="form-control"></td></tr>
					<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success"></td></tr>
				</form>
				</table>
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=ad&action=show'>广告管理</a></li>
					<li class="active">修改商品</li>
				</ul>
				<table class="table table-bordered table-striped table-hover table-condensed">
				<form action="" method="post" class="form-inline" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->id;?>
">
					<tr>
						<td class="text-right">广告类型</td>
						<td>
							<label class="checkbox-inline"><input type="radio" name="type" value="1" class="form-controlo" <?php echo $_smarty_tpl->tpl_vars['fullcolumn']->value;?>
>通栏广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="2" class="form-controlo" <?php echo $_smarty_tpl->tpl_vars['banner']->value;?>
>Banner广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="3" class="form-controlo" <?php echo $_smarty_tpl->tpl_vars['slider']->value;?>
>Slider广告</label>
							<label class="checkbox-inline"><input type="radio" name="type" value="4" class="form-controlo" <?php echo $_smarty_tpl->tpl_vars['sidebar']->value;?>
>侧栏广告</label>
						</td>
					</tr>
					<tr><td class="text-right">广告标题</td><td><input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->title;?>
"></td></tr>
					<tr><td class="text-right">广告链接</td><td><input type="text" name="link" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->link;?>
"></td></tr>
					<tr><td class="text-right">广告描述</td><td><textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneAd']->value->description;?>
</textarea></td></tr>
					<tr><td class="text-right">广告图片</td><td><input type="file" name="thumbnail" class="form-control"></td></tr>
					<tr><td></td><td><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->thumbnail;?>
" style="width:600px;"></td></tr>
					<input type="hidden" name="thumbnail2" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->thumbnail;?>
">
					<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success"></td></tr>
				</form>
				</table>
			</div>
		</div>
		<?php }?>
</body>
</html><?php }} ?>
