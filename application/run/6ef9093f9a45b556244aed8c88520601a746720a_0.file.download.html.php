<?php
/* Smarty version 3.1.29, created on 2016-09-08 00:13:44
  from "/data/home/qyu1988070001/htdocs/application/views/home/download.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d03cb8b8d716_40557133',
  'file_dependency' => 
  array (
    '6ef9093f9a45b556244aed8c88520601a746720a' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/download.html',
      1 => 1473264821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/header.html' => 1,
  ),
),false)) {
function content_57d03cb8b8d716_40557133 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
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
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/member.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/download.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/home.js"><?php echo '</script'; ?>
>
<link href="public/styles/header.css" rel="stylesheet">
</head>
<body id="home">
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class='container'>	
	<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-8">
		<dl class="memberTitle">
			<?php if ($_smarty_tpl->tpl_vars['temp']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['temp']->value;
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
			<dd><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></dd>
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
			<?php } else { ?>
			<dd><a href="javascript:void(0);">基本资料</a></dd>			
			<?php }?>
			<h1 class="clearfix"></h1>
		</dl>		
		<?php
$_from = $_smarty_tpl->tpl_vars['temp']->value;
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
			<div class="tab panel panel-default">
				<div class="panel-body">
						<p class="text-right"><a href="?a=download&m=all&name=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" class="text-danger">所有<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</a></p>
				</div>
			<?php if ($_smarty_tpl->tpl_vars['value']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['value']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_2_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_2_saved_local_item = $_smarty_tpl->tpl_vars['v'];
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
			<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_local_item;
}
if ($__foreach_v_2_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_2_saved_item;
}
?>
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
		</div>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

		<div class="col-md-4">
			<dl class="board">
				<dt class="text-center">热门下载</dt>
				<?php if ($_smarty_tpl->tpl_vars['downloadLeaderboard']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['downloadLeaderboard']->value;
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
				<dd>
					<span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>
					<a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,25,"...");?>
</a>
					&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
次
				</dd>
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
		<?php
$_from = $_smarty_tpl->tpl_vars['allDownload']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_4_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_4_saved_local_item = $_smarty_tpl->tpl_vars['v'];
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
			<?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_local_item;
}
if ($__foreach_v_4_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_4_saved_item;
}
?>
			<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
		<div class="col-md-4">
			<dl class="board">
				<dt class="text-center">热门下载</dt>
				<?php if ($_smarty_tpl->tpl_vars['downloadLeaderboard']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['downloadLeaderboard']->value;
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
				<dd>
					<span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</span>
					<a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->title,25,"...");?>
</a>
					&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['value']->value->download_num;?>
次
				</dd>
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
</html><?php }
}
