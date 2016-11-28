<?php /* Smarty version Smarty-3.1.19, created on 2015-06-16 10:28:05
         compiled from "C:\xampp\htdocs\quiz\application\views\admin\article.html" */ ?>
<?php /*%%SmartyHeaderCode:23634557f89b5883974-77238652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6a393a2ad52c431b758545cc4b28d35d239092f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\admin\\article.html',
      1 => 1433863607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23634557f89b5883974-77238652',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'data' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'nav' => 0,
    'page' => 0,
    'add' => 0,
    'update' => 0,
    'oneArticle' => 0,
    'headline' => 0,
    'recommend' => 0,
    'focus' => 0,
    'topic' => 0,
    'pickup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557f89b594a860_54620746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557f89b594a860_54620746')) {function content_557f89b594a860_54620746($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\xampp\\htdocs\\quiz\\libs\\plugins\\modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>文章管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="application/ueditor/ueditor.config.js"></script>
<script src="application/ueditor/ueditor.all.js"></script>
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
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
<div class="row">
<div class="col-md-12">
	<ul class="breadcrumb">
			<li><a href='?a=admin&action=welcome'>后台首页</a></li>
			<li><a href='?a=article&action=show'>文章管理</a></li>
			<li class="active">显示文章</li>
			<li><a href="?a=article&a=article&action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li>
	</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
		<form action="?a=article&action=deleteAll" method="post">
			<tr>
				<td>编号</td>
				<td>标题</td>
				<td>属性</td>
				<td>栏目</td>
				<td>浏览量</td>
				<td>发布时间</td>
				<td>显示|隐藏</td>
				<td>操作</td>
				<td><input type="checkbox" id="selectBar"></td>
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
				<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,10,"..");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->attr;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->nid;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->pageview;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td><a href="?a=article&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a><a href="?a=article&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a></td>
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="9" class='text-right'><input type="submit" class="btn btn-success" name="send" value="全删"></td>
			</tr>
			<?php } else { ?>
			<tr><td colspan="9">暂无文章</td></tr>
			<?php }?>
			</form>
		</table>
</div>
</div>
<div class="row">
	<div class="col-md-12 text-center">
	<form method="get" style="display:inline">
		<input type="hidden" name="action" value="show">
		<input type="hidden" name="a" value="article">
		<select name="nid" class="input-sm">
		<option value="0">所有栏目</option>.
		<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

		</select>
		<input type="submit" name="send" value="提交" class="btn btn-success">&nbsp;&nbsp;
	</form>
	<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=admin&action=welcome'>后台首页</a></li>
			<li><a href='?a=article&action=show'>文章管理</a></li>
			<li class="active">添加文章</li>
			<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
		</ul>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover table-condensed">
				<caption>新增文章</caption>
				<tr class="text-center"><td colspan="2" id="feedback"></td></tr>
				<tr>
					<td class="text-right">所属的栏目</td>
					<td>
						<select name="nid" class="form-control input-sm" id="nav">
						<option value="0">选择文章所属的栏目</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>
					</td>
				</tr>
				<tr>
					<td class="text-right">文章标题</td><td><input type="text" name="title" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">文章属性</td>
					<td>
						<input type="checkbox" value="headline" name="attr[]">头条
						<input type="checkbox" value="recommend" name="attr[]">推荐
						<input type="checkbox" value="focus" name="attr[]">焦点
						<input type="checkbox" value="topic" name="attr[]">专题
						<input type="checkbox" value="pickup" name="attr[]">精选
					</td>
				</tr>
				<tr>
					<td class="text-right">缩略图</td><td><input type="file" name="thumbnail" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">Tag</td><td><input type="text" name="tag" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">作者</td><td><input type="text" name="author" class="form-control" value="admin"></td>
				</tr>
				<tr>
					<td class="text-right">来源</td><td><input type="text" name="source" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">导语</td><td><textarea name="lead" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
					 <!-- <textarea rows="" cols="" name="content"></textarea>  -->
						<script id="editor" type="text/plain"  name="content"></script>
						<script type="text/javascript">
    						var ue = UE.getEditor('editor');
    					</script>
					</td>
				</tr>
				<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success"></td></tr>
		</table>
		</form>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=admin&action=welcome'>后台首页</a></li>
			<li><a href='?a=article&action=show'>文章管理</a></li>
			<li class="active">添加文章</li>
			<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
		</ul>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover table-condensed">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->id;?>
">
		<input type="hidden" name="thumbnail2" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->thumbnail;?>
">
				<caption>新增文章</caption>
				<tr class="text-center"><td colspan="2" id="feedback"></td></tr>
				<tr>
					<td class="text-right">所属的栏目</td>
					<td>
						<select name="nid" class="form-control input-sm" id="nav">
						<option value="0">选择文章所属的栏目</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>
					</td>
				</tr>
				<tr>
					<td class="text-right">文章标题</td><td><input type="text" name="title" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">文章属性</td>
					<td>
						<input type="checkbox" value="headline" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['headline']->value;?>
>头条
						<input type="checkbox" value="recommend" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['recommend']->value;?>
>推荐
						<input type="checkbox" value="focus" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['focus']->value;?>
>焦点
						<input type="checkbox" value="topic" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['topic']->value;?>
>专题
						<input type="checkbox" value="pickup" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['pickup']->value;?>
>精选
					</td>
				</tr>
				<tr>
					<td class="text-right">缩略图</td><td><input type="file" name="thumbnail" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">Tag</td><td><input type="text" name="tag" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->tag;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">作者</td><td><input type="text" name="author" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->author;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">来源</td><td><input type="text" name="source" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->source;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">导语</td><td><textarea name="lead" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->title;?>
</textarea></td>
				</tr>
				<tr>
					<td colspan="2">
					 <!-- <textarea rows="" cols="" name="content"></textarea>  -->
						<script id="editor" type="text/plain"  name="content" ><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->content;?>
</script>
						<script type="text/javascript">
    						var ue = UE.getEditor('editor');
    					</script>
					</td>
				</tr>
				<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success"></td></tr>
		</table>
		</form>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
