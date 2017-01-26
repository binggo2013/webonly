$(function(){	
	$(".takeTest").click(function(){
		if(!sessionStorage.getItem("username")){
			$("#msgModal .msg").html("请先登录");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
	});
	//console.log($(".downloadBar").length);
	$(".downloadBar").each(function(_index){
		//console.log(_index);
		$(this).click(function(){
			$("#downloadBtn").attr("href",$(this).attr("data-href"));
			$("#downloadBtn").attr("info",$(this).attr("data-id"));
			$("#title").html($(this).attr("data-title"));
			$("#count").html($(this).attr("data-count"));
			$("#time").html($(this).attr("data-time"));
			$("#description").html($(this).attr("data-description"));
		});
	});
	$("#downloadBtn").click(function(){
		//alert($(this).attr("info"));
		if(sessionStorage.getItem("username")){
			$.ajax({
				'type':"post",
				'url':"/download/updateNum",
				'data':{"info":$(this).attr("info")},
				success:function(response){
					console.log(response);
				}
			});
		}else{
			//alert("请登录");
			$("#downloadModal").modal("hide");
			$("#msgModal .msg").html("请先登录");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		return true;
	});
	/////////tab: 排行榜///////////////////
	//alert($(".board .usertitle").length);
	$(".board div").eq(0).removeClass("boardContent").addClass("highlight");
	$(".board dt").eq(0).addClass("spotlight");
	$(".board div").eq(0).removeClass("boardContent").addClass("highlight");
	$(".board .userLeaderboard").each(function(_index){
		$(this).click(function(){
			$(".board dt").removeClass("spotlight").eq(_index).addClass("spotlight");
			$(".board div").removeClass("highlight").addClass("boardContent").eq(_index).addClass("highlight").removeClass("boardContent");
		});
	});
	//////首页的警告弹出框////////////////////
	$(".introduction").css({"display":"block"}).animate({"marginTop":"2px"},500);
	setTimeout(function(){
		$(".introduction").animate({
			"marginTop":"-53px"
		},500,function(){
			$(".introduction").css({"display":"none"});
		});
	},5000);
	//////////////////////////
	$(".board dd:even").addClass("bg-gray");
	///////////////////
	var percent;
    var start=1;
    var t=$("#msg").attr("info");
    var url=$("#msg").attr("url");
    timer=setInterval(function(){
        if(t!=0){
           percent=parseInt(start/t*100)+'%';
        }
        $("#countdown").html(percent);
        $(".progress-bar").css({"width":percent});
        if(t==0){
           clearInterval(timer);
           location.href=url;
        }
        t--;
    },1000);
	///////////////
	$(window).load(function(){
		$("#mask").css({"width":$(document).width()+"px","height":$(document).height()+"px","opacity":0.7});
		$(".loading").css({"left":($(window).width()-150)/2+"px","top":(($(window).height()-150)/2)+"px"});
		$("#feedback").css({"left":($(window).width()-150)/2+"px","top":(($(window).height()-150)/2)+"px"});
		//$("#login").css({"left":($(window).width()-$("#login").width())/2+"px","top":(($(window).height()-$("#login").height())/2)+"px"});
		$("#login").css({"left":($(window).width()-$("#login").width())/2+"px","top":-$("#login").height()*2+"px"});
		$("#reg").css({"left":($(window).width()-$("#reg").width())/2+"px","top":-$("#reg").height()*2+"px"});
	});
	//////////////////////////////////
	$(".memberBar").click(function(){
		if($(".more").is(":visible")){
			$(".more").css({"display":"none"});
		}else{
			$(".more").css({"display":"block"});
		}
	});
////////////显示登录信息////////////////////
    if(sessionStorage.getItem("username")){
        $("#userValue").html(sessionStorage.getItem("username"));        
        $(".point").html(sessionStorage.getItem("point"));
        $("#memberSpace").attr("href","?a=member&action=show&id="+sessionStorage.getItem("id"));
        if(sessionStorage.getItem("icon")){
        	$(".dropdown img").attr("src","public/uploads/member/"+sessionStorage.getItem("icon"));
        }        
        $(".UIA").css({"display":"none"});
        $(".UIB").css({"display":"block"});
    }else{
        //console.log("未登录");
        $(".UIA").css({"display":"block"});
        $(".UIB").css({"display":"none"});
    }
	///////////////登录//////////////////////////		
	$("#loginBtn").click(function(){		
		//////////////////
		$.ajax({
			'url':"?a=home&m=login",
			'type':"post",
			'data':{'action':'login','username':$("#login_username").val(),'pwd':$("#login_pwd").val()},
			beforeSend:function(){
				$("#loginBtn").val("登录中...");
			},
			success:function(data){				
				if(data=='failed'){
					$(".feedback").css({"display":"block"}).html("用户名或密码错误");
					setTimeout(function(){
						$(".feedback").fadeOut("slow");
					},2000);
				}else{
					var str=eval(data);
					console.log(str[0]);
					if(str[0]){
						$("#myModal").modal("hide");
	                    sessionStorage.setItem("username",str[0].username);  
	                    sessionStorage.setItem("icon",str[0].icon);
	                    $("#userValue").html(str[0].username);
	                    sessionStorage.setItem("id",str[0].id); 
	                    $("#memberSpace").attr("href","?a=member&action=show&id="+str[0].id);
	                    $(".point").html(str[0].countdown);
	                    sessionStorage.setItem("point",str[0].countdown);                    
	                    $(".UIA").css({"display":"none"});
	                    $(".UIB").css({"display":"block"}); 
					}
					                  							
				}
			},
			complete:function(){
				$("#loginBtn").val("登录");
			}
		});
		return true;
	});	
	///////注销/////////////////////
    $("#logoutBar").click(function(){
        $("#userValue").html('');
        //移除本地sessionStorage
        sessionStorage.removeItem("username");
        sessionStorage.removeItem("icon");
        sessionStorage.removeItem("id");
        $(".UIA").css({"display":"block"});
        $(".UIB").css({"display":"none"});
        $.ajax({
        	"url":"?a=home&m=logout",
        	'type':"get",
        	success:function(data){
        		console.log(data);
        	} 
        });        
    });
	/////////////////////////////////
	//console.log($(".item").length);
	$(".item").each(function(index){
		//console.log(index);
		$(".item").removeClass("active");
		$(this).addClass("active");
	});
	
	$("header .nav dd").each(function(index){
		console.log($(this).length);
		$(this).mouseover(function(){
			$(".nav dd").removeClass("active").eq(index).addClass("active");			
		});
	});
	$(".carousel-indicators li").each(function(index){
		//console.log(index);
		$(".carousel-indicators li").removeClass("active");
		$(this).addClass("active");
	});
	//console.log($(".vote input[type=radio]").length);
	$(".vote input[type=radio]").each(function(index){
		$(this).click(function(){
			$(".vote i").removeClass("fa-check-circle").addClass("fa-dot-circle-o");
			$(".vote i").eq(index).removeClass("fa-dot-circle-o").addClass("fa-check-circle");
		});
	});
	////////////////////////////////
	$("#showBtn").click(function(){
		//alert($(this).attr("href").indexOf("showResult"));
		if($(this).attr("href").indexOf("showResult")==-1){
			$("#voteFeedback").css({"display":"block"}).html("必须先投票");
			setTimeout(function(){
				$("#voteFeedback").fadeOut("slow")
			},1000);
			return false;
		}
	});
	///////////////////////////////////
//	$("#voteBtn").click(function(){
//		//alert($(".vote input[type=radio]:checked").attr("id"));
//		if($(".vote input[type=radio]:checked").attr("id")==undefined){
//			$("#voteFeedback").css({"display":"block"}).html("必须选择投票项");
//			setTimeout(function(){
//				$("#voteFeedback").fadeOut("slow")
//			},1000);
//			return false;
//		}
//		$.ajax({
//			'url':"?a=home",
//			'type':"get",
//			'data':{"id":$(".vote input[type=radio]:checked").attr("id"),'action':"vote"},
//			beforeSend:function(){
//				$("#mask").css({"display":"block"});
//				$(".loading").css({"display":"block"});
//			},
//			success:function(response){
//				//alert(response);
//				//console.log(response);
//				if(response=='ok'){
//					url=$("#showBtn").attr("url");
//					$("#showBtn").attr("href",url);
//					$("#voteFeedback").css({"display":"block"}).html("投票成功");
//					//alert("投票成功");
//					setTimeout(function(){
//						$("#voteFeedback").fadeOut("slow")
//					},2000);
//				}else if(response=='failed'){
//					alert("投票失败");
//				}else if(response=='repeat'){
//					$("#voteFeedback").css({"display":"block"}).html("同一地址一天投一票");
//					//alert("投票成功");
//					setTimeout(function(){
//						$("#voteFeedback").fadeOut("slow")
//					},1000);
//				}
//			},
//			complete:function(){
//				$("#mask").css({"display":"none"});
//				$(".loading").css({"display":"none"});
//			}
//		});
//		return false;
//	});
    ////////////////////////////
    $(".progress-bar").each(function(index){
    	//alert($(".progress-bar").eq(index).width())
    	(".progress-bar").eq(index).animate({"width":$(this).width()},2000,"linear");
    });
///////回到顶部//////
    var scrollTop=$("html").scrollTop()||$("body").scrollTop();
	var mouseoverTimer=[];
	var mouseoutTimer=[];
	//console.log($("#indicator li").length);
	//鼠标滑动到不同的li上，滑入相应的提示
	//移开，提示消失
	$("#indicator li").each(function(index){
		$(this).hover(function(){
			clearTimeout(mouseoutTimer[index]);
			mouseoverTimer[index]=setTimeout(function(){
				$("#indicator li span:eq("+index+")").animate({"left":"0px"},250);
			},200);

		},function(){
			clearTimeout(mouseoverTimer[index]);
			mouseoutTimer[index]=setTimeout(function(){
				$("#indicator li span:eq("+index+")").animate({"left":"-90px"},250);
			},200);
		});
	});
	//点击回到顶部
	$("#up").click(function(){
		$("html").animate({scrollTop:"0px"},500);
		$("body").animate({scrollTop:"0px"},500);
	});
	//滑动到一定的长度，出现右下角的提示;
	$(window).scroll(function(){
		//外部的变量都不到，就重新定义;
		scrollTop=$("html").scrollTop()||$("body").scrollTop();
		if(scrollTop<20){
		$("#indicator").css({"display":"none"});
		}else{
			$("#indicator").css({"display":"block"});
		}
	});
	///feedback//////
	$("#feedbackBar").click(function(){
		$("#reportModal").modal("hide");
		$.ajax({
			'url':"?a=feedback&action=feedback",
			"type":"post",
			'data':{
				"username":$("#username").val(),
				"contact":$("#contact").val(),
				"reportWord":$("#reportWord").val(),
				'send':'feedback'
				},
			beforeSend:function(){
				$("#feedbackMsg").html("单词提交中");
				$("#feedbackModal").modal("show");
			},
			success:function(response){
				if(response=="ok"){
					$("#report h1").html("单词提交成功");
				}else if(response=="failed"){
					alert("提交失败");
				}else{
					console.log(response);
				}
			},
			complete:function(){
				$("#feedbackMsg").html("");
				$("#feedbackModal").modal("hide");
			}
		});
	});
});





