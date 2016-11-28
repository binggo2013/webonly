<?php /* Smarty version Smarty-3.1.19, created on 2016-02-06 11:35:09
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/member.html" */ ?>
<?php /*%%SmartyHeaderCode:12467556075645de31a96268-31259737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25d8a95a76e939e568b123235ab750eefbac3b64' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/member.html',
      1 => 1454729704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12467556075645de31a96268-31259737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5645de31c2f519_18645645',
  'variables' => 
  array (
    'show' => 0,
    'oneUser' => 0,
    'allComments' => 0,
    'value' => 0,
    'allOrders' => 0,
    'allScores' => 0,
    'allAsks' => 0,
    'update' => 0,
    'showScore' => 0,
    'score' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5645de31c2f519_18645645')) {function content_5645de31c2f519_18645645($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心</title>
<link href="public/styles/bootstrap.css" rel="stylesheet" />
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/member.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/Chart.js"></script>
<script src="public/scripts/member.js"></script>
<script src="public/scripts/tools.js"></script>
<script src="public/scripts/home.js"></script>
</head>
<body id="home">
<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-md-12">		
		<dl class="memberTitle">
			<dd><a href="javascript:void(0);">基本资料</a></dd>
			<dd><a href="javascript:void(0);">我的评论</a></dd>
			<dd><a href="javascript:void(0);">我的订单</a></dd>
			<!-- <img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" class='icon img-circle'> -->
			<dd><a href="javascript:void(0);">我的成绩</a></dd>
			<dd><a href="javascript:void(0);">我的问答</a></dd>
			<h1 class="clearfix"></h1>
		</dl>		
		<div class="tab panel panel-default highlight">	
			<form action="" method="post" enctype="multipart/form-data">				
					<div class="panel-body">
						<p><a href="javascript:void();" class="text-danger">修改</a>自己的资料<a href="?" class="btn btn-success pull-right">首页</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
			<tr>				
				<td style='width:90px;' class="text-right">姓名</td><td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->username;?>
</td>
			</tr>
			<tr><input type="password" name="pwd" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
" style="display:none;">
				<td style='width:90px;' class="text-right">密码</td><td><input type="password" name="newpwd" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td style='width:90px;' class="text-right">邮箱</td><td><input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->email;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td style='width:90px;' class="text-right">头像</td><td><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" class='icon img-circle'>&nbsp;&nbsp;<a href='javascript:void();' id="changeBtn">换一张</a></td>
			</tr>
			<input type="text" name="newpic"  value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" style="display:none;">
			<input type="file" id="pic" name="pic" style="display:none;">			
			<input type="text" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->id;?>
" style="display:none;">			
			<tr>
				<td style='width:90px;' class="text-right">登录次数</td><td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->login_num;?>
</td>
			</tr>
			<tr>
				<td style='width:90px;' class="text-right">登录IP</td><td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->last_ip;?>
</td>
			</tr>
			<tr>
				<td style='width:90px;' class="text-right">登录时间</td><td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->last_time;?>
</td>
			</tr>
			<tr>
				<td style='width:90px;' class="text-right"></td><td><input type="submit" value="提 交" class="btn btn-success" name="send"></td>
			</tr>	
		</table>
		</form>	
		</div>
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的评论</div>
					<div class="panel-body">
						<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有评论</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>评论内容</th><th>评论时间</th><th>评论的文章</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allComments']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allComments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr><td>暂无评论</td></tr>
					<?php }?>
				</table>
		</div>
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的订单</div>
					<div class="panel-body">
						<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有订单</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>所购商品</th><th>总价(元)</th><th>是否付款</th><th>是否发货</th><th>下订单时间</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allOrders']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->pid;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->total;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->payed;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->sent;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->orderTime;?>
</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr><td>暂无评论</td></tr>
					<?php }?>
				</table>
		</div>
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的订单</div>
				<div class="panel-body">
						<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有成绩</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>考试时间</th><th>课程</th><th>题目数</th><th>做了的题目</th><th>作对的题目</th><th>考试成绩</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allScores']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allScores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->createdTime;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->total;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->ticked;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->rightNum;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr><td>暂无成绩</td></tr>
					<?php }?>
				</table>
		</div>	
<!-- <canvas id="canvas" height="150" width="200"></canvas>
<script>
var inputs=document.getElementsByTagName("input");
var arr=new Array();
var arr2=new Array();
for(var i=0;i<inputs.length;i++){
	arr[i]=parseInt(inputs[i].value);
	arr2[i]=inputs[i].getAttribute("info");
}
console.log(arr);
	var label2=arr2;
	var datas=arr;
	var lineChartData = {
		labels : label2,
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.2)",
				strokeColor : "rgba(255,0,0,0.8)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : datas
			}
		]
	}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	</script> -->		
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的问答</div>
				<div class="panel-body">
						<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有问答</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>问答时间</th><th>我的提问</th><th>我的回复</th><th>点赞数</th><th>踩数</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allAsks']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allAsks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->topic;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->rightNum;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
</td>
					</tr>
					<?php } ?>
					<?php } else { ?>
					<tr><td>暂无成绩</td></tr>
					<?php }?>
				</table>				
		</div>		
</div>	
</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['update']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<table class="table table-bordered table-striped">
		<form action="?a=user&action=update" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->id;?>
">
		<input type="hidden" name="icon2" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
">
		<input type="hidden" name="pwd2" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
">
			<tr>
				<td rowspan="5" width=160 height=160><img src="public/uploads/member/<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->icon;?>
" style='width:160px;height:160px;'></td>
				<td><?php echo $_smarty_tpl->tpl_vars['oneUser']->value->username;?>
</td><td><input type="file" name="icon" class="form-control"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->email;?>
"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="text" class="form-control" name="pwd" value="<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->pwd;?>
"></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><input type="submit" name="send" value="提交" class="btn btn-success"></td>
			</tr>
			</form>
		</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showScore']->value) {?>
<div class="row">
		<div class="col-md-8">
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['score']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
		<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
" info="<?php echo $_smarty_tpl->tpl_vars['value']->value->createdTime;?>
"><br>
		<?php } ?>
		<canvas id="canvas" height="450" width="600"></canvas>
<script>
//
var inputs=document.getElementsByTagName("input");
var arr=new Array();
var arr2=new Array();
for(var i=0;i<inputs.length;i++){
	arr[i]=parseInt(inputs[i].value);
	arr2[i]=inputs[i].getAttribute("info");
}
//console.log(arr);
	var label2=arr2;
	var datas=arr;
	var lineChartData = {
		labels : label2,
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.2)",
				strokeColor : "rgba(255,0,0,0.8)",
				pointColor : "rgba(151,187,205,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(151,187,205,1)",
				data : datas
			}
		]
	}

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}
	</script>
		</div>
		<div class="col-md-8"></div>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
</body>
</html><?php }} ?>
