<?php /* Smarty version Smarty-3.1.19, created on 2015-12-30 14:05:40
         compiled from "/data/home/qyu1988070001/htdocs/application/views/admin/learning.html" */ ?>
<?php /*%%SmartyHeaderCode:164398020956837434d40d66-48031132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01e36fab3a44a48a99f329f1d5ce659b6c7608d0' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/learning.html',
      1 => 1447292254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164398020956837434d40d66-48031132',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'showExam' => 0,
    'allExams' => 0,
    'key' => 0,
    'num' => 0,
    'value' => 0,
    'all' => 0,
    'course' => 0,
    'page' => 0,
    'showJudge' => 0,
    'allJudges' => 0,
    'showCourse' => 0,
    'data' => 0,
    'addCourse' => 0,
    'updateCourse' => 0,
    'oneCourse' => 0,
    'show' => 0,
    'allChoices' => 0,
    'searchResult' => 0,
    'back' => 0,
    'choice' => 0,
    'judge' => 0,
    'addJudge' => 0,
    'add' => 0,
    'detailJudge' => 0,
    'oneJudge' => 0,
    'one' => 0,
    'two' => 0,
    'updateJudge' => 0,
    'updateChoice' => 0,
    'oneChoice' => 0,
    'A' => 0,
    'B' => 0,
    'C' => 0,
    'D' => 0,
    'detailChoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568374352ef158_31902152',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568374352ef158_31902152')) {function content_568374352ef158_31902152($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/home/qyu1988070001/htdocs/libs/plugins/modifier.truncate.php';
?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="libs/ueditor/lang/zh-cn/zh-cn.js"></script>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/admin.js"></script>
<script src="public/scripts/tools.js"></script>
<script src="public/scripts/learning.js"></script>
<link href="public/styles/tools.css" rel="stylesheet">
<link href="public/styles/learning.css" rel="stylesheet">
</head>
<body>
<!--modal模态框开始  -->
<div class="confirm modal-content" id="myModal" aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true" id="confirmCloseBtn"></span><span class="rs-only"></span>
				</button>
				<h4 class="modal-title" id="myModalLabel">确定要删除吗</h4>
			</div>
			<div class="modal-body body">
				<span class="text-danger h4">删除是不可逆的，确定要删除吗？</span>
			</div>
			<div class="modal-footer">
				<a href="" type="button" class="btn btn-success" id="true">确定</a>
				<a href="" type="button" class="btn btn-danger" data-dismiss="modal" id="falseBtn">取消</a>
			</div>
</div>
<!--modal模态框结束  -->
<?php if ($_smarty_tpl->tpl_vars['showExam']->value) {?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showExam'>试卷管理</a></li>
					<li class="active">显示试卷</li>					
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=learning&action=deleteAllExam" method="post">
				<tr>
					<td>编号</td>
					<td>课程类型</td>
					<td>考试者</td>
					<td>成绩 </td>
					<td>考试时间</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['allExams']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allExams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td style="width:120px;"><?php echo $_smarty_tpl->tpl_vars['value']->value->cid;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->uid;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->score;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->createdTime;?>
</td>
					<td>						
						<a href="?a=learning&action=deleteExam&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>						
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="10"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="10">暂无试卷</td></tr>
				<?php }?>
			</form>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
		<form action="" method="get" style="display:inline">
				<input type="hidden" name="action" value="showExam">
				<input type="hidden" name="a" value="learning">
					<select name="kind" class="input-sm">
						<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有课程</option>
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

					</select>
					<input type="submit" name="send" value="提交" class="btn btn-success">
				</form>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showJudge']->value) {?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showJudge'>判断题管理</a></li>
					<li class="active">显示判断题</li>
					<li><a href="?a=learning&action=addJudge" title='添加判断题'><i class="fa fa-plus-circle"></i></a></li>
					<form method="post" action="?a=learning&action=search" style="display:inline;margin-left:25px;position:relative;">
						<select name="kind" class="input-sm">							
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select>
						<input type="hidden" name="type" value="judge">						
						<input name="search" type="text" style="border-radius:15px;border:1px solid #ddd;height:32px;padding:5px;">
						<span class="glyphicon glyphicon-search" style="cursor:pointer;font-size:20px;position:absolute;right:15px;top:-3px;" id="searchBar"></span>
						<input type="submit" value="submit" style="display:none;" id="searchBtn">
					</form>
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=learning&action=deleteAllJudge" method="post">
				<tr>
					<td>编号</td>
					<td>问题</td>
					<td>正确答案</td>
					<td>解答</td>
					<td>所属课程</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['allJudges']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allJudges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
" style="width:120px;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->question,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->answer,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->tips,10,"...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->courseName;?>
</td>
					<td>
						<a href="?a=learning&action=updateJudge&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
						<a href="?a=learning&action=deleteJudge&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>|
						<a href="?a=learning&action=detailJudge&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">详细</a>					
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="10"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="10">暂无判断题</td></tr>
				<?php }?>
			</form>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
		<form action="" method="get" style="display:inline">
				<input type="hidden" name="action" value="showJudge">
				<input type="hidden" name="a" value="learning">
					<select name="kind" class="input-sm">
						<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有课程</option>
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

					</select>
					<input type="submit" name="send" value="提交" class="btn btn-success">
				</form>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['showCourse']->value) {?>
<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=learning&action=showCourse'>课程管理</a></li>
				<li class="active">显示课程</li>
				<li><a href="?a=learning&action=addCourse" title='添加课程'><i class="fa fa-plus-circle"></i></a></li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed alllevel">
			<tr>
				<td>编号</td>
				<td>课程名称</td>
				<td>课程描述</td>
				<td>显示|隐藏</td>
				<td>操作</td>
				<td>课程创建日期</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
			<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->name;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->description;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->state;?>
</td>
				<td>
					<a href="?a=learning&action=updateCourse&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
					<a href="?a=learning&action=deleteCourse&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->date;?>
</td>
			</tr>
			<?php } ?>
			<?php } else { ?>
			<tr><td colspan="5">暂无数据</td></tr>
			<?php }?>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addCourse']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=level&action=showCourse'>课程管理</a></li>
				<li class="active">添加课程</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr><td class="text-right">课程名称</td><td><input type="text" name="name" class="form-control"></td></tr>
			<tr><td class="text-right">课程描述</td><td><textarea name="description" class="form-control"></textarea></td></tr>
			<tr><td class="text-right">等级权限</td><td>待定</td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['updateCourse']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=level&action=show'>课程管理</a></li>
				<li class="active">修改课程</li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->id;?>
">
			<tr><td class="text-right">课程名称</td><td><input type="text" name="name" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->name;?>
"></td></tr>
			<tr><td class="text-right">课程描述</td><td><textarea name="description" class="form-control"><?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->description;?>
</textarea></td></tr>
			<tr><td class="text-right">课程权限</td><td>待定</td></tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
			</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showChoice'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=learning&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
					<form method="post" action="?a=learning&action=search" style="display:inline;margin-left:25px;position:relative;">
						<select name="kind" class="input-sm">							
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select>
						<input type="hidden" name="type" value="choice">	
						<input name="search" type="text" style="border-radius:15px;border:1px solid #ddd;height:32px;padding:5px;">
						<span class="glyphicon glyphicon-search" style="cursor:pointer;font-size:20px;position:absolute;right:15px;top:-3px;" id="searchBar"></span>
						<input type="submit" value="submit" style="display:none;" id="searchBtn">
					</form>
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=learning&action=deleteAllChoice" method="post">
				<tr>
					<td>编号</td>
					<td>问题</td>
					<td>答案A</td>
					<td>答案B</td>
					<td>答案C</td>
					<td>答案D</td>
					<td>正确答案</td>
					<td>所属课程</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['allChoices']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['allChoices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td title="<?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
" style="width:120px;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->question,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->a,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->b,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->c,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->d,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->answer,10,"...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->courseName;?>
</td>
					<td>
						<a href="?a=learning&action=updateChoice&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
						<a href="?a=learning&action=deleteChoice&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>|
						<a href="?a=learning&action=detailChoice&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">详细</a>
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="10"><input type="submit" value="全删" class="btn btn-success pull-right" name="send"></td>
				</tr>
				<?php } else { ?>
				<tr><td colspan="10">暂无选择题</td></tr>
				<?php }?>
			</form>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
		<form action="" method="get" style="display:inline">
				<input type="hidden" name="action" value="showChoice">
				<input type="hidden" name="a" value="learning">
					<select name="kind" class="input-sm">
						<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有课程</option>
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

					</select>
					<input type="submit" name="send" value="提交" class="btn btn-success">
				</form>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['searchResult']->value) {?>
<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showChoice'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=learning&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>	
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
">返回</a></li>				
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
				<tr><td>序号</td><td>问题</td><td>所属课程</td><td>操作</td></tr>
				<?php if ($_smarty_tpl->tpl_vars['data']->value) {?>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</td>
					<td style="width:620px;"><?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->course_id;?>
</td>
					<td>
					<?php if ($_smarty_tpl->tpl_vars['choice']->value) {?>
						<a href="?a=learning&action=updateChoice&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
						<a href="?a=learning&action=detailChoice&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">详细</a>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['judge']->value) {?>
						<a href="?a=learning&action=updateJudge&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">修改</a>|
						<a href="?a=learning&action=detailJudge&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">详细</a>
					<?php }?>
					</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="4">没有查询到结果</td>
				</tr>
				<?php }?>
			</table>
			</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['addJudge']->value) {?>
<div class="row">
			<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=ad&action=showJudge'>判断题管理</a></li>
				<li class="active">添加判断题</li>
			</ul>
				<form method="post" action="?a=learning&action=addJudge" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<select class="input-sm" name="course" id="course">
									<option value="0">选择一门课程</option><?php echo $_smarty_tpl->tpl_vars['course']->value;?>

								</select>(<span class="glyphicon glyphicon-asterisk" style="color:red;"></span>)
							</div>
						</div>						
						<div class="form-group">
							<label class="col-sm-2 control-label">问题：</label>
							<div class="col-sm-10">	
								<textarea name="question" type="text" class="form-control" id="tips2" style="display:none;"></textarea>
								<script id="editor2" type="text/plain" style="width:100%"></script>
								<script type="text/javascript">    
									var ue2 = UE.getEditor('editor2');									
								</script>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项：</label>
							<div class="col-sm-10">A:正确；B:错误</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">正确答案：</label>
							<div class="col-sm-10">
								<input name="answer" type="radio" value="1" id="a"/>
								<label for="a">A:</label>
								<input name="answer" type="radio" value="0" id="b"/>
								<label for="b">B:</label>
								<div class="alert alert-danger" style="display:none;">答案不能为空</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">提示：</label>
							<div class="col-sm-10">
								<textarea name="tips" class="form-control" id="tips" style="display:none;"></textarea>
								<script id="editor" type="text/plain" style="width:100%"></script>
									<script type="text/javascript">    
									    var ue = UE.getEditor('editor');
									    $(function(){
									    	$("#course").change(function(){
								    			$(".glyphicon-asterisk").html("");
								    		});
									    	$("#submitBtn").click(function(){
									    		$("#tips2").val(ue2.getContent());
									    		$("#tips").val(UE.getEditor('editor').getContent());
									    		if($("#course").val()==0){
									    			$(".glyphicon-asterisk").html('必须选择一门课程');
									    			return false;
									    		}
									    		if(!$("input[name=answer]").is(":checked")){
									    			$(".alert-danger").fadeIn("slow");
									    			setTimeout(function(){									    				
									    				$(".alert-danger").fadeOut("slow");
									    			},2000);
									    			return false;
									    		}
									    		return true;
									    	});
									    });
									</script>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="submit" name="send" value="添　加　试　题" class="btn btn-success" id="submitBtn"/>
							</div>
						</div>
				</form>
			</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
			<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=ad&action=show'>选择题管理</a></li>
				<li class="active">添加选择题</li>
			</ul>
				<form method="post" action="?a=learning&action=add" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<select class="input-sm" name="course" id="course">
									<option value="0">选择一门课程</option><?php echo $_smarty_tpl->tpl_vars['course']->value;?>

								</select>(<span class="glyphicon glyphicon-asterisk" style="color:red;"></span>)
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">问题：</label>
							<div class="col-sm-10">
								<textarea name="question" type="text" class="form-control" id="tips2" style="display:none;"></textarea>
								<script id="editor2" type="text/plain" style="width:100%"></script>
								<script type="text/javascript">    
									var ue2 = UE.getEditor('editor2');									
								</script>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项A：</label>
							<div class="col-sm-10"><input name="choice_a" type="text" class="form-control"/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项B：</label>
							<div class="col-sm-10"> <input name="choice_b" type="text" class="form-control"/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项C：</label>
							<div class="col-sm-10"> <input name="choice_c" type="text" class="form-control"/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项D：</label>
							<div class="col-sm-10"> <input name="choice_d" type="text" class="form-control"/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">正确答案：</label>
							<div class="col-sm-10"> 
								<input name="answer" type="radio" value="A" id="a"/> 
								<label for="a">A:</label>
								<input name="answer" type="radio" value="B" id="b"/> 
								<label for="b">B:</label>
								<input name="answer" type="radio" value="C" id="c"/> 
								<label for="c">C:</label>
								<input name="answer" type="radio"	value="D" id="d"/>
								<label for="d">D:</label>	
								<!--测试 -->
								<div class="alert alert-danger" style="display:none;">答案不能为空</div>
								<!--测试   -->							
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">提示：</label>
							<div class="col-sm-10">
								<textarea name="tips" class="form-control" id="tips" style="display:none;"></textarea>
								    <script id="editor" type="text/plain" style="width:100%"></script>
									<script type="text/javascript">    
									    var ue = UE.getEditor('editor');
									    $(function(){									    	
									    	$("#course").change(function(){
								    			$(".glyphicon-asterisk").html("");
								    		});
									    	$("#submitBtn").click(function(){
									    		//console.log($("input[name=answer]:checked").val());									    											    		
									    		$("#tips2").val(ue2.getContent());
									    		//alert(ue2.getContent());
									    		$("#tips").val(UE.getEditor('editor').getContent());
									    		if($("#course").val()==0){
									    			$(".glyphicon-asterisk").html('必须选择一门课程');
									    			return false;
									    		}
									    		if(!$("input[name=answer]").is(":checked")){
									    			$(".alert-danger").fadeIn("slow");
									    			setTimeout(function(){									    				
									    				$(".alert-danger").fadeOut("slow");
									    			},2000);
									    			return false;
									    		}
									    		return true;
									    	});
									    });
									</script>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<input type="submit" name="send" value="添　加　试　题" class="btn btn-success" id="submitBtn"/>
							</div>
						</div>
				</form>
			</div>
</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['detailJudge']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=showJudge'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=admin&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<tr>
				<td class="text-right">问题</td>
				<td>
					<!-- <input type="text" name="question" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->question;?>
" disabled> -->
					<textarea name="question" class="form-control" disabled><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->question;?>
</textarea>
				</td>
			</tr>
			<tr><td class="text-right">选项</td><td>选项A： 正确；选项B： 错误</td></tr>
			<tr>
				<td class="text-right">正确答案</td>
				<td>
					A:<input name="answer" type="radio" value="1" <?php echo $_smarty_tpl->tpl_vars['one']->value;?>
 disabled/>
					B:<input name="answer" type="radio" value="0" <?php echo $_smarty_tpl->tpl_vars['two']->value;?>
 disabled/>
				</td>
			</tr>
			<tr>
				<td class="text-right" style="width:85px;">解答</td>
				<td>
					<textarea class="form-control" name="tips" id="tips" style="display:none"><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->tips;?>
</textarea>
					<script id="editor" type="text/plain" style="width:100%"></script>
				<script type="text/javascript"> 
					var ue = UE.getEditor('editor');					
					$("#editor").html($("#tips").val());					
				</script>
				</td>
			</tr>
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course" disabled>
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select></td>
			</tr>
			<tr class="text-center"><td colspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" class="btn btn-success" name="send">返回</a></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['updateJudge']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showJudge'>判断题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=learning&action=addJudge" title='添加判断题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->id;?>
">
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course">
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-danger"></span>)
				</td>
			</tr>
			<tr>
				<td class="text-right" style="width:80px;">问题</td>
				<td>				
					<textarea type="text" name="question" class="form-control" id="tips2"><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->question;?>
</textarea>
					<script id="editor2" type="text/plain" style="width:100%"></script>
					<script type="text/javascript">    
						 var ue2 = UE.getEditor('editor2');	
						 $(function(){							 
							 ue2.addListener("ready", function () {
							        // editor准备好之后才可以使用
							        ue2.setContent($("#tips2").val());							 
							  });
						 });
					</script>
				</td>
			</tr>
			<tr><td class="text-right">选项</td><td>A:正确；B:错误</td></tr>
			<tr>
				<td class="text-right">正确答案</td>
				<td>
					<input name="answer" type="radio" value="1" <?php echo $_smarty_tpl->tpl_vars['one']->value;?>
 id="a"/>
					<label for="a">A:</label>
					<input name="answer" type="radio" value="0" <?php echo $_smarty_tpl->tpl_vars['two']->value;?>
 id="b"/>
					<label for="b">B:</label>
				</td>
			</tr>
			<tr>
				<td class="text-right">解答</td>
				<td>
					<textarea class="form-control" name="tips" id="tips" style="display:none"><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->tips;?>
</textarea>
					<script id="editor" type="text/plain" style="width:100%"></script>
					<script type="text/javascript">    
						 var ue = UE.getEditor('editor');
						 //alert($("#tips").val());						
						 $(function(){
							 ue.addListener("ready", function () {
							        // editor准备好之后才可以使用
							        ue.setContent($("#tips").val());							 
							  });
						    	$("#submitBtn").click(function(){
						    		$("#tips2").val(ue2.getContent());
						    		$("#tips").val(UE.getEditor('editor').getContent());
						    	});
						    });
					</script>
				</td>
			</tr>			
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send" id="submitBtn"></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['updateChoice']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=learning&action=showChoice'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=learning&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->id;?>
">
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course">
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select>(<span class="glyphicon glyphicon-asterisk text-danger"></span>)
				</td>
			</tr>
			<tr>
				<td class="text-right" style="width:80px;">问题</td>
				<td>
					<textarea type="text" name="question" class="form-control" id="tips2"><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->question;?>
"</textarea>
					<script id="editor2" type="text/plain" style="width:100%"></script>
					<script type="text/javascript">    
						 var ue2 = UE.getEditor('editor2');	
						 $(function(){
							 ue2.addListener("ready", function () {
							        // editor准备好之后才可以使用
							        ue2.setContent($("#tips2").val());							 
							  });
						 });						
					</script>
				</td>
			</tr>
			<tr>
				<td class="text-right">答案A</td>
				<td><input type="text" name="choice_a" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->a;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td class="text-right">答案B</td>
				<td><input type="text" name="choice_b" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->b;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td class="text-right">答案C</td>
				<td><input type="text" name="choice_c" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->c;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td class="text-right">答案D</td>
				<td><input type="text" name="choice_d" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->d;?>
" class="form-control"></td>
			</tr>
			<tr>
				<td class="text-right">正确答案</td>
				<td>
					<input name="answer" type="radio" value="A" <?php echo $_smarty_tpl->tpl_vars['A']->value;?>
 id="a"/> 
					<label for="a">A:</label>
					<input name="answer" type="radio" value="B" <?php echo $_smarty_tpl->tpl_vars['B']->value;?>
 id="b"/> 
					<label for="b">B:</label>
					<input name="answer" type="radio" value="C" <?php echo $_smarty_tpl->tpl_vars['C']->value;?>
 id="c"/> 
					<label for="c">C:</label>
					<input name="answer" type="radio"	value="D" <?php echo $_smarty_tpl->tpl_vars['D']->value;?>
 id="d"/>
					<label for="d">D:</label>					
				</td>
			</tr>
			<tr>
				<td class="text-right">解答</td>
				<td>
					<textarea class="form-control" name="tips" id="tips" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->tips;?>
</textarea>
					<script id="editor" type="text/plain" style="width:100%"></script>
					<script type="text/javascript">    
						 var ue = UE.getEditor('editor');
						 //alert($("#tips").val());
						 $(function(){
							 ue.addListener("ready", function () {
							        // editor准备好之后才可以使用
							        ue.setContent($("#tips").val());							 
							  });
						    	$("#submitBtn").click(function(){
						    		$("#tips2").val(ue2.getContent());
						    		$("#tips").val(UE.getEditor('editor').getContent());						    		
						    		return true;
						    	});						    	
						    });						
					</script>
				</td>
			</tr>			
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send" id="submitBtn"></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['detailChoice']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=show'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=admin&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
">返回</a></li>	
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->id;?>
" disabled>
			<tr>
				<td class="text-right" style="width:80px;">问题</td>
				<td><input type="text" name="question" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->question;?>
" disabled></td>
			</tr>
			<tr>
				<td class="text-right">答案A</td>
				<td><input type="text" name="choice_a" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->a;?>
" class="form-control" disabled></td>
			</tr>
			<tr>
				<td class="text-right">答案B</td>
				<td><input type="text" name="choice_b" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->b;?>
" class="form-control" disabled></td>
			</tr>
			<tr>
				<td class="text-right">答案C</td>
				<td><input type="text" name="choice_c" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->c;?>
" class="form-control" disabled></td>
			</tr>
			<tr>
				<td class="text-right">答案D</td>
				<td><input type="text" name="choice_d" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->d;?>
" class="form-control" disabled></td>
			</tr>
			<tr>
				<td class="text-right">正确答案</td>
				<td><textarea class="form-control" name="answer" disabled><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->answer;?>
</textarea></td>
			</tr>
			<tr>
				<td class="text-right">解答</td>
				<td>
				<textarea class="form-control" name="tips" disabled id="tips" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->tips;?>
</textarea>
				<script id="editor" type="text/plain" style="width:100%"></script>
				<script type="text/javascript"> 
					var ue = UE.getEditor('editor');					
					$("#editor").html($("#tips").val());					
				</script>
				</td>
			</tr>
			<tr>
				<td class="text-right">参加者</td>
				<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->operater;?>
" name="operater" disabled></td>
			</tr>
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course" disabled>
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select></td>
			</tr>
			<tr class="text-center"><td colspan="2"><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" class="btn btn-success" name="send">返回</a></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }?>
</body>
</html><?php }} ?>
