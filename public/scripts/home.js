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
	$(".askBtn").click(function(){
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
        $("#memberSpace").attr("href","/user/space//id/"+sessionStorage.getItem("id"));
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
	//console.log($(".item").length);
	$(".item").each(function(index){
		//console.log(index);
		$(".item").removeClass("active");
		$(this).addClass("active");
	});
	$(".carousel-indicators li").each(function(index){
		//console.log(index);
		$(".carousel-indicators li").removeClass("active");
		$(this).addClass("active");
	});
    ////////////////////////////
    $(".progress-bar").each(function(index){
    	//alert($(".progress-bar").eq(index).width())
    	(".progress-bar").eq(index).animate({"width":$(this).width()},2000,"linear");
    });
	///用户提交反馈//////
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





