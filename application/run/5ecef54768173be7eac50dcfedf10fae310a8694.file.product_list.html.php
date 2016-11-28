<?php /* Smarty version Smarty-3.1.19, created on 2015-06-16 10:12:45
         compiled from "C:\xampp\htdocs\quiz\application\views\home\product_list.html" */ ?>
<?php /*%%SmartyHeaderCode:4414557e7b0621d414-51815463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ecef54768173be7eac50dcfedf10fae310a8694' => 
    array (
      0 => 'C:\\xampp\\htdocs\\quiz\\application\\views\\home\\product_list.html',
      1 => 1434420761,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4414557e7b0621d414-51815463',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_557e7b062a03b5_99807689',
  'variables' => 
  array (
    'show' => 0,
    'allProducts' => 0,
    'value' => 0,
    'detail' => 0,
    'oneProduct' => 0,
    'cart' => 0,
    'sum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557e7b062a03b5_99807689')) {function content_557e7b062a03b5_99807689($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>quzi</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<link href="public/styles/detail.css" rel="stylesheet">
<style>
.productList dl{
	border:1px solid #ddd;
	width:100px;
	text-align:center;
	float:left;
	margin-left:25px;
	box-shadow:0 0 8px #ddd;
}
.productList dl img{
	width:100px;
	height:200px;
}
</style>
</head>
<body>
<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-10 productList">
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<dl>
				<dd><img src="public/uploads/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
" title='<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
'></dd>
			<dd><a href="?a=product&m=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="btn btn-primary take" target="_blank">购买</a></dd>
			</dl>
			<?php } ?>
		</div>
		<div class="col-md-2">
			coming soon
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['detail']->value) {?>
<div class="row">
		<div class="col-md-10 detail">
		<div id="detail">
	<div id="left">
		<img src="public/uploads/<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->pix;?>
">
		<ul>
			<li>1</li>
			<li>1</li>
			<li>1</li>
			<li>1</li>
		</ul>
	</div>
	<dl id="right">
	<form method="post" action="?a=product&m=cart" class="form-inline">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">
		<dt class="text-success">
		<div class="form-group">
		    <label for="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">商品名称：</label>
		    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->name;?>
" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">
  		</div>
  		</dt>
		<dd>
		<div class="form-group">
			<label for="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
">商品名称：</label>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
">
		</div>
		</dd>
		<dd>
		<div class="form-group">
			<label for="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
">商品库存：</label>
			<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
" class="form-control" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
">
		</div>
		</dd>
		<dd><input type="submit" class="btn btn-danger icon-shopping-cart cart" value="放入购物车"></a></dd>
	</form>
	</dl>
</div>
		</div>
		<div class="col-md-2">
			coming soon
		</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['cart']->value) {?>
<div class="row">
	<div class="col-md-10">
	<table class="table table-bordered">
<tr>
	<th>商品名称</th>
	<th>数量|</th>
	<th>商品单价</th>
	<th>商品价格</th>
	<th>操作</th>
</tr>
<?php if ($_smarty_tpl->tpl_vars['cart']->value) {?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['cart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
<tr>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
	<td>
		<a class="btn btn-primary glyphicon glyphicon-chevron-up" onclick='location.href="?a=product&m=update&type=plus&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"'></a>
			[<?php echo $_smarty_tpl->tpl_vars['value']->value->num;?>
]
		<a class="btn btn-primary glyphicon glyphicon-chevron-down" onclick='location.href="?a=product&m=update&type=minus&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"'></a>
	</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</td>
	<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price*$_smarty_tpl->tpl_vars['value']->value->num;?>
</td>
	<td><a href="?a=product&m=removeProduct&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&num=removeOne" class="btn btn-danger">移除商品</a></td>
</tr>
<?php } ?>
<tr>
	<td align="right" colspan="5">
	<a href="?a=product&m=removeProduct&num=removeAll" class="btn btn-info">清空购物车</a>&nbsp;&nbsp;
	<a href="?a=product&m=show" class="btn btn-warning">继续购物</a>
	<a href="?a=product&m=placeOrder" class="btn btn-success">提交订单</a>
	总计：<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>

	</td>
</tr>
<?php } else { ?>
<tr>
	<td>暂无商品</td>
</tr>
<?php }?>
</table>
	</div>
	<div class="col-md-2"></div>
</div>
<?php }?>
</div>
</body>
</html><?php }} ?>
