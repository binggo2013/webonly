$(function(){
$("#fold").click(function(){
	//$(".menu").css({"width":"0px"});
	//alert($(".menu").css("width"));
	if($(".menu").css("width")=="0px"){
		$(".menu").animate({"width":"19%"},300);
		$(".rightFrame").animate({"width":"80%"},300);
	}else{
		$(".menu").animate({"width":"0px"},300);
		$(".rightFrame").animate({"width":"100%"},300);
	}
});
	//console.dir($("#subBtn"));
$("#subBtn").click(function(){
	alert(333);
	return false;
});
/////页面跳转//////////////
	$(window).load(function(){
		$("#mask").css({"width":$(document).width()+"px","height":$(document).height()+"px","opacity":0.7});
	});
	$(".fa-user").click(function(){
		//alert(333);
		$(".memberInfo ul").fadeIn("slow");
	});
	$(".closeBtn").click(function(){
		$(".memberInfo ul").fadeOut("slow");
	});
	////////////////////////////
	/////////后台登录////////////////////////////////
	//用户名获得焦点
	$("#login_username").focus();
	//用户名获得焦点时，错误信息清空
	$("#login_username").focus(function(){
		$(".feedback").html("");
	});
	//密码获得焦点时，错误信息清空
	$("#login_pwd").focus(function(){
		$(".feedback").html("");
	});
	$("#loginBtn").click(function(){
		var left=($(window).width()-$("#admin_login").width())/2;
		//alert(333);
		//$.trim：修剪空格
		if($.trim($("#login_username").val()).length==0||$.trim($("#login_pwd").val()).length==0){
			$("#admin_login .feedback").css({"display":"block"}).html("用户名不得为空");
			setTimeout(function(){
				$("#admin_login .feedback").fadeOut("slow");
			},2000);
			
		}
		$.ajax({
			'url':"?a=index&m=setAdmin_login",
			'type':"get",
			'data':{"username":$("#login_username").val(),"pwd":$("#login_pwd").val()},
			beforeSend:function(){
				$("#mask").css({"display":"block","width":$(document).width(),"height":$(document).height()});
				$(".loading").css({"display":"block","left":($(window).width()-$(".loading").width())/2+"px","top":($(window).height()-$(".loading").height())/2+"px"});
			},
			success:function(response){
				//alert(response)
				if(response=="failed"){
					$("#admin_login .feedback").css({"display":"block"}).html("用户名或密码错误");
					
					setTimeout(function(){
						$("#admin_login .feedback").fadeOut("slow");
					},2000);
				}else if(response=="ok"){
					$("#admin_login").css({"display":"none"});
					location.href='?a=index';
				}
			},
			complete:function(){
				$("#mask").css({"display":"none"});
				$(".loading").css({"display":"none"});
			}
		});
	});
	$("#admin_login .closeBar").click(function(){
		location.href="?a=home";
	});
	///////////////////////////////////
	//alert($(".panel").length);
	$(".menu .panel").each(function(index){
		$(this).click(function(){
			$(".panel").removeClass('panel-primary').addClass('panel-default');
			$(this).addClass('panel-primary');
		});
	});
	$("#selectBar").click(function(){
		$("input[type=checkbox]:not(#selectBar)").prop("checked",$("#selectBar").prop("checked"));
	});
	/////////////////////
////点击删除，弹出确认框/////////////
    $(".deleteBtn").click(function(){
    	$("#true").attr("href",$(this).attr("href"));    	
    	//$(".confirm").css({"display":"block"});
    	$(".confirm").fadeIn();
    	return false;
    });
    /////点击确认框的取消按钮，确认框消失/////////
    $("#falseBtn").click(function(){    	
    	//$(".confirm").css({"display":"none"});
    	$(".confirm").fadeOut();
    	return false;
    });
    /////点击确认框的确定按钮，删除元素/////////
    $("#true").click(function(){    	
    	return true;
    });
});