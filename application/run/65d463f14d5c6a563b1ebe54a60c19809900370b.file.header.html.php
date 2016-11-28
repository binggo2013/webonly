<?php /* Smarty version Smarty-3.1.19, created on 2016-06-27 22:32:13
         compiled from "/data/home/qyu1988070001/htdocs/application/views/home/header.html" */ ?>
<?php /*%%SmartyHeaderCode:1457563955564542b1c3eb48-04820038%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d463f14d5c6a563b1ebe54a60c19809900370b' => 
    array (
      0 => '/data/home/qyu1988070001/htdocs/application/views/home/header.html',
      1 => 1467037931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1457563955564542b1c3eb48-04820038',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_564542b1cb2f12_37637246',
  'variables' => 
  array (
    'breakingNews' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_564542b1cb2f12_37637246')) {function content_564542b1cb2f12_37637246($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo @constant('SITE_NAME');?>
</title>
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['breakingNews']->value) {?>
<ul class="breakingNews list-unstyled list-inline">
	<li class="speaker"><i class="fa fa-volume-up"></i></li>
	<li class="content"><?php echo $_smarty_tpl->tpl_vars['breakingNews']->value;?>
</li>
	<li class="close"><i class="fa fa-times"></i></li>
</ul>
<?php }?>
<!-- Modal开始 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" id="loginBox">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">欢 迎 登 陆</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="alert alert-danger feedback"></div>
            	</div>
	            <div class="row">
					<div class="center-block">
						<img class="img-circle center-block" src="public/images/default.jpg" alt="默认图片" id="defaultimg">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-10  col-md-offset-1 ">
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
								</span>
								<input class="form-control" placeholder="用户名"	id="login_username" name="loginname" type="text" autofocus>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"> <i
									class="glyphicon glyphicon-lock"></i>
								</span> <input class="form-control" placeholder="密码"
									id="login_pwd" name="password" type="password" value="">
							</div>
						</div>
						<div class="form-group loginBtn">
<input type="submit" class="btn btn-lg btn-primary btn-block" id="loginBtn" value="登 录">
						</div>
<!-- 						<div class="text-center" style="margin-bottom:5px;">
							<span id="qqLoginBtn"></span>
<script type="text/javascript" src="public/scripts/demo.js"> 
</script>
						</div> -->
					</div>
				</div>
            </div>
            <div class="modal-footer">
                	<a href="?a=reg&m=show" class="pull-left">这儿注册 </a>
                	<a href="?a=resetpwd&action=forget">忘记密码 </a>
            </div>
        </div>
    </div>
</div>
<div class="top" style="border:0;">
<div class="container" style="border:0;">
<div class="row" style="border:0;">
	<div class="col-md-12" style="background:#eef1f2;border:0;">
		<h3><a href="?">WEBONLY.ORG</a></h3>
		<ul class="list-inline pull-left project">
			<li><a href='space/hecheng/index.html' target="blank"></a></li>
			<li><a href='space/wenjie/index.html' target="blank"></a></li>							
		</ul>			
		<ul class="right pull-right list-inline UIA"> 
		 	<li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">登录</a></li> 
			<li><a href="?a=reg&m=show">注册</a></li>                    
        </ul>
        <ul class="right pull-right list-inline UIB">                            
             <!--<li><a href="javascript:void(0);" id="userValue"></a></li>-->
             <!--下拉菜单开始-->
             <li role="presentation" class="dropdown">
             	<img src="public/images/default.jpg" class="img-circle">
                <a id="userValue" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                </a>                
              </li>              
              <li><a href="#"><i class="fa fa-envelope-o"></a></i></li>
              <li role="presentation" class="dropdown">
              	<a href="#" id="cog" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	              	<i class="fa fa fa-cog"></i>
	              	<!-- <span class="caret"></span> -->
              	</a> 
              	<ul id="menu3" class="dropdown-menu text-left" aria-labelledby="cog"> 
              	<i class="fa fa-caret-up"></i>             	
                    <li><a href="#">点数:<span class="point"></span></a></li>
                    <li role="separator" class="divider"></li>                    
                    <li><a href="" id="memberSpace" target="_blank">会员中心</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" id="logoutBar">注销</a></li>
                    <!-- <li><a href="javascript:QC.Login.signOut();">退出QQ</a></li> -->
                 </ul>
              </li>
              <!--下拉菜单结束-->
        </ul>
	</div>
</div>
</div>
<div class="row line">
	<div class="col-md-12">
		<div class="head_bottom">
			<div class="inner"></div>
		</div>
	</div>
</div>
</div>
</body>
</html><?php }} ?>
