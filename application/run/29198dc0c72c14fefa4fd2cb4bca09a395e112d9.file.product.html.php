<?php /* Smarty version Smarty-3.1.19, created on 2015-12-28 21:21:21
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/product.html" */ ?>
<?php /*%%SmartyHeaderCode:1166563128568137518e8558-64073561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29198dc0c72c14fefa4fd2cb4bca09a395e112d9' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/product.html',
      1 => 1447292256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1166563128568137518e8558-64073561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'allProducts' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'page' => 0,
    'add' => 0,
    'category' => 0,
    'update' => 0,
    'oneProduct' => 0,
    'headline' => 0,
    'recommend' => 0,
    'focus' => 0,
    'topic' => 0,
    'pickup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568137519df974_25650598',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568137519df974_25650598')) {function content_568137519df974_25650598($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>添加商品</title>
<link href='public/styles/base.css' rel="stylesheet">
<link href='public/styles/bootstrap.css' rel="stylesheet">
<link href='public/styles/font-awesome.css' rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/product.js"></script>
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
					<li><a href='?a=ad&action=show'>商品管理</a></li>
					<li class="active">显示商品</li>
					<li><a href="?a=product&m=add" title='添加商品'><i class="fa fa-plus-circle"></i></a></li>
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=product&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>名称</td>
					<td>价格</td>
					<td>库存</td>
					<td>分类</td>
					<td>属性</td>
					<td>显示|隐藏</td>
					<td>描述</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['allProducts']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->inventory;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->attr;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
					<td><?php if ($_smarty_tpl->tpl_vars['value']->value->description) {?>有描述<?php } else { ?>无描述<?php }?></td>
					<td>
						<a href="?a=product&action=updateProduct&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
						<a href="?a=product&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>						
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="9"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="7">暂无商品</td></tr>
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
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=ad&action=show'>商品管理</a></li>
			<li class="active">添加商品</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select name="cid" id="cid" class="form-control" style="width:150px;display:inline-block">
      	<option value="0">选择一个分类</option><?php echo $_smarty_tpl->tpl_vars['category']->value;?>

      </select>(<span class="glyphicon glyphicon-asterisk text-danger"></span>)
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="商品名称" name="name">
    </div>
  </div>
  <div class="form-group">
    <label for="author" class="col-sm-2 control-label">作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" placeholder="商品名称" name="author">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" placeholder="商品价格" name="price">
    </div>
  </div>  
	<div class="form-group">
	    <label for="inputPassword3" class="col-sm-2 control-label">商品价格</label>
	    <div class="col-sm-10">	      	
			<input type="checkbox" value="recommend" name="attr[]">推荐
			<input type="checkbox" value="focus" name="attr[]" disabled>焦点
			<input type="checkbox" value="topic" name="attr[]" disabled>专题
			<input type="checkbox" value="pickup" name="attr[]" disabled>精选
	    </div>
  	</div>					
  <div class="form-group">
    <label for="inventory" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inventory" placeholder="商品库存" name="inventory">
    </div>
  </div>
	<div class="form-group">
    <label for="pix" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="pix" placeholder="商品图片" name="pix">
    </div>
  </div>
  <div class="form-group">
    <label for="description" class="col-sm-2 control-label">商品描述</label>
    <div class="col-sm-10">
		<script id="editor" type="text/plain"  name="description" id="description"></script>
		<script type="text/javascript">
    		var ue = UE.getEditor('editor');
    	</script>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-success" name="send" value="添 加" id="submitBtn">
    </div>
  </div>
</form>
</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb">
			<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
			<li><a href='?a=ad&action=show'>商品管理</a></li>
			<li class="active">修改商品</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">
	<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">商品分类</label>
    <div class="col-sm-10">
      <select name="cid" class="form-control" style="width:120px;">      
      		<?php echo $_smarty_tpl->tpl_vars['category']->value;?>

      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="商品名称" name="name" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->name;?>
">
    </div>
  </div>
  <div class="form-group">
    <label for="author" class="col-sm-2 control-label">作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" placeholder="商品名称" name="author" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->author;?>
">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">商品价格</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" placeholder="商品价格" name="price" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">商品属性</label>
    <div class="col-sm-10">
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
    </div>
  </div>  
  <div class="form-group">
    <label for="inventory" class="col-sm-2 control-label">商品库存</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inventory" placeholder="商品库存" name="inventory" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
">
    </div>
  </div>
	<div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->pix;?>
" class="product-icon" id="aaaa"><a href="javascript:void(0);" id="btn">换一张</a>
      <input type="hidden" name="pix2" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->pix;?>
">
      <input type="file" id="product_icon" name="pix" style="display:none">
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
  						$(".product-icon").attr("src",this.result);
  					}
  			});
      		$("#btn").click(function(){      			
      			$("#product_icon").click();
      		});
      	})
      </script>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">商品描述</label>
    <div class="col-sm-10">
		<script id="editor" type="text/plain"  name="description"><?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->description;?>
</script>
		<script type="text/javascript">
    		var ue = UE.getEditor('editor');
    	</script>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-success" name="send" value="修 改">
    </div>
  </div>
</form>
</div>
</div>
<?php }?>
</body>
</html><?php }} ?>
