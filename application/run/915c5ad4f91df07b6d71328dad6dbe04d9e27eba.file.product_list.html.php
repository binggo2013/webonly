<?php /* Smarty version Smarty-3.1.19, created on 2015-10-18 21:46:27
         compiled from "/home/xiangruikong/public_html/application/views/home/product_list.html" */ ?>
<?php /*%%SmartyHeaderCode:1404109281559bbecbdabc28-76377170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915c5ad4f91df07b6d71328dad6dbe04d9e27eba' => 
    array (
      0 => '/home/xiangruikong/public_html/application/views/home/product_list.html',
      1 => 1445165839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1404109281559bbecbdabc28-76377170',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_559bbecbe8d780_93593821',
  'variables' => 
  array (
    'oneProduct' => 0,
    'show' => 0,
    'allProducts' => 0,
    'value' => 0,
    'detail' => 0,
    'productRecommend' => 0,
    'key' => 0,
    'cart' => 0,
    'sum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559bbecbe8d780_93593821')) {function content_559bbecbe8d780_93593821($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->name;?>
</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/buttons.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/productdetail.css" rel="stylesheet">
<script src="public/scripts/home.js"></script>
<script src="public/scripts/tools.js"></script>
<link href="public/styles/tools.css" rel="stylesheet">
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-8 productList">
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
		<div class="col-md-8">
			coming soon!
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['detail']->value) {?>
<div class="row">
		<div class="col-md-4 pix text-right">
		<div>
			<img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->pix;?>
">
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<h1 class="clearfix"></h1>
			</ul>
		</div>
	</div>
	<div class="col-md-6 detail">
	<form method="post" action="?a=cart&action=cart" class="form-horizontal">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
">
		<table class="table table-bordered table-striped table-hover table-condensed">
			<tr class="text-center"><td colspan="2"><h3><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->name;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
" style="border:0;background:transparent;"></h3></td></tr>
			<tr>
				<td class="text-right">作者</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->author;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->id;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				<td class="text-right">价格</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->price;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				<td class="text-right">库存</td>
				<td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
" id="<?php echo $_smarty_tpl->tpl_vars['oneProduct']->value->inventory;?>
" style="border:0;background:transparent;"></td>				
			</tr>
			<tr>
				<td class="text-right"></td>
				<td><input type="submit" class="button button-raised button-primary" value="放 入 购 物 车" name="send"></td>				
			</tr>
		</table>		
	</form>
		</div>
		<div class="col-md-2">
			
		</div>
</div>
<div class="row">
	<div class="col-md-4">
		<dl class="board">
				<dt class="text-center">商品推荐</dt>
				<?php if ($_smarty_tpl->tpl_vars['productRecommend']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['productRecommend']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
				<?php } ?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['cart']->value) {?>
<div class="row">
	<div class="col-md-12 cart">
	<table class="table table-bordered table-striped table-hover">
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
<?php } ?>
<tr>
	<td align="right" colspan="5">
	<a href="?a=cart&action=removeProduct&num=removeAll" class="btn btn-info">清空购物车</a>&nbsp;&nbsp;
	<a href="?" class="btn btn-warning">继续购物</a>
	<a href="?a=cart&action=placeOrder" class="btn btn-success">提交订单</a>
	总计：<?php echo $_smarty_tpl->tpl_vars['sum']->value;?>

	</td>
</tr>
<?php } else { ?>
<tr>
	<td></td>
</tr>
<?php }?>
</table>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>
