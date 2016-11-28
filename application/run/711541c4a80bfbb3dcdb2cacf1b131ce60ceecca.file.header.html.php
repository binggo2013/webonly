<?php /* Smarty version Smarty-3.1.19, created on 2015-07-01 10:24:27
         compiled from "C:\xampp\htdocs\KongMPS\application\views\home\header.html" */ ?>
<?php /*%%SmartyHeaderCode:55355593480f353c63-85083310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '711541c4a80bfbb3dcdb2cacf1b131ce60ceecca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\KongMPS\\application\\views\\home\\header.html',
      1 => 1435717464,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55355593480f353c63-85083310',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5593480f3a1561_34026080',
  'variables' => 
  array (
    'frontNav' => 0,
    'value' => 0,
    'logged' => 0,
    'banner' => 0,
    'slider' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5593480f3a1561_34026080')) {function content_5593480f3a1561_34026080($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
</head>
<body>
<div class="row top">
	<div class="col-md-12">
		<h3><a href="javascript:void(0)">KongMPS</a></h3>
		<dl class="nav nav-pills navList">
				<dd class="active"><a href="index.php">首页</a></dd>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['frontNav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
				<?php } ?>
				<dd><a href="?a=product&m=show" target="_blank">商城</a></dd>
				<dd><a href="?a=paper&m=show" target="_blank">在线考试</a></dd>
				<?php } else { ?>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd><a href="javascript:void(0)">关于我们</a></dd>
				<dd style="border:0"><a href="#">关于我们</a></dd>
				<?php }?>
				<div class="clearfix"></div>
			</dl>
		<ul>
			<li class="memberBar"><a style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>block<?php } else { ?>none<?php }?>" id="sess"><?php echo $_SESSION['oneUserName'];?>
<i class="caret"></i></a></li>
			<li><a href="javascript:void(0)" id="regBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">注册</a></li>
			<li><a href="javascript:void(0)" id="loginBar" style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>">登录</a></li>
			<li class="memberBar"><a style="display:<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>none<?php } else { ?>block<?php }?>" id="member"></a></li>
			<dl class="more">
				<dd><a href="javascript:void(0)">demo</a></dd>
				<dd><a href="javascript:void(0)">demo</a></dd>
				<dd><?php if ($_SESSION['id']) {?><a href="?a=user&action=member&id=<?php echo $_SESSION['id'];?>
" id="memberSpace" target="_blank"><?php } else { ?><a href="" id="memberSpace" target="_blank"><?php }?>会员中心</a></dd>
				<dd><a href="?a=home&action=logout">注销</a></dd>
			</dl>
			<div class="clearfix"></div>
		</ul>
	</div>
</div>
<!-- <div class="row">
		<div class="col-md-3 logo"><img src="public/images/logo.png"></div>
		<div class="col-md-9 banner"><?php if ($_smarty_tpl->tpl_vars['banner']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['banner']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['banner']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['banner']->value->description;?>
"></a><?php } else { ?><img src="public/images/bannerDemo.jpg" title="示例Banner"><?php }?></div>
</div> -->
	<div class="row">
		<div class="col-md-12 slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators:指示 -->
					<!-- 设置图片的大小 -->
					<ol class="carousel-indicators">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></li>
						<?php } ?>
						<?php }?>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
					    <!--一张图片  -->
						<div class="item">
							<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['value']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
"></a>
							<div class="carousel-caption">
								<!-- <h3><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</h3> -->
	                            <p><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</p>
							</div>
						</div>
						<?php } ?>
						<?php } else { ?>
						<div class="item">
							<img src="public/uploads/ad/20140909142825572.jpg" alt="...">
							<div class="carousel-caption">
								<h3>标题</h3>
	                            <p>阿斯顿发第三方</p>
                            </div>
						</div>
						<?php }?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic"
						role="button" data-slide="prev"> <span
						class="glyphicon glyphicon-chevron-left"></span> <span
						class="sr-only">Previous</span>
					</a> <a class="right carousel-control" href="#carousel-example-generic"
						role="button" data-slide="next"> <span
						class="glyphicon glyphicon-chevron-right"></span> <span
						class="sr-only">Next</span>
					</a>
				</div>
		</div>
	</div>
<!-- 	<div class="row">
		<div class="col-md-12 navList">
			<ul class="nav nav-pills">
				<li class="active"><a href="index.php">首页</a></li>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['frontNav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<li><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></li>
				<?php } ?>
				<li><a href="?a=product&m=show" target="_blank">商城</a></li>
				<li><a href="?a=paper&m=show" target="_blank">在线考试</a></li>
				<?php } else { ?>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li><a href="#">关于我们</a></li>
				<li style="border:0"><a href="#">关于我们</a></li>
				<?php }?>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div> -->
</body>
</html><?php }} ?>
