<?php
/* Smarty version 3.1.29, created on 2016-09-08 00:07:01
  from "/data/home/qyu1988070001/htdocs/application/views/home/home.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d03b25ac4e08_55436119',
  'file_dependency' => 
  array (
    'e1037c5d1acb38d8442e0e4331e528c4cf32e8c2' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/home.html',
      1 => 1473264418,
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
function content_57d03b25ac4e08_55436119 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?php echo @constant('KEY_WORDS');?>
">
<meta name="description" content="<?php echo @constant('DESCRIPTION');?>
">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="libs/Require/RequireJS.js" data-main='public/scripts/front'><?php echo '</script'; ?>
>
<link href="public/styles/home.css" rel="stylesheet">
<!-- <link href="public/styles/member.css" rel="stylesheet"> -->
<link href="public/styles/common.css" rel="stylesheet">
<link href="public/styles/header.css" rel="stylesheet">
</head>
<body id="home">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/common.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- <div class="row">
		 <div class="col-md-12 slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">					
					<ol class="carousel-indicators">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['slider']->value;
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
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"></li>
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
						<?php }?>
					</ol>					
					<div class="carousel-inner" role="listbox">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php
$_from = $_smarty_tpl->tpl_vars['slider']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_1_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_1_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>					   
						<div class="item">
							<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value->link;?>
" target="_blank"><img src="public/uploads/ad/<?php echo $_smarty_tpl->tpl_vars['value']->value->thumbnail;?>
" title="<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
"></a>
							<div class="carousel-caption">
								<h3><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</h3>
	                            <p><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</p>
							</div>
						</div>
						<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_local_item;
}
if ($__foreach_value_1_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_1_saved_item;
}
?>
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
					<a class="left carousel-control" href="#carousel-example-generic"
						role="button" data-slide="next"> <span
						class="glyphicon glyphicon-chevron-left"></span> <span
						class="sr-only">Previous</span>
					</a> <a class="right carousel-control" href="#carousel-example-generic"
						role="button" data-slide="prev"> <span
						class="glyphicon glyphicon-chevron-right"></span> <span
						class="sr-only">Next</span>
					</a>
				</div>
		</div> 
</div> --> 
<div id="scrollContainer">
<div class="container" style="margin-top: 0px;">
	<div class="row" style="margin-top: 0px;">
		<div class="col-md-12" style="padding:0;">		
		<dl class="nav navList">
				<dd class="active"><a href="index.php">Home</a></dd>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['frontNav']->value;
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
				<?php if ($_smarty_tpl->tpl_vars['value']->value->hasChild == 0) {?>
				<dd><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value->url;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
				<?php } else { ?>
				<dd><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>
				<?php }?> 
				<!-- <dd><a href="?a=subnav&action=show&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd> -->
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
				<!-- <dd><a href="?a=product&m=show" target="_blank">Mall</a></dd>
				<dd><a href="?a=paper&m=show" target="_blank">考试</a></dd>
				<dd><a href="?a=ask&m=AllAsk" target="_blank">Ask</a></dd>
				<dd><a href="?a=download&m=AllDownload" target="_blank">下载</a></dd> 
				<dd><a href="?a=project&action=show" target="_blank">范例</a></dd>
				<dd><a href="?a=dict&action=show" target="_blank">IT词典<a></dd> -->
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
		</div>
	</div>
	<div class="row allCourse">
		<span class="column_title">Test</span><span class="more pull-right"><a href="?a=paper&m=show" target="_blank">更多</a></span>
		<hr>
		<div class="col-md-8 hotCourse">
			<?php
$_from = $_smarty_tpl->tpl_vars['allCourse']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_3_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_3_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_3_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
			<table class="table table-bordered table-striped table-hover table-condensed">
				<tr><th><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</th></tr>
				<tr class="intro"><td></td></tr>
				<tr>
					<td>
						<a href="?a=quiz&action=show&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="btn btn-success btn-block takeTest" target="_blank">参 加 考 试</a>
					</td>
				</tr>
			</table>
			<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_3_saved_local_item;
}
if ($__foreach_value_3_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_3_saved_item;
}
if ($__foreach_value_3_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_3_saved_key;
}
?>
		</div>		
		<div class="col-md-4">			
			<table class="table table-striped table-hover table-condensed" style="border:1px solid #ddd;">
				<tr><th style="text-align:center;" colspan="4">最 新 成 绩</th></tr>
				<?php
$_from = $_smarty_tpl->tpl_vars['newExam']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_4_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_4_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_4_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>						
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->uid,10,'');?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value->cid;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['v']->value->score;?>
分</td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_local_item;
}
if ($__foreach_v_4_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_item;
}
if ($__foreach_v_4_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_4_saved_key;
}
?>
			</table>
		</div>
	</div>	
	<div class="row allCourse">
			<span class="column_title">Mall</span><span class="more pull-right"><a href="?a=product&m=show" target="_blank">更多</a></span>
			<hr>
		<div class="col-md-8 hotProduct">			
			<?php
$_from = $_smarty_tpl->tpl_vars['allProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_5_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_5_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_5_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<tr><td><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
" title='<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
'></a></td></tr>
			<tr><th><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></th></tr>
			<tr><td class="text-danger"><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
元</td></tr>
			</table>
			<!-- <dl>
				<dd><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><img src="public/uploads/product/<?php echo $_smarty_tpl->tpl_vars['value']->value->pix;?>
" title='<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
'></a></dd>
				<dt><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dt>
				<dd class="take"><span class="pull-left">¥&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
</span><span class="pull-right text-muted"><?php echo $_smarty_tpl->tpl_vars['value']->value->author;?>
</span></dd>
			</dl> -->
			<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_5_saved_local_item;
}
if ($__foreach_value_5_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_5_saved_item;
}
if ($__foreach_value_5_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_5_saved_key;
}
?>
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover table-condensed" style="border:1px solid #ddd">
				<tr><th style="text-align:center;" colspan="3">商 品 推 荐</th></tr>
				<?php if ($_smarty_tpl->tpl_vars['productRecommend']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['productRecommend']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_6_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_6_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_6_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
				<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
				<td><a href="?a=cart&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->price;?>
元</td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_6_saved_local_item;
}
if ($__foreach_value_6_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_6_saved_item;
}
if ($__foreach_value_6_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_6_saved_key;
}
?>
				<?php } else { ?>
				<?php }?>
			</table>
		</div>
	</div>
		
	<div class="row down">
	<span class="column_title">WebBuzz</span><span class="more pull-right"><a href="#">更多</a></span>
			<hr>
		<div class="col-md-8">			
		<?php if ($_smarty_tpl->tpl_vars['headline']->value) {?>
		<div class="side-corner-tag">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['headline']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['headline']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['headline']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['headline']->value->lead,120,"...");?>
</a></td></tr>
				<p><span>头条</span></p>
			</table>
		</div>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/default.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2" class="newscontent">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['recommend']->value) {?>
		<div class="side-corner-tag">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['recommend']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['recommend']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><a href="?a=detail&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['recommend']->value->lead,120,"...");?>
</a></td></tr>
				<p><span>推荐</span></p>
			</table>
		</div>
		<?php } else { ?>
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><img src="public/images/default.jpg" class="img-circle"></td><td><h2><a href="#">新闻标题</a></h2></td><td style="width:70px;">22</td></tr>
				<tr><td colspan="2">文章简介文章简介文章简介文章简介</td></tr>
			</table>
		<?php }?>
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover table-condensed" style="border:1px solid #ddd">
				<tr><th style="text-align:center;" colspan="3">最 新 下 载</th></tr>
				<?php if ($_smarty_tpl->tpl_vars['downloadLeaderboard']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['downloadLeaderboard']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_7_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_7_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_7_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td>
						<?php if ($_smarty_tpl->tpl_vars['value']->value->name) {?>
						<!-- ?a=download&m=updateDownloadNum&name=<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
 -->
						<a data-description="<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
" data-time="<?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
"  data-count='<?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
' data-href="?a=download&m=updateDownloadNum&name=<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" href="#" class="downloadBar" target="_blank" data-toggle="modal" data-target="#downloadModal" data-title="<?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,20,'');?>
</a>							
						<?php } else { ?>
						<!-- <?php echo $_smarty_tpl->tpl_vars['value']->value->url;?>
 -->
						<a data-description="<?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
"    data-time="<?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
"  data-count='<?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
' data-href='<?php echo $_smarty_tpl->tpl_vars['value']->value->url;?>
' href="#" class="downloadBar" info="<?php echo $_smarty_tpl->tpl_vars['value']->value-'id';?>
" target="_blank" data-toggle="modal" data-target="#downloadModal" data-title="<?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,20,'');?>
</a>							
						<?php }?>
						
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
次</td>
				<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_7_saved_local_item;
}
if ($__foreach_value_7_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_7_saved_item;
}
if ($__foreach_value_7_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_7_saved_key;
}
?>	
				<?php } else { ?>
				<?php }?>
			</table>
				
		</div>		
	</div>	
<div class="row middle">
	<span class="column_title">Ask</span><span class="more pull-right"><a href="?a=ask&m=AllAsk" target="_blank">更多</a></span>
			<hr>
		<div class="col-md-8">								
			<?php if ($_smarty_tpl->tpl_vars['AllAsk']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['AllAsk']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_8_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_8_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_8_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
				<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;" class='tr'>
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" style="color:white;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->answerNum;?>
<br>回复</a></td>
					 <td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="question_title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,40,"...");?>
</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="?a=ask&m=addTopic" class="btn btn-success" target="_blank">我要提问</a></td>				
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				<?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
于<?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>

				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
' target="_blank">回复</a>
				</td></tr>
				</table>
				<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_8_saved_local_item;
}
if ($__foreach_value_8_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_8_saved_item;
}
if ($__foreach_value_8_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_8_saved_key;
}
?>				
				<?php } else { ?>
				<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;" class='tr'>
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" style="color:white;" target="_blank">8<br>回复</a></td>
					 <td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="question_title">demo demo demo</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="#" class="btn btn-success" target="_blank">我要提问</a></td>				
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				Demo于2016.03.07
				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
' target="_blank">回复</a>
				</td></tr>				
				</table>
				<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;" class='tr'>
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" style="color:white;" target="_blank">8<br>回复</a></td>
					 <td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="question_title">demo demo demo</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="#" class="btn btn-success" target="_blank">我要提问</a></td>				
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				Demo于2016.03.07
				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
' target="_blank">回复</a>
				</td></tr>				
				</table>
				<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;" class='tr'>
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" style="color:white;" target="_blank">8<br>回复</a></td>
					 <td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="question_title">demo demo demo</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="#" class="btn btn-success" target="_blank">我要提问</a></td>				
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				Demo于2016.03.07
				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
' target="_blank">回复</a>
				</td></tr>				
				</table>				
				<?php }?>			
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover table-condensed" style="border:1px solid #ddd">
				<tr><th style="text-align:center;" colspan="3">最 新 问 答</th></tr>
				<?php if ($_smarty_tpl->tpl_vars['askLeaderboard']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['askLeaderboard']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_9_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_9_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_9_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,25,"...");?>
</a></td>
					<td>提问者</td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_9_saved_local_item;
}
if ($__foreach_value_9_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_9_saved_item;
}
if ($__foreach_value_9_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_9_saved_key;
}
?>	
				<?php } else { ?>	
				<tr><td>1</td><td><a href="javascript:void(0)">最佳前端入门方法</a></td><td>tom</td></tr>
				<tr><td>2</td><td><a href="javascript:void(0)">CSS权威指南如何？</a></td><td>tom</td></tr>
				<tr><td>3</td><td><a href="javascript:void(0)">JavaScript红宝书在哪儿有卖？</a></td><td>tom</td></tr>
				<tr><td>4</td><td><a href="javascript:void(0)">锋利的jQuery锋利在哪儿？</a></td><td>tom</td></tr>
				<tr><td>5</td><td><a href="javascript:void(0)">PHP核心模块这边书有价值吗？</a></td><td>tom</td></tr>
				<tr><td>6</td><td><a href="javascript:void(0)">PHP设计模式的低劣之处</a></td><td>tom</td></tr>
				<tr><td>7</td><td><a href="javascript:void(0)">程序员修炼之道！</a></td><td>tom</td></tr>
				
				<?php }?>
				</table>
		</div>
	</div>
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</div>
</body>
</html><?php }
}
