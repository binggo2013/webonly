<?php /* Smarty version Smarty-3.1.19, created on 2016-07-07 22:57:02
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/home.html" */ ?>
<?php /*%%SmartyHeaderCode:1974175571564542b1970607-78418466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1037c5d1acb38d8442e0e4331e528c4cf32e8c2' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/home.html',
      1 => 1467903419,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1974175571564542b1970607-78418466',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564542b1c31503_98692967',
  'variables' => 
  array (
    'slider' => 0,
    'key' => 0,
    'value' => 0,
    'frontNav' => 0,
    'allCourse' => 0,
    'arr' => 0,
    'k' => 0,
    'v' => 0,
    'allProducts' => 0,
    'productRecommend' => 0,
    'headline' => 0,
    'topic' => 0,
    'recommend' => 0,
    'downloadLeaderboard' => 0,
    'AllAsk' => 0,
    'askLeaderboard' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564542b1c31503_98692967')) {function content_564542b1c31503_98692967($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
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
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<script src="public/scripts/member.js"></script>
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/member.css" rel="stylesheet">
<!-- <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101286045" data-redirecturi="http://www.webonly.org" charset="utf-8"></script> -->
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- <div class="row">
		 <div class="col-md-12 slider">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">					
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
					<div class="carousel-inner" role="listbox">
						<?php if ($_smarty_tpl->tpl_vars['slider']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
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
<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding:0;">		
		<dl class="nav navList">
				<dd class="active"><a href="index.php">Home</a></dd>
				<?php if ($_smarty_tpl->tpl_vars['frontNav']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['frontNav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['value']->value->hasChild==0) {?>
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
				<?php } ?>
				<!-- <dd><a href="?a=product&m=show" target="_blank">Mall</a></dd>
				<dd><a href="?a=paper&m=show" target="_blank">考试</a></dd>
				<dd><a href="?a=ask&m=AllAsk" target="_blank">Ask</a></dd>
				<dd><a href="?a=download&m=AllDownload" target="_blank">下载</a></dd> -->
				<!-- <dd><a href="?a=project&action=show" target="_blank">范例</a></dd>
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
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allCourse']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<dl>
				<dt><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</dt>
				<dd class="take"><a href="?a=quiz&action=show&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="btn btn-success btn-block" target="_blank">参 加 考 试</a></dd>
			</dl>
			<?php } ?>
		</div>		
		<div class="col-md-4">			
			<dl class="board text-center">
			<h3 class="text-center">成绩排行</h3>
				<?php if ($_smarty_tpl->tpl_vars['arr']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dt class="text-center userLeaderboard"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</dt>
				<?php } ?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<div class="boardContent text-left">
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>						
					<dd><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</span><a><?php echo $_smarty_tpl->tpl_vars['v']->value->uid;?>
</a>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value->score;?>
分</dd>
					<?php } ?>
				</div>	
				<?php } ?>					
				<?php } else { ?>			
				<dd><span>1</span><a href="javascript:void(0)">Tom</a></dd>
				<dd class="bg-gray"><span>2</span><a href="javascript:void(0)">Peter</a></dd>
				<dd><span>3</span><a href="javascript:void(0)">Mary</a></dd>
				<dd class="bg-gray"><span>4</span><a href="javascript:void(0)">Mike</a></dd>
				<dd><span>5</span><a href="javascript:void(0)">Grace</a></dd>
				<?php }?>
			</dl>
		</div>
	</div>	
	<div class="row allCourse">
			<span class="column_title">Mall</span><span class="more pull-right"><a href="?a=product&m=show" target="_blank">更多</a></span>
			<hr>
		<div class="col-md-8 hotProduct">			
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<dl>
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
			</dl>
			<?php } ?>
		</div>
		<div class="col-md-4">
			<dl class="board">
				<dt class="text-center">商 品 推 荐</dt>
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
	</div>
		
	<div class="row down">
	<span class="column_title">WebBuzz</span><span class="more pull-right"><a href="#">更多</a></span>
			<hr>
		<div class="col-md-8">			
		<?php if ($_smarty_tpl->tpl_vars['headline']->value) {?>
		<div class="side-corner-tag">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['headline']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['headline']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['headline']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['topic']->value->id;?>
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
				<tr style="height:33px;"><td rowspan="2" style="width:120px;"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><img src="public/uploads/article/<?php echo $_smarty_tpl->tpl_vars['recommend']->value->thumbnail;?>
" class="img-circle"></a></td><td class="newstitle"><h2><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['recommend']->value->title;?>
</a></h2></td><td style="width:70px;"><span></span></td></tr>
				<tr><td colspan="2" class="newscontent"><a href="?a=article&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value->id;?>
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
			<dl class="board">
				<dt class="text-center">最 新 下 载</dt>
				<?php if ($_smarty_tpl->tpl_vars['downloadLeaderboard']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['downloadLeaderboard']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd>
					<span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>
					<?php if ($_smarty_tpl->tpl_vars['value']->value->name) {?>
							<i class="fa fa-download" style="color:gray;"></i>
							<a href="?a=download&m=updateDownloadNum&name=<?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="downloadBtn" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</a>							
							<?php } else { ?>
							<i class="fa fa-download" style="color:gray;"></i>
							<a href="<?php echo $_smarty_tpl->tpl_vars['value']->value->url;?>
" class="downloadBar" info="<?php echo $_smarty_tpl->tpl_vars['value']->value-'id';?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</a>							
					<?php }?>
					&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
次
				</dd>
				<?php } ?>	
				<?php } else { ?>			
				<dd><span>1</span><a href="javascript:void(0)">最佳前端入门方法</a></dd>
				<dd class="bg-gray"><span>2</span><a href="javascript:void(0)">CSS权威指南如何？</a></dd>
				<dd><span>3</span><a href="javascript:void(0)">JavaScript红宝书在哪儿有卖？</a></dd>
				<dd class="bg-gray"><span>4</span><a href="javascript:void(0)">锋利的jQuery锋利在哪儿？</a></dd>
				<dd><span>5</span><a href="javascript:void(0)">PHP核心模块这边书有价值吗？</a></dd>				
				<?php }?>
			</dl>
		</div>		
	</div>	
<div class="row middle">
	<span class="column_title">Ask</span><span class="more pull-right"><a href="?a=ask&m=AllAsk" target="_blank">更多</a></span>
			<hr>
		<div class="col-md-8">								
			<?php if ($_smarty_tpl->tpl_vars['AllAsk']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllAsk']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
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
				<?php } ?>				
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
			<dl class="board">
				<dt class="text-center">热 门 问 答</dt>
				<?php if ($_smarty_tpl->tpl_vars['askLeaderboard']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['askLeaderboard']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<dd><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,25,"...");?>
</a></dd>
				<?php } ?>	
				<?php } else { ?>			
				<dd><span>1</span><a href="javascript:void(0)">最佳前端入门方法</a></dd>
				<dd class="bg-gray"><span>2</span><a href="javascript:void(0)">CSS权威指南如何？</a></dd>
				<dd><span>3</span><a href="javascript:void(0)">JavaScript红宝书在哪儿有卖？</a></dd>
				<dd class="bg-gray"><span>4</span><a href="javascript:void(0)">锋利的jQuery锋利在哪儿？</a></dd>
				<dd><span>5</span><a href="javascript:void(0)">PHP核心模块这边书有价值吗？</a></dd>
				<dd class="bg-gray"><span>6</span><a href="javascript:void(0)">PHP设计模式的低劣之处</a></dd>
				<dd><span>7</span><a href="javascript:void(0)">程序员修炼之道！</a></dd>
				<?php }?>
			</dl>
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</div>
</body>
</html><?php }} ?>
