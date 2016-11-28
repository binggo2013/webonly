<?php /* Smarty version Smarty-3.1.19, created on 2016-01-03 21:12:23
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/download.html" */ ?>
<?php /*%%SmartyHeaderCode:15670726475645443727ce82-98647896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ef9093f9a45b556244aed8c88520601a746720a' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/download.html',
      1 => 1451826738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15670726475645443727ce82-98647896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564544373ee3b0_06571937',
  'variables' => 
  array (
    'show' => 0,
    'temp' => 0,
    'key' => 0,
    'value' => 0,
    'v' => 0,
    'page' => 0,
    'downloadLeaderboard' => 0,
    'allDownload' => 0,
    'oneTopic' => 0,
    'back' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564544373ee3b0_06571937')) {function content_564544373ee3b0_06571937($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>下载首页</title>
<link href="public/styles/bootstrap.css" rel="stylesheet" />
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/buttons.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/member.css" rel="stylesheet">
<link href="public/styles/download.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/member.js"></script>
<script src="public/scripts/tools.js"></script>
<script src="public/scripts/download.js"></script>
<script src="public/scripts/home.js"></script>
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class='container'>	
	<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-8">
		<dl class="memberTitle">
			<?php if ($_smarty_tpl->tpl_vars['temp']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['temp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<dd><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></dd>
			<?php } ?>
			<?php } else { ?>
			<dd><a href="javascript:void(0);">基本资料</a></dd>			
			<?php }?>
			<h1 class="clearfix"></h1>
		</dl>		
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['temp']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<div class="tab panel panel-default">
				<div class="panel-body">
						<p class="text-right"><a href="?a=download&m=all&name=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="text-danger">所有<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></p>
				</div>
			<?php if ($_smarty_tpl->tpl_vars['value']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>				
			<table class="table table-bordered table-striped table-hover" style="border:1px solid #2489c5;margin-bottom:5px;">
					<tr>				
						<td style='width:90px;'>名称:<?php echo $_smarty_tpl->tpl_vars['v']->value->title;?>
</td>
						<td  style='width:35px;'>
							<?php if ($_smarty_tpl->tpl_vars['v']->value->name) {?>
							<i class="fa fa-download" style="color:gray;"></i>
							<a href="?a=download&m=updateDownloadNum&name=<?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="downloadBtn">下载</a>							
							<?php } else { ?>
							<i class="fa fa-download" style="color:gray;"></i>
							<a href="<?php echo $_smarty_tpl->tpl_vars['v']->value->url;?>
" info="<?php echo $_smarty_tpl->tpl_vars['v']->value-'id';?>
" target="_blank" class="downloadBtn">下载</a>							
							<?php }?>
						</td>
						<td style='width:45px;'>下载次数:<?php echo $_smarty_tpl->tpl_vars['v']->value->download_num;?>
</td>
						<td style='width:90px;'>更新时间:<?php echo $_smarty_tpl->tpl_vars['v']->value->date;?>
</td>
					</tr>
					<tr>
						<td style='width:90px;' colspan="4">描述:<?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
					</tr>						
										
			</table>									
			<?php } ?>
			<?php } else { ?>
				<table class="table table-bordered table-striped table-hover" style="border:1px solid #ddd;margin-bottom:25px;">
					<tr>				
						<td style='width:90px;' class="text-right">名称</td><td>暂无文件可下载</td>
					</tr>
					<tr>
						<td style='width:90px;' class="text-right">描述</td><td>暂无文件可下载</td>
					</tr>
					<tr>
						<td style='width:90px;' class="text-right">文件</td>
						<td>暂无文件可下载</td>
					</tr>										
					<tr>
						<td style='width:90px;' class="text-right">下载次数</td><td><?php echo $_smarty_tpl->tpl_vars['v']->value->download_num;?>
</td>
					</tr>					
			</table>
			<?php }?>
		 </div>		
		<?php } ?>					
		</div>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

		<div class="col-md-4">
			<dl class="board">
				<dt class="text-center">热门下载</dt>
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
					<a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,25,"...");?>
</a>
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
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['allDownload']->value) {?>
	<div class="row">
	<div class="col-md-8">
		<dl class="memberTitle text-primary" style="padding-left:15px;"><?php echo $_smarty_tpl->tpl_vars['oneTopic']->value->name;?>
&nbsp;&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
"><button class="button button-3d button-action button-circle" style="margin:5px;" title="返回"><i class="fa fa-reply"></i></button></a></dl>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allDownload']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>				
			<table class="table table-bordered table-striped table-hover" style="border:1px solid #ddd;margin-bottom:5px;">
					<tr>				
						<td style='width:90px;'>名称:<?php echo $_smarty_tpl->tpl_vars['v']->value->title;?>
</td>
						<td  style='width:35px;'><?php if ($_smarty_tpl->tpl_vars['v']->value->name) {?><i class="fa fa-download" style="color:gray;"></i><a href="?a=download&m=updateDownloadNum&name=<?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" id="downloadBtn">下载</a><?php } else { ?>暂无下载<?php }?></td>
						<td style='width:45px;'>下载次数:<?php echo $_smarty_tpl->tpl_vars['v']->value->download_num;?>
</td>
						<td style='width:90px;'>发布时间:<?php echo $_smarty_tpl->tpl_vars['v']->value->date;?>
</td>
					</tr>
					<tr>
						<td style='width:90px;' colspan="4">描述:<?php echo $_smarty_tpl->tpl_vars['v']->value->description;?>
</td>
					</tr>									
			</table>						
			<?php } ?>
			<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
		<div class="col-md-4">
			<dl class="board">
				<dt class="text-center">热门问答</dt>
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
					<a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,25,"...");?>
</a>
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
	<?php }?>
</div>
</body>
</html><?php }} ?>
