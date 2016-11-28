<?php /* Smarty version Smarty-3.1.19, created on 2016-06-29 09:58:59
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:1410185141564542b1cbc1c8-67672710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43410a9de11a65fba51e50fb6eeac0c6438f3b4d' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/footer.html',
      1 => 1467165506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1410185141564542b1cbc1c8-67672710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564542b1cc3a05_17271257',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564542b1cc3a05_17271257')) {function content_564542b1cc3a05_17271257($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
</head>
<body>
<!-- feedbackModal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-top:5px;padding-bottom:5px;text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h6 class="modal-title" id="myModalLabel">感谢您的提交</h6>
      </div>
      <div class="modal-body" style="padding-bottom:5px;text-align:center;">
        <span id="feedbackMsg"></span><i class="fa fa-spin fa-spinner" style="color:red;font-size:50px;"></i>
      </div>
      <div class="modal-footer" style="padding-top:5px;padding-bottom:5px;">
        <a>Thanks For Your Submission</a>
      </div>
    </div>
  </div>
</div>
<!-- feedbackModal -->
	<div class="row">
		<div class="col-md-12 footer">
			<dl>
				<dd>
				<a href="javascript:void(0)">关于我们</a> |
				备案号:<a href="http://www.miitbeian.gov.cn/" target="_blank">沪ICP备15050883号</a> 
				<dd>Copyright © 1998 - 2016Webonly. All Rights Reserved</dd>
				<dd>空客网 版权所有  <script type="text/javascript" async>var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5780456'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D5780456%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></dd>
			</dl>
		</div>
	</div>
	<!-- reportModal -->
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-top:5px;padding-bottom:5px;text-align:center;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">感谢您的反馈</h2>
      </div>
      <div class="modal-body" style="padding-bottom:5px;">
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="glyphicon glyphicon-user"></i>
				</span>
				<input class="form-control" placeholder="用户名"	id="username" type="text" autofocus>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
				<i class="glyphicon glyphicon glyphicon-envelope"></i>
				</span> 
				<input class="form-control" placeholder="任意的联系方式" id="contact" name="password" type="text" value="">
			</div>
		</div>
		<div class="form-group" style="margin-bottom:5px;">
			<div class="input-group">
				<span class="input-group-addon">
				<i class="glyphicon glyphicon glyphicon-book"></i>
				</span> 
				<textarea class="form-control" id="reportWord" style="height:50px;"></textarea>
			</div>
		</div>
		<div class="form-group" style="margin-bottom:0;">
			<div class="input-group" style="margin:auto;">
				<span class="">
				<i></i>
				</span> 
				<button class="btn btn-primary" id="feedbackBar">提 交</button>
			</div>
		</div>
      </div>
      <div class="modal-footer" style="padding-top:5px;padding-bottom:5px;">
        <a>Thanks For Your Feedback</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<ul id="indicator">
	<li><span>首页</span><i class="fa fa-home"></i></li>
	<li style="border-bottom:1"><span><a data-toggle="modal" data-target="#reportModal">反馈</a></span><i class="fa fa-comment"></i></li>
	<li style="border-bottom:0" id="up"><span>回到顶部</span><i class="fa fa-chevron-up"></i></li>
</ul>
</body>
</html><?php }} ?>
