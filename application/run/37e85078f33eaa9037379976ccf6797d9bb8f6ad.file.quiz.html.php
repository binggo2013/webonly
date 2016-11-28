<?php /* Smarty version Smarty-3.1.19, created on 2016-01-03 21:17:09
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/quiz.html" */ ?>
<?php /*%%SmartyHeaderCode:141321071056474856c4cfb7-16112235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37e85078f33eaa9037379976ccf6797d9bb8f6ad' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/quiz.html',
      1 => 1451827025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141321071056474856c4cfb7-16112235',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56474856e111b9_43352568',
  'variables' => 
  array (
    'oneCourse' => 0,
    'show' => 0,
    'oneUser' => 0,
    'id' => 0,
    'choices' => 0,
    'key' => 0,
    'value' => 0,
    'judges' => 0,
    'k' => 0,
    'v' => 0,
    'result' => 0,
    'total' => 0,
    'ticked' => 0,
    'resultNum' => 0,
    'resultNum2' => 0,
    'score' => 0,
    'choiceOutput' => 0,
    'judgeOutput' => 0,
    'arr' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56474856e111b9_43352568')) {function content_56474856e111b9_43352568($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>试卷：<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->name;?>
</title>
<link href="public/styles/bootstrap.css" rel="stylesheet">
<link href="public/styles/bootstrap-theme.css" rel="stylesheet">
<link href="public/styles/font-awesome.css" rel="stylesheet">
<link href="public/styles/buttons.css" rel="stylesheet">
<script src="public/scripts/jquery-1.10.2.js"></script>
<script src="public/scripts/bootstrap.js"></script>
<script src="public/scripts/home.js"></script>
<script src="public/scripts/quiz.js"></script>
<script src="public/scripts/tools.js"></script>
<link href="public/styles/quiz.css" rel="stylesheet">
<link href="public/styles/home.css" rel="stylesheet">
<link href="public/styles/tools.css" rel="stylesheet">
</head>
<body id="home">
<?php echo $_smarty_tpl->getSubTemplate ("home/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
<?php if ($_smarty_tpl->tpl_vars['show']->value) {?>
	<div class="row">	
		<div class="col-md-10">
		<ul class="breadcrumb" style="margin-bottom:2px;">
			<li><a href="?" class="active">首页</a></li>			
			<li><a class="text-danger"><b>倒数第<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->countdown;?>
次</b></a></li>
			<li><a class="text-primary"><b>试卷：<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->name;?>
</b></a></li>
		</ul>
		<form method="post" action="?a=quiz&action=result" id="exam">
		<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
		<input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->id;?>
">
			<dl class="choice"><h1>选择题</h1>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['choices']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
				<a name="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"></a>
				<div class="item">
				<dt><span><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['value']->value->question;?>
</dt> 			
				<dd>
					<input type="hidden" name='choice<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
'/>
				</dd>
				<dd>
					<input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='A' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]a" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
					<label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]a"><?php echo $_smarty_tpl->tpl_vars['value']->value->a;?>
</label>
				</dd>
				<dd>
					<input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='B' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]b" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
					<label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]b"><?php echo $_smarty_tpl->tpl_vars['value']->value->b;?>
</label>
				</dd>
				<dd>
					<input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='C' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]c" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
					<label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]c"><?php echo $_smarty_tpl->tpl_vars['value']->value->c;?>
</label>
				</dd>
				<dd>
					<input type="radio" name='choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]' value='D' id="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]d" num="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"/>
					<label for="choice[<?php echo $_smarty_tpl->tpl_vars['value']->value->id;?>
]d"><?php echo $_smarty_tpl->tpl_vars['value']->value->d;?>
</label>
				</dd>
				</div>
				<?php } ?>
			</dl>						
			<dl class="judge"><h1>判断题</h1>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['judges']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<a name="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"></a>
				<div class="item">
				<dt><span><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
.</span><?php echo $_smarty_tpl->tpl_vars['v']->value->question;?>
</dt>
				<dd><input type="hidden" name='judge<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
' value='<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
'/></dd>
				<dd>					
					<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="1" num="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]right'/>
					<label for="judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]right">正确</label>
					&nbsp;&nbsp;&nbsp;&nbsp;					
					<input type="radio" name='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]' value="0" num="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id='judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]wrong'/>
					<label for="judge[<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
]wrong">错误</label>
				</dd>
				</div>
				<?php } ?>
			</dl>
			<span>
				<input type="hidden" name="choiceNum" value="<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
">
				<input type="hidden" name="judgeNum" value="<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
			</span>
			<div><input type="submit" name="send" value="提交" class="button button-raised button-primary" style="margin-bottom:15px"></div>
		</form>
		</div>
		<div class="col-md-2 rightSide">
			<ul class="jump">
				<h5 class="countdown">剩余时间:<span>50:00</span></h5>
				<h5>选择题</h5>
				<div class="content1"></div>
				<div class="clearfix"></div>
				<h5>判断题</h5>
				<div class="content2"></div>
				<div class="clearfix"></div>
			</ul>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['result']->value) {?>
<div class="row">
	<div class="col-md-12">
		<ul class="breadcrumb" style="margin-bottom:2px;">
			<li><a href="?" class="active">首页</a></li>			
			<li><a class="text-danger"><b>倒数第<?php echo $_smarty_tpl->tpl_vars['oneUser']->value->countdown;?>
次</b></a></li>
		</ul>
	</div>
</div>
<div class='row'>
	<div class="col-md-8">
	<div class="alert alert-success">
		<b>共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
道题，做了<?php echo $_smarty_tpl->tpl_vars['ticked']->value;?>
道题，<span style='color:green;'>对了<?php echo $_smarty_tpl->tpl_vars['resultNum']->value+$_smarty_tpl->tpl_vars['resultNum2']->value;?>
题，得分<?php echo $_smarty_tpl->tpl_vars['score']->value;?>
分</span></b>
		<a href="?a=quiz&action=show&cid=<?php echo $_smarty_tpl->tpl_vars['oneCourse']->value->id;?>
"><b style="color:red">再做一次</b></a>&nbsp;&nbsp;<a href="?a=member&action=show&id=<?php echo $_SESSION['oneUserName']->id;?>
"><b style="color:green;">查看历史成绩</b></a>
	</div>
	<dl><h1>选择题</h1>
		<?php echo $_smarty_tpl->tpl_vars['choiceOutput']->value;?>

	</dl>
	<dl><h1>判断题</h1>
		<?php echo $_smarty_tpl->tpl_vars['judgeOutput']->value;?>

	</dl>
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
<?php }?>
<!-- <?php echo $_smarty_tpl->getSubTemplate ("home/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
 -->
</div>
</body>
</html><?php }} ?>
