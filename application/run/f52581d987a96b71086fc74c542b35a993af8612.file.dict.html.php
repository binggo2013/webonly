<?php /* Smarty version Smarty-3.1.19, created on 2016-06-29 14:21:37
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/dict.html" */ ?>
<?php /*%%SmartyHeaderCode:2065261134573d6b08660db8-51044069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f52581d987a96b71086fc74c542b35a993af8612' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/dict.html',
      1 => 1467181265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2065261134573d6b08660db8-51044069',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_573d6b08696bc0_70714466',
  'variables' => 
  array (
    'keyword' => 0,
    'admin' => 0,
    'AllEntry' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'all' => 0,
    'fullcolumn' => 0,
    'banner' => 0,
    'slider' => 0,
    'sidebar' => 0,
    'page' => 0,
    'reportAdmin' => 0,
    'AllReportWords' => 0,
    'add' => 0,
    'nav' => 0,
    'update' => 0,
    'oneEntry' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573d6b08696bc0_70714466')) {function content_573d6b08696bc0_70714466($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>字典管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/lang/zh-cn/zh-cn.js"></script>
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
<?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
	<div class="row">
		<div class="col-xs-12">
		<form method="post" action="?a=dict&action=search">
			<ul class="breadcumb">
					<!-- <li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=dict&action=admin'>字典管理</a></li>
					<li class="active">显示词条</li>
					<li><a href="?a=dict&action=add" title='添加词条'><i class="fa fa-plus-circle"></i></a></li> -->
					<li>
					<input type="text" class="search" name="keyword">
					<input type="submit" value="查询" name="send">
					</li>
				</ul>
				</form>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-striped table-hover table-condensed">
				<tr>
					<td>标题</td>
					<td>音标</td>
					<td>图片</td>
					<td>释义</td>
					<td>示例</td>
					<td>分类</td>
					<td>贡献者</td>
					<td>操作</td>
				</tr>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['keyword']->value->wordname;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['keyword']->value->phonetic;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['keyword']->value->pic;?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['keyword']->value->paraphrase;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['keyword']->value->paraphrase,"10","...");?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['keyword']->value->example;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['keyword']->value->example,"10","...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['keyword']->value->catalogue;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['keyword']->value->provider;?>
</td>
					<td>
						<a href="?a=dict&action=update&id=<?php echo $_smarty_tpl->tpl_vars['keyword']->value->id;?>
">修改</a>
						<a href="?a=dict&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['keyword']->value->id;?>
" class="deleteBtn" info="">删除</a>
					</td>
				</tr>
			</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['admin']->value) {?>
	<div class="row">
		<div class="col-xs-12">
		<form method="post" action="?a=dict&action=search">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=dict&action=admin'>字典管理</a></li>
					<li><a href='?a=dict&action=reportAdmin'>用户提交新词管理</a></li>
					<li class="active">显示词条</li>
					<li><a href="?a=dict&action=add" title='添加词条'><i class="fa fa-plus-circle"></i></a></li>
					<li>
					<input type="text" class="search" name="keyword">
					<input type="submit" value="查询" name="send">
					</li>
				</ul>
				</form>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=ad&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>标题</td>
					<td>音标</td>
					<td>图片</td>
					<td>释义</td>
					<td>示例</td>
					<td>分类</td>
					<td>贡献者</td>
					<td>描述</td>
					<td width=80>显示|隐藏</td>
					<td width=80>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['AllEntry']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllEntry']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->wordname;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->phonetic;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->pic;?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->paraphrase;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->paraphrase,"10","...");?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->example;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->example,"10","...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->catalogue;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->provider;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
					<td>
						<a href="?a=dict&action=update&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>
						<a href="?a=dict&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn" info="">删除</a>
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="12"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
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
<?php if ($_smarty_tpl->tpl_vars['reportAdmin']->value) {?>
	<div class="row">
		<div class="col-xs-12">
		<form method="post" action="?a=dict&action=search">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=dict&action=admin'>字典管理</a></li>
					<li class="active">显示词条</li>
					<li><a href="?a=dict&action=add" title='添加词条'><i class="fa fa-plus-circle"></i></a></li>
					<li>
					<input type="text" class="search" name="keyword">
					<input type="submit" value="查询" name="send">
					</li>
				</ul>
				</form>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=dict&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>用户名</td>
					<td>联系方式</td>
					<td>提交新词</td>
					<td>提交时间</td>
					<td width=80>显示|隐藏</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['AllReportWords']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllReportWords']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->provider;?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->contact;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->contact,"10","...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->reportWord;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->reportTime;?>
</td>
					<td width=130><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="12"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
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
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=dict&action=admin'>词条管理</a></li>
			<li class="active">添加词条</li>
			<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
		</ul>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover table-condensed">				
				<tr class="text-center"><td colspan="2" id="feedback"></td></tr>
				<tr>
					<td class="text-right">所属的类型</td>
					<!-- <td width=150>
						<select name="vid" class="form-control input-sm inline-block" id="nav" style="width:160px;">
						<option value="0">选择词条的类型</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-alert"></span>)
					</td> -->
				</tr>
				<tr>
					<td class="text-right">单词</td><td><input type="text" name="wordname" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">音标</td>
					<td class="text-right">
						<input type="text" name="phonetic" class="form-control">
					</td>
					<!-- <td>
						<input type="checkbox" value="headline" name="attr[]">头条
						<input type="checkbox" value="recommend" name="attr[]">推荐
						breaking news 
						<input type="checkbox" value="focus" name="attr[]">焦点
						<input type="checkbox" value="topic" name="attr[]" disabled>专题
						<input type="checkbox" value="pickup" name="attr[]" disabled>精选
					</td> -->
				</tr>
				<tr>
					<td class="text-right">示例图</td>
					<td class="reg">
						<img src="public/uploads/article/default.jpg" class="img-circle" style="width:80px;height:80px;"><a href="javascript:void(0)" id="iconBtn">太丑了，换一张</a>						
						<input type="file" name="pic" class="form-control" id="pic" accept="image/*">
					</td>
				</tr>	
				<tr>
					<td class="text-right" style="width:100px;">释义</td>
					<td>
						<!-- <textarea rows="" cols="" name="content" id="content" ></textarea> -->
						<script id="editor" type="text/plain" style="width:100%" name="paraphrase"></script>
						<script type="text/javascript">    
							var ue = UE.getEditor('editor');	
							$(function(){
								/* $("#nav").change(function(){
									$(".text-alert").html("");
								}); */
								$("#submitBtn").click(function(){
									//$("#content").val(UE.getEditor('editor').getContent());
									/* if($("#nav").val()=="0"){
										$(".text-alert").html("栏目不得为空");
										return false;
									} */
									return true;
								});
							});
						</script>
					
					</td>
				</tr>			
				<tr>
					<td class="text-right">示例</td>
					<td>
						<!-- <textarea rows="" cols="" name="example" id="content" style="display:none;"></textarea> -->
						<script id="editor2" type="text/plain" style="width:100%" name="example"></script>
						<script type="text/javascript"> 
							var ue2 = UE.getEditor('editor2');	
							$(function(){
								/* $("#nav").change(function(){
									$(".text-alert").html("");
								}); */
								$("#submitBtn").click(function(){
									//$("#content").val(UE.getEditor('editor').getContent());
									/* if($("#nav").val()=="0"){
										$(".text-alert").html("栏目不得为空");
										return false;
									} */
									return true;
								});
							});
						</script>
					</td>
				</tr>
				<tr>
					<td class="text-right">类型</td><td><input type="text" name="catalogue" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">提供者</td><td><input type="text" name="provider" class="form-control" value="admin"></td>
				</tr>
				<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success" id="submitBtn"></td></tr>
		</table>
		</form>
	</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=dict&action=admin'>词条管理</a></li>
			<li class="active">修改词条</li>
			<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
		</ul>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover table-condensed">				
				<tr class="text-center"><td colspan="2" id="feedback"></td></tr>
				<tr>
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->id;?>
">
					<td class="text-right">所属的类型</td>
					<!-- <td width=150>
						<select name="vid" class="form-control input-sm inline-block" id="nav" style="width:160px;">
						<option value="0">选择词条的类型</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-alert"></span>)
					</td> -->
					<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->catalog;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">单词</td><td><input type="text" name="wordname" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->wordname;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">音标</td>
					<td class="text-right">
						<input type="text" name="phonetic" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->phonetic;?>
">
					</td>
					<!-- <td>
						<input type="checkbox" value="headline" name="attr[]">头条
						<input type="checkbox" value="recommend" name="attr[]">推荐
						breaking news 
						<input type="checkbox" value="focus" name="attr[]">焦点
						<input type="checkbox" value="topic" name="attr[]" disabled>专题
						<input type="checkbox" value="pickup" name="attr[]" disabled>精选
					</td> -->
				</tr>
				<tr>
					<td class="text-right">示例图</td>
					<td class="reg">
						<img src="public/uploads/article/default.jpg" class="img-circle" style="width:80px;height:80px;"><a href="javascript:void(0)" id="iconBtn">太丑了，换一张</a>						
						<input type="file" name="pic" class="form-control" id="pic" accept="image/*" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->pic;?>
">
					</td>
				</tr>	
				<tr>
					<td class="text-right" style="width:100px;">释义</td>
					<td>
						<!-- <textarea rows="" cols="" name="content" id="content" ></textarea> -->
						<script id="editor" type="text/plain" style="width:100%" name="paraphrase"><?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->paraphrase;?>
</script>
						<script type="text/javascript">    
							var ue = UE.getEditor('editor');	
							$(function(){
								/* $("#nav").change(function(){
									$(".text-alert").html("");
								}); */
								$("#submitBtn").click(function(){
									//$("#content").val(UE.getEditor('editor').getContent());
									/* if($("#nav").val()=="0"){
										$(".text-alert").html("栏目不得为空");
										return false;
									} */
									return true;
								});
							});
						</script>
					
					</td>
				</tr>			
				<tr>
					<td class="text-right">示例</td>
					<td>
						<!-- <textarea rows="" cols="" name="example" id="content" style="display:none;"></textarea> -->
						<script id="editor2" type="text/plain" style="width:100%" name="example"><?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->example;?>
</script>
						<script type="text/javascript"> 
							var ue2 = UE.getEditor('editor2');	
							$(function(){
								/* $("#nav").change(function(){
									$(".text-alert").html("");
								}); */
								$("#submitBtn").click(function(){
									//$("#content").val(UE.getEditor('editor').getContent());
									/* if($("#nav").val()=="0"){
										$(".text-alert").html("栏目不得为空");
										return false;
									} */
									return true;
								});
							});
						</script>
					</td>
				</tr>
				<tr>
					<td class="text-right">类型</td><td><input type="text" name="catalogue" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->catalogue;?>
"></td>
				</tr>
				<tr>
					<td class="text-right">提供者</td><td><input type="text" name="provider" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneEntry']->value->provider;?>
"></td>
				</tr>
				<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success" id="submitBtn"></td></tr>
		</table>
		</form>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
