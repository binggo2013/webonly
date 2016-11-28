<?php /* Smarty version Smarty-3.1.19, created on 2016-01-03 20:35:49
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/ask.html" */ ?>
<?php /*%%SmartyHeaderCode:12086788495645469e87e8d1-97285733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d3cc3add23d12c934b11d17238d5ff7aff61386' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/ask.html',
      1 => 1451824546,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12086788495645469e87e8d1-97285733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5645469ea77541_57976919',
  'variables' => 
  array (
    'oneAsk' => 0,
    'AllAsk' => 0,
    'AllCourse' => 0,
    'value' => 0,
    'sub' => 0,
    'v' => 0,
    'page' => 0,
    'data' => 0,
    'askLeaderboard' => 0,
    'key' => 0,
    'addTopic' => 0,
    'all' => 0,
    'course' => 0,
    'respond' => 0,
    'oneTopic' => 0,
    'pid' => 0,
    'id' => 0,
    'cid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645469ea77541_57976919')) {function content_5645469ea77541_57976919($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->topic;?>
</title>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="libs/ueditor/lang/zh-cn/zh-cn.js"></script>
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/buttons.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<script src="public/scripts/tools.js"></script>
<link href="public/styles/ask.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
<script src="public/scripts/member.js"></script>
<script src="public/scripts/ask.js"></script>
<script src="public/scripts/home.js"></script>
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<?php if ($_smarty_tpl->tpl_vars['AllAsk']->value) {?>
<div class="row middle">
		<div class="col-md-12">		
		<dl class="memberTitle">
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AllCourse']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
			<dd><a href="?a=ask&m=AllAsk&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</a></dd>			
			<?php } ?>			
			<h1 class="clearfix"></h1>
		</dl>
		<?php if ($_smarty_tpl->tpl_vars['sub']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sub']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
		<div class="tab panel panel-default highlight">				
				<table border="0" cellspacing="0" cellpadding="0" width=100%<?php ?>>
				<tr style="height:33px;">
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" style="color:white;" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value->AnswerNum;?>
<br>回复</a></td>
					<td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" class="question_title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value->topic,50,"...");?>
</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="?a=ask&m=addTopic" class="btn btn-success">我要提问</a></td>					
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				9小时前 by shenyou354
				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['v']->value->cid;?>
' target="_blank">回复</a>							
			</table>			
		</div>
		<?php } ?>
		<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
		<?php } else { ?>
		<div class="tab panel panel-default highlight">				
				<table border="0" cellspacing="0" cellpadding="0" width=100%<?php ?>>
				<tr style="height:33px;">
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" style="color:white;" target="_blank">暂无<br>问答</a></td>
					<td><h2><a href="?a=ask&action=detail&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="question_title">暂无问答</a></h2></td>
					<td style="width:70px;padding-right:5px;"><a href="?a=ask&m=addTopic" class="btn btn-success">我要提问</a></td>					
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">				
				<a href='?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
' target="_blank"></a>							
			</table>			
		</div>		
		<?php }?>		
		</div> 
</div>		
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['oneAsk']->value) {?>
<div class="row middle">
	<div class="col-md-8">
		<div style="padding-left:15px;" class="text-primary h1"><?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->topic;?>
</div>
		<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>		
		<table border=0 width=100% cellspacing=0 cellpadding=0>
			<tr>
				<td class='icon' style="width:100px;padding:10px;">				
					<?php if ($_smarty_tpl->tpl_vars['value']->value->icon) {?><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['value']->value->icon;?>
" class="img-circle"><?php } else { ?>hello<?php }?>
					&nbsp;&nbsp;
				</td>
				<td><span class="h3"><?php echo $_smarty_tpl->tpl_vars['value']->value->username;?>
</span></td>
				<td><span class="h5"><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</span></td>
			</tr>
			<tr style="border-top:1px dashed #ddd;">
				<td colspan='3' style="padding:15px;" class="text-warning"><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>				
			</tr>
			<!-- <tr>
				<td colspan="2" style="padding:15px;">			
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['value']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>				
				<?php echo $_smarty_tpl->tpl_vars['v']->value->content;?>

				<a href='?a=ask&action=respond&id=<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->cid;?>
'>回复</a>||<a href='#'>赞</a>||<a href='#'>踩</a>
				<?php } ?>								
				</td>
			</tr> -->
		</table>		
		<?php } ?>	
		<div><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>	
		<?php } else { ?>
		<table border=0 width=100% cellspacing=0 cellpadding=0>
			<tr style="border-top:1px dashed #ddd;">
				<td colspan='3' style="padding:15px;" class="text-warning">暂无回复！</td>
				<td class="text-right" style="padding-right:5px;"><a href="?a=ask&m=respond&id=<?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->id;?>
&pid=<?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->id;?>
&cid=<?php echo $_smarty_tpl->tpl_vars['oneAsk']->value->cid;?>
" class="button button-raised button-primary">我来回复</a></td>				
			</tr>
		</table>
		<?php }?>		
	</div>
	<div class="col-md-4">
		<dl class="board">
				<dt class="text-center">热门问答</dt>
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
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,25,"...");?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addTopic']->value) {?>
<div class="row">
	<div class="col-md-8">
			<div class="answer">
					<table>
					<form action='?a=ask&m=addTopic' method="post">
						<tr>
							<td>
								<img src="public/uploads/member/<?php echo $_SESSION['oneUserName']->icon;?>
" class="img-circle">
								&nbsp;&nbsp;<span class="h3"><?php echo $_SESSION['oneUserName']->username;?>
</span>
								&nbsp;&nbsp;<span class="h3 text-danger"></span>
							</td>
							<td class="text-right">
								<select name="cid" class="input-sm" id="cid">
									<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所属主题</option>
										<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

								</select>(<span class="glyphicon glyphicon-asterisk" style="color:red"></span>)
							</td>
						</tr>
						<tr>
							<td colspan="2">								
								<textarea name="respond" class="form-control" rows="5" cols="160" id="respond"></textarea>							 					
							</td>
						</tr>
						<tr><td><input type="submit" value="提交" name="send" class="btn btn-success" id="submitBtn"></td></tr>
					</form>
					</table>														
			</div>
	</div>
	<div class="col-md-4">
		<dl class="board">
				<dt class="text-center">热门问答</dt>
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
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,25,"...");?>
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
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['respond']->value) {?>
<div class="row">
	<div class="col-md-8">
			<div class="answer">
					<table>
					<form action='?a=ask&m=handleResponse' method="post">
						<tr>
							<td>
								<img src="public/uploads/member/<?php echo $_SESSION['oneUserName']->icon;?>
" class="img-circle">
								&nbsp;&nbsp;<span class="h3"><?php echo $_SESSION['oneUserName']->username;?>
</span>
								 &nbsp;&nbsp;<span class="h3 text-primary"><?php echo $_smarty_tpl->tpl_vars['oneTopic']->value->topic;?>
</span>
							</td>
						</tr>
						<tr>
							<td>						
								<input type="hidden" name="pid" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
"> <input
									type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"> <input
									type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
">
								<textarea name="respond" class="form-control" rows="5" cols="120" id="respond" style="display:none;"></textarea>
							<script id="editor" type="text/plain" style="width:100%;"></script>
							<script type="text/javascript">
							    //实例化编辑器
							    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
							    var ue = UE.getEditor('editor');
							    $(function(){
							    	$("#submitBtn").click(function(){    		
							    		$("#respond").val(UE.getEditor('editor').getContent());
							    	});
							    });
							</script>							
							</td>
						</tr>
						<tr><td><input type="submit" value="提交" name="send" class="btn btn-success" id="submitBtn"></td></tr>
					</form>
					</table>					
					</div>
	</div>
	<div class="col-md-4">
		<dl class="board">
				<dt class="text-center">热门问答</dt>
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
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,25,"...");?>
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
<?php }?>
<!-- <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['AllAsk']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<table border="0" cellspacing="0" cellpadding="0">
				<tr style="height:33px;">
					<td rowspan="2" style="width:100px;text-align:center;" class="bg-primary"><a href="?a=ask&action=detail" style="color:white;"><?php echo $_smarty_tpl->tpl_vars['value']->value->answerNum;?>
<br>回复</a></td>
					<td><h2><a href="javascript:void(0);" class="question_title"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,20,"...");?>
</a></h2></td>
					<td style="width:70px;"></td>					
				</tr>
				<tr><td colspan="2" style="padding-left:5px;border-top:1px dashed #ddd;color:#999;">9小时前 by shenyou354</td></tr>
				</table>
	<?php } ?>	 -->
</div>
</body>
</html><?php }} ?>
