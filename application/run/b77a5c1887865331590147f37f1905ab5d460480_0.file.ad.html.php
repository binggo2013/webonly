<?php
/* Smarty version 3.1.29, created on 2016-09-04 22:58:24
  from "/data/home/qyu1988070001/htdocs/application/views/admin/ad.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cc3690ae68e8_80870107',
  'file_dependency' => 
  array (
    'b77a5c1887865331590147f37f1905ab5d460480' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/ad.html',
      1 => 1473001098,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57cc3690ae68e8_80870107 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="libs/Require/RequireJS.js" data-main="public/scripts/main"><?php echo '</script'; ?>
>
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
				<?php
$_from = $_smarty_tpl->tpl_vars['AllAd']->value;
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
					<tr><td class="text-right">广告图片</td><td><a style='cursor:pointer' id='uploadBar'>点击上传</a><input type="file" name="thumbnail" class="form-control" id="file" style="display:none;"></td></tr>
	<tr>
		<td>图像预览</td>
		<td style="width:800px;height:250px;">
			<img src="public/images/default.jpg" id="defaultImage" style="max-width:100%;max-height:100%;">
		</td>
	</tr>		
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
					<tr><td class="text-right">广告图片</td><td><a style='cursor:pointer' id='uploadBar'>点击上传</a><input type="file" name="thumbnail" class="form-control" id="file" style="display:none;"></td></tr>

					<tr><td></td><td><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->thumbnail;?>
" style="width:600px;" id="defaultImage"></td></tr>
					<input type="hidden" name="thumbnail2" value="<?php echo $_smarty_tpl->tpl_vars['oneAd']->value->thumbnail;?>
">
					<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success"></td></tr>
				</form>
				</table>
			</div>
		</div>
		<?php }?>
</body>
</html><?php }
}
