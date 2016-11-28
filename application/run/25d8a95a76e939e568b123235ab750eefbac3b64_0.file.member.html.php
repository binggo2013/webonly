<?php
/* Smarty version 3.1.29, created on 2016-08-25 23:37:02
  from "/data/home/qyu1988070001/htdocs/application/views/home/member.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57bf109e672920_58560359',
  'file_dependency' => 
  array (
    '25d8a95a76e939e568b123235ab750eefbac3b64' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/member.html',
      1 => 1472139417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:home/footer.html' => 1,
  ),
),false)) {
function content_57bf109e672920_58560359 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心</title>
<link href="public/styles/bootstrap.css" rel="stylesheet" />
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/member.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="libs/echarts/echarts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/member.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/home.js"><?php echo '</script'; ?>
>
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
					<?php
$_from = $_smarty_tpl->tpl_vars['allComments']->value;
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
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['value']->value->title;?>
</td>
					</tr>
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
					<?php
$_from = $_smarty_tpl->tpl_vars['allOrders']->value;
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
					<tr><td>暂无评论</td></tr>
					<?php }?>
				</table>
		</div>
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的成绩</div>
				<div class="panel-body">
				<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有成绩</a></p>
	
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>考试时间</th><th>课程</th><th>题目数</th><th>做了的题目</th><th>作对的题目</th><th>考试成绩</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allScores']->value) {?>
					<?php
$_from = $_smarty_tpl->tpl_vars['allScores']->value;
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
						<input type="hidden" data="<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
" info="<?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
,<?php echo $_smarty_tpl->tpl_vars['value']->value->createdTime;?>
" class='getScore'>
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
					<?php } else { ?>
					<tr><td>暂无成绩</td></tr>
					<?php }?>
				</table> 
   </div>	
<div id="charts" style="width:100%;height:400px;"></div>
    <?php echo '<script'; ?>
 type="text/javascript">
    var inputs=document.querySelectorAll(".getScore");
    //console.log(inputs.length);
    var arr=new Array();
    var arr2=new Array(); 
    for(var i=0;i<inputs.length;i++){
    	arr[i]=parseInt(inputs[i].value);
    	arr2[i]=inputs[i].getAttribute("info");
    }
   	arr.reverse();
   	arr2.reverse();
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('charts'));
		// 指定图表的配置项和数据
		option = {
				color: ['#FFAA00'],
    title: {
        text: '考试成绩表'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {            // 坐标轴指示器，坐标轴触发有效
            type: 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
        }
    },
    legend: {
        data:['考试成绩']
    },
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    //显示在右上角的工具栏
    toolbox: {
    	show: true,
        feature: {
            mark: { show: true },
            dataView: { show: true, readOnly: false },
            magicType: { show: true, type: ['line', 'bar'] },
            restore: { show: true },
            saveAsImage: { show: true },
            type: 'shadow'
        }
    },
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: arr2
    },
    yAxis: {
        type: 'value'
    },
 
    series: [
        {
            name:'考试成绩',
            type:'line',
            stack: '总量',
            data:arr
        }
    ]
};

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    <?php echo '</script'; ?>
>		
<!-- <canvas id="canvas" height="150" width="200"></canvas>
<?php echo '<script'; ?>
>
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
	<?php echo '</script'; ?>
> -->		
		<div class="tab panel panel-default">			
				<div class="panel-heading">我的问答</div>
				<div class="panel-body">
						<p><a href="?" class="btn btn-success pull-left">首页</a><a href="javascript:void(0);" class="pull-right">所有问答</a></p>
				</div>
				<table class="table table-bordered table-striped table-hover">
					<tr><th>问答时间</th><th>我的提问</th><th>我的回复</th><th>点赞数</th><th>踩数</th></tr>
					<?php if ($_smarty_tpl->tpl_vars['allAsks']->value) {?>
					<?php
$_from = $_smarty_tpl->tpl_vars['allAsks']->value;
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
					<tr><td>暂无成绩</td></tr>
					<?php }?>
				</table>				
		</div>		
</div>	
</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['update']->value) {?>
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
<?php }
if ($_smarty_tpl->tpl_vars['showScore']->value) {?>
<div class="row">
		<div class="col-md-8">
		<?php
$_from = $_smarty_tpl->tpl_vars['score']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_value_4_saved_item = isset($_smarty_tpl->tpl_vars['value']) ? $_smarty_tpl->tpl_vars['value'] : false;
$__foreach_value_4_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['value']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$__foreach_value_4_saved_local_item = $_smarty_tpl->tpl_vars['value'];
?>
		<input type="text" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
" info="<?php echo $_smarty_tpl->tpl_vars['value']->value->createdTime;?>
"><br>
		<?php
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_4_saved_local_item;
}
if ($__foreach_value_4_saved_item) {
$_smarty_tpl->tpl_vars['value'] = $__foreach_value_4_saved_item;
}
if ($__foreach_value_4_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_value_4_saved_key;
}
?>
<!-- <?php echo '<script'; ?>
>
<!-- //
var inputs=document.getElementsByTagName("input");
var arr=new Array();
var arr2=new Array();
for(var i=0;i<inputs.length;i++){
	arr[i]=parseInt(inputs[i].value);
	arr2[i]=inputs[i].getAttribute("info");
}
//console.log(arr);
	/* var label2=arr2;
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
	} */

	/* window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	} */
	<?php echo '</script'; ?>
>
		</div>
		<div class="col-md-8"></div> --> -->
<?php }
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
</body>
</html><?php }
}
