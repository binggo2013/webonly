<?php /* Smarty version Smarty-3.1.19, created on 2016-02-04 22:18:42
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/article.html" */ ?>
<?php /*%%SmartyHeaderCode:399800002564546a960dea3-25425909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfa2f581440d28aca4eb4629ff6ad20d38d45eb2' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/article.html',
      1 => 1454595512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '399800002564546a960dea3-25425909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564546a9778998_31976367',
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
    'category' => 0,
    'update' => 0,
    'oneArticle' => 0,
    'headline' => 0,
    'recommend' => 0,
    'focus' => 0,
    'topic' => 0,
    'pickup' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564546a9778998_31976367')) {function content_564546a9778998_31976367($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>文章管理</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/base.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="public/scripts/article.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
<link href="public/styles/admin.css" rel="stylesheet">
<link href="public/styles/base.css" rel="stylesheet">
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
<div class="col-md-12">
	<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
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
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=article&action=show'>文章管理</a></li>
			<li class="active">添加文章</li>
			<!-- <li><a href="?action=add" title='添加广告'><i class="fa fa-plus-circle"></i></a></li> -->
		</ul>
		<form method="post" enctype="multipart/form-data">
		<table class="table table-bordered table-striped table-hover table-condensed">				
				<tr class="text-center"><td colspan="2" id="feedback"></td></tr>
				<tr>
					<td class="text-right">所属的栏目</td>
					<td>
						<select name="nid" class="form-control input-sm inline-block" id="nav" style="width:160px;">
						<option value="0">选择文章所属的栏目</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-alert"></span>)
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
						<!--breaking news  -->
						<input type="checkbox" value="focus" name="attr[]">焦点
						<input type="checkbox" value="topic" name="attr[]" disabled>专题
						<input type="checkbox" value="pickup" name="attr[]" disabled>精选
					</td>
				</tr>
				<tr>
					<td class="text-right">缩略图</td>
					<td class=".reg">
						<img src="public/uploads/article/default.jpg" class="img-circle" style="width:80px;height:80px;"><a href="javascript:void(0)" id="iconBtn">太丑了，换一张</a>						
						<input type="file" name="thumbnail" class="form-control" id="reg_icon" accept="image/*">
					</td>
				</tr>	
				<tr>
					<td class="text-right">书籍广告</td>
					<td>
						<select name="cid" class="form-control input-sm inline-block" id="cat" style="width:160px;">
						<option value="0">图书分类</option>
						 <?php echo $_smarty_tpl->tpl_vars['category']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-alert"></span>)
					</td>
				</tr>			
				<tr>
					<td class="text-right">Tag</td><td><input type="text" name="tag" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">作者</td><td><input type="text" name="author" class="form-control" value="Kong"></td>
				</tr>
				<tr>
					<td class="text-right">来源</td><td><input type="text" name="source" class="form-control"></td>
				</tr>
				<tr>
					<td class="text-right">导语</td><td><textarea name="lead" class="form-control"></textarea></td>
				</tr>
				<tr>
					<td colspan="2">
					 <textarea rows="" cols="" name="content" id="content" style="display:none;"></textarea>
						<script id="editor" type="text/plain" style="width:100%"></script>
						<script type="text/javascript">    
							var ue = UE.getEditor('editor');	
							$(function(){
								$("#nav").change(function(){
									$(".text-alert").html("");
								});
								$("#submitBtn").click(function(){
									$("#content").val(UE.getEditor('editor').getContent());
									if($("#nav").val()=="0"){
										$(".text-alert").html("栏目不得为空");
										return false;
									}
									return true;
								});
							});
						</script>
					</td>
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
						<select name="nid" class="form-control input-sm inline-block" id="nav" style="width:160px;>
						<option value="0">选择文章所属的栏目</option>
						 <?php echo $_smarty_tpl->tpl_vars['nav']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-alert"></span>)
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
 disabled>焦点
						<input type="checkbox" value="topic" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['topic']->value;?>
 disabled>专题
						<input type="checkbox" value="pickup" name="attr[]" <?php echo $_smarty_tpl->tpl_vars['pickup']->value;?>
 disabled>精选
					</td>
				</tr>
				<tr>
					<td class="text-right">缩略图</td>
					<td>
						<img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->thumbnail;?>
" class="article-thumbnail img-circle" style="width:250px;height:250px;"><a href="javascript:void(0);" id="btn">换一张</a>
						<input type="file" name="thumbnail" class="form-control" style="display:none;" id="product_icon">
					</td>
					 <script>
      	$(function(){
      		var reader=new FileReader();
      		$("#product_icon").change(function(){
  				//限定图片类型
  				 if(!/image\/\w+/.test($("#product_icon").get(0).files[0].type)){
  					 	alert("头像必须是图片格式");
  						return false;
  				 }
  				 //限定图片大小
  				 if($("#product_icon").get(0).files[0].size>1000000){					 	
  						alert("图片不能大于1M");						
  						return false;
  				 }				 
  				 reader.readAsDataURL($("#product_icon").get(0).files[0]);
  					reader.onload=function(){
  						//console.log(this.result);
  						$(".article-thumbnail").attr("src",this.result);
  					}
  			});
      		$("#btn").click(function(){      			
      			$("#product_icon").click();
      		});
      	})
      </script>
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
					<td class="text-right">导语</td><td><textarea name="lead" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->lead;?>
</textarea></td>
				</tr>
				<tr>
					<td colspan="2">
					 <textarea rows="" cols="" name="content" id="content" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['oneArticle']->value->content;?>
</textarea>
					<script id="editor2" type="text/plain" style="width:100%"></script>
					<script type="text/javascript">    
						 var ue2 = UE.getEditor('editor2');							 
						 $('#editor2').html($("#content").val());
						 $(function(){
							 $("#submitBtn2").click(function(){
								 $("#content").val(ue2.getContent());
							 });
						 });
					</script>
					</td>
				</tr>
				<tr class="text-center"><td colspan="2"><input type="submit" value="提交" name="send" class="btn btn-success" id="submitBtn2"></td></tr>
		</table>
		</form>
	</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
