<?php
/* Smarty version 3.1.29, created on 2016-09-11 20:19:59
  from "/data/home/qyu1988070001/htdocs/application/views/home/product_list.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d54bef1a2b04_88542479',
  'file_dependency' => 
  array (
    'ab4cb9fb23b4e072ed916d6722fcf622eb9b9768' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/product_list.html',
      1 => 1473596396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/common.html' => 1,
    'file:home/header.html' => 1,
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_57d54bef1a2b04_88542479 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商城首页</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/buttons.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="libs/Require/RequireJS.js" data-main='public/scripts/front'><?php echo '</script'; ?>
>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/productlist.css" rel="stylesheet">
<link href="public/styles/common.css" rel="stylesheet">
<link href="public/styles/header.css" rel="stylesheet">
</head>
<body>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
<div class="row">
		<div class="col-md-12" id="breadcrumb" style="padding-left:1px;padding-right:1px;">
			<ul class="breadcrumb" style="background:url(public/images/topbar_bg.gif);margin-bottom:0;">
				<li><a href='index.php'>首页</a></li>
			<?php if ($_smarty_tpl->tpl_vars['mainNav']->value) {?>
				<li><a href='?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['mainNav']->value->name;?>
</a></li>
				<li><a href="?a=subnavdetail&action=show&name=<?php echo $_smarty_tpl->tpl_vars['subNav']->value->name;?>
&father=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->name;?>
&fid=<?php echo $_smarty_tpl->tpl_vars['mainNav']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['subNav']->value->name;?>
</a></li>
			<?php } else { ?>
				<li><a href='?a=subnav&action=show'>主导航</a></li>
				<li><a href='?a=subnavdetail&action=show'>子导航</a></li>
			<?php }?>
				<li class="active">正文</a></li>
			</ul>
		</div>
	</div>
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row" style="border:0;">
		<div class="col-md-8 hotProduct">
			<?php
$_from = $_smarty_tpl->tpl_vars['allProducts']->value;
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
			<dl>
				<dd><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
"></a></dd>
				<dt><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dt>
				<dd class="take"><span class="pull-left">¥&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</span><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank" class="pull-right text-danger">点击购买</a></dd>
			</dl>
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
		</div>
		<div class="col-md-4">
			coming soon!
		</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['detail']->value) {?>
<div class="row" style="border:0;">
	<div class="col-md-12 detail">
	
	<form method="post" action="?a=cart&action=cart" class="form-horizontal" >
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">
		<table class="table table-bordered table-striped table-hover table-condensed" style="margin:0">
			<tr class="text-center"><td colspan="2"><h3><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->name;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
" style="border:0;background:transparent;"></h3></td></tr>
			<tr>
				<td class="text-right" rowspan="4" width="271">
				<img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->pix;?>
" style="width:100%;height:100%;">
				</td>
				<td style="line-height:77px;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->author;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				
				<td style="line-height:77px;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				
				<td style="line-height:77px;"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				
				<td style="line-height:77px;"><input type="submit" class="button button-raised button-primary takeTest" value="放 入 购 物 车" name="send"></td>				
			</tr>
		</table>		
	</form>
		</div>
</div>
<div class="row">
	<div class="col-md-4">
		<dl class="board">
				<dt class="text-center">商品推荐</dt>
				<?php if ($_smarty_tpl->tpl_vars['productRecommend']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['productRecommend']->value;
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
				<dd><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
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
				<?php } else { ?>
				<dd><span>1</span><a href="javascript:void(0)">HTML从入门到精通</a></dd>
				<dd class="bg-gray"><span>2</span><a href="javascript:void(0)">CSS权威指南</a></dd>
				<dd><span>3</span><a href="javascript:void(0)">JavaScript红宝书</a></dd>
				<dd class="bg-gray"><span>4</span><a href="javascript:void(0)">锋利的jQuery</a></dd>
				<dd><span>5</span><a href="javascript:void(0)">PHP核心模块</a></dd>
				<dd class="bg-gray"><span>4</span><a href="javascript:void(0)">PHP设计模式</a></dd>
				<?php }?>
			</dl>
	</div>
	<div class="col-md-8 description">
		<div><?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->description;?>
</div>
	</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['cart']->value) {?>
<div class="row">
	<div class="col-md-12 cart">
	<table class="table table-bordered table-striped table-hover">
<?php
$_from = $_smarty_tpl->tpl_vars['cart']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_2_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_2_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_2_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
<tr>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
	<td>
		<a class="btn btn-primary glyphicon glyphicon-chevron-up" onclick='location.href="?a=cart&action=update&type=plus&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"'></a>
			[<?php echo $_smarty_tpl->tpl_vars['value']->value->num;?>
]
		<a class="btn btn-primary glyphicon glyphicon-chevron-down" onclick='location.href="?a=cart&action=update&type=minus&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"'></a>
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price*$_smarty_tpl->tpl_vars['value']->value->num;?>
</td>
	<td><a href="?a=cart&action=removeProduct&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&num=removeOne" class="btn btn-danger">移除商品</a></td>
</tr>
<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_local_item;
}
if ($__foreach_value_2_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_2_saved_item;
}
if ($__foreach_value_2_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_2_saved_key;
}
?>
<tr>
	<td align="right" colspan="5">
	<a href="?a=cart&action=removeProduct&num=removeAll" class="btn btn-info">清空购物车</a>&nbsp;&nbsp;
	<a href="?" class="btn btn-warning">继续购物</a>
	<a href="?a=cart&action=placeOrder" class="btn btn-success">提交订单</a>
	总计：<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>

	</td>
</tr>
<?php }?>
</table>
	</div>
</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
