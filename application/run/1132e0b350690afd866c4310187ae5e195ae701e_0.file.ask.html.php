<?php
/* Smarty version 3.1.29, created on 2016-09-05 22:53:18
  from "/data/home/qyu1988070001/htdocs/application/views/admin/ask.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57cd86de82bbb8_15022600',
  'file_dependency' => 
  array (
    '1132e0b350690afd866c4310187ae5e195ae701e' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/admin/ask.html',
      1 => 1471709096,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57cd86de82bbb8_15022600 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/data/home/qyu1988070001/htdocs/libs/smarty/plugins/modifier.truncate.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/normalize.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<?php echo '<script'; ?>
 src="public/scripts/jquery-1.10.2.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/bootstrap.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/admin.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/scripts/tools.js"><?php echo '</script'; ?>
>
<link href="public/styles/tools.css" rel="stylesheet">
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
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">
		<div class="col-xs-12">
			<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=ask&action=show'>问答管理</a></li>
					<li class="active">显示问题</li>					
				</ul>
			<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="?a=ask&action=deleteAll" method="post">
				<tr>
					<td>编号</td>
					<td>主题</td>
					<td>提问者</td>
					<td>回复人数</td>
					<td>所属课程</td>
					<td>操作</td>
					<td><input type="checkbox" id="selectBar">全选</td>
				</tr>
				<?php if ($_smarty_tpl->tpl_vars['AllAsk']->value) {?>
				<?php
$_from = $_smarty_tpl->tpl_vars['AllAsk']->value;
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
					<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->topic,10,"...");?>
</td>
					<td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['value']->value->questioner,10,"...");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->answerNum;?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['value']->value->courseName;?>
</td>
					<td>						
						<a href="?a=ask&action=delete&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" class="deleteBtn">删除</a>|
						<?php if ($_smarty_tpl->tpl_vars['value']->value->answerNum) {?>
						<a href="?a=ask&action=showAnswer&id=<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
">查看回复</a>						
						<?php } else { ?>
						暂无回复
						<?php }?>
					</td>
					<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
" name="selectAll[]"></td>
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
				<input type="hidden" name="action" value="show">
				<input type="hidden" name="a" value="ask">
					<select name="kind" class="input-sm">
						<option value="0" <?php echo $_smarty_tpl->tpl_vars['all']->value;?>
>所有主题</option>
							<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

					</select>
					<input type="submit" name="send" value="提交" class="btn btn-success">
				</form>
		<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['showAnswer']->value) {?>
<div class="row">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=level&action=show'>问答管理</a></li>
				<li class="active">显示回复</li>
				<li><a href="?a=learning&action=addCourse" title='添加课程'><i class="fa fa-plus-circle"></i></a></li>
			</ul>
			<table class="table table-bordered table-striped table-hover table-condensed alllevel">
			<tr>
				<td>编号</td>
				<td>课程名称</td>
				<td>课程描述</td>
				<td>待定</td>
				<td>操作</td>
				<td>回复日期</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['AllAnswers']->value) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['AllAnswers']->value;
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
				<td><?php echo $_smarty_tpl->tpl_vars['key']->value+$_smarty_tpl->tpl_vars['num']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->answerer;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['value']->value->content;?>
</td>
				<td>
					<a href="javascript:void(0);">待定</a>
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
			<tr><td colspan="5">暂无数据</td></tr>
			<?php }?>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 text-center btn btn-success" style="margin-left:20px;"><a href="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" style='color:white;'>返回<a></a></div>
		<div class="col-md-10 pull-right" style="width:50%"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['addCourse']->value) {?>
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
<?php }
if ($_smarty_tpl->tpl_vars['updateCourse']->value) {?>
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
<?php }
if ($_smarty_tpl->tpl_vars['addJudge']->value) {?>
<div class="row">
			<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=ad&action=showJudge'>判断题管理</a></li>
				<li class="active">添加判断题</li>
			</ul>
				<form method="post" action="?a=learning&action=addJudge" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">问题：</label>
							<div class="col-sm-10"><input name="question" type="text" class="form-control"/></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">选项：</label>
							<div class="col-sm-10">选项A： 正确；选项B： 错误</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">正确答案：</label>
							<div class="col-sm-10">
								A:<input name="answer" type="radio" value="1" />
								B:<input name="answer" type="radio" value="0" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">提示：</label>
							<div class="col-sm-10"><textarea name="tips" class="form-control"></textarea></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<select class="input-sm" name="course"><option>选择一门课程</option><?php echo $_smarty_tpl->tpl_vars['course']->value;?>
</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<input type="submit" name="send" value="添　加　试　题" class="btn btn-success"/>
							</div>
						</div>
				</form>
			</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['add']->value) {?>
<div class="row">
			<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
				<li><a href='?a=ad&action=show'>选择题管理</a></li>
				<li class="active">添加选择题</li>
			</ul>
				<form method="post" action="?a=learning&action=add" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">问题：</label>
							<div class="col-sm-10"><input name="question" type="text" class="form-control"/></div>
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
							<div class="col-sm-10"> A:<input name="answer" type="radio" value="A" /> B:<input
								name="answer" type="radio" value="B" /> C:<input name="answer"
								type="radio" value="C" /> D:<input name="answer" type="radio"
								value="D" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">提示：</label>
							<div class="col-sm-10"><textarea name="tips" class="form-control"></textarea></div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<select class="input-sm" name="course"><option>选择一门课程</option><?php echo $_smarty_tpl->tpl_vars['course']->value;?>
</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">所属课程：</label>
							<div class="col-sm-10">
								<input type="submit" name="send" value="添　加　试　题" class="btn btn-success"/>
							</div>
						</div>
				</form>
			</div>
</div>
<?php }
if ($_smarty_tpl->tpl_vars['detailJudge']->value) {?>
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
				<td><input type="text" name="question" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->question;?>
" disabled></td>
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
				<td class="text-right">解答</td>
				<td><textarea class="form-control" name="tips" disabled><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->tips;?>
</textarea></td>
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
<?php }
if ($_smarty_tpl->tpl_vars['updateJudge']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=show'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=admin&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->id;?>
">
			<tr>
				<td class="text-right">问题</td>
				<td><input type="text" name="question" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->question;?>
"></td>
			</tr>
			<tr><td class="text-right">选项</td><td>选项A： 正确；选项B： 错误</td></tr>
			<tr>
				<td class="text-right">正确答案</td>
				<td>
					A:<input name="answer" type="radio" value="1" <?php echo $_smarty_tpl->tpl_vars['one']->value;?>
/>
					B:<input name="answer" type="radio" value="0" <?php echo $_smarty_tpl->tpl_vars['two']->value;?>
/>
				</td>
			</tr>
			<tr>
				<td class="text-right">解答</td>
				<td><textarea class="form-control" name="tips"><?php echo $_smarty_tpl->tpl_vars['oneJudge']->value->tips;?>
</textarea></td>
			</tr>
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course">
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select></td>
			</tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['updateChoice']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=showChoice'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=admin&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->id;?>
">
			<tr>
				<td class="text-right">问题</td>
				<td><input type="text" name="question" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->question;?>
"></td>
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
				<td><textarea class="form-control" name="answer"><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->answer;?>
</textarea></td>
			</tr>
			<tr>
				<td class="text-right">解答</td>
				<td><textarea class="form-control" name="tips"><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->tips;?>
</textarea></td>
			</tr>
			<tr>
				<td class="text-right">参加者</td>
				<td><input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->operater;?>
" name="operater"></td>
			</tr>
			<tr>
				<td class="text-right">所属课程</td>
				<td><select class="input-sm" name="course">
							<option>选择一个课程</option>
								<?php echo $_smarty_tpl->tpl_vars['course']->value;?>

						</select></td>
			</tr>
			<tr class="text-center"><td colspan="2"><input type="submit" value="提交" class="btn btn-success" name="send"></td></tr>
			</form>
		</table>
		</div>
	</div>
<?php }
if ($_smarty_tpl->tpl_vars['detailChoice']->value) {?>
	<div class="row">
		<div class="col-md-12">
		<ul class="breadcrumb">
					<li><a href='?a=index&action=welcome' target="main">后台首页</a></li>
					<li><a href='?a=admin&action=show'>选择题管理</a></li>
					<li class="active">显示选择题</li>
					<li><a href="?a=admin&action=add" title='添加选择题'><i class="fa fa-plus-circle"></i></a></li>
		</ul>
		<table class="table table-bordered table-striped table-hover table-condensed">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->id;?>
" disabled>
			<tr>
				<td class="text-right">问题</td>
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
				<td><textarea class="form-control" name="tips" disabled><?php echo $_smarty_tpl->tpl_vars['oneChoice']->value->tips;?>
</textarea></td>
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
</html><?php }
}
