$(function(){
	//alert(sessionStorage.getItem("id"));
	$("#uid").val(sessionStorage.getItem("id"));
	///在右边显示选择器的序号
	for(var i=1;i<=$(".choice a").length;i++){
		$(".jump .content1").append("<li>"+i+"</li>");
	}
	///在右边显示判断器的序号
	for(var j=1;j<=$(".judge a").length;j++){
		$(".jump .content2").append("<li>"+j+"</li>");
	}
	//////点击选择题序号，滑动到对象的题目///////////////////
	$(".jump .content1 li").each(function(index){
		$(this).click(function(){
			//console.log($(".choice a").eq(index).offset().top);
			$('html,body').animate({
                scrollTop: $(".choice a").eq(index).offset().top
            },1000);
		});
	});
//////点击判断题序号，滑动到对象的题目///////////////////
	$(".jump .content2 li").each(function(index){
		$(this).click(function(){
			//console.log($(".choice a").eq(index).offset().top);
			$('html,body').animate({
                scrollTop: $(".judge a").eq(index).offset().top
            },1000);
		});
	});
	////////////////////
	$(".choice dt").each(function(_index){
		$(this).click(function(){
			$(".jump .content1 li").eq(_index).addClass("highlight");
		});
	});
	//点击了单选题
	$(".choice dd input").each(function(index){
		$(this).click(function(){
			var num=$(this).attr("num");
			$(".jump .content1 li").eq(num).addClass("highlight");
		});
	});
	//点击了判断题
	$(".judge dd input").each(function(index){
		$(this).click(function(){
			var num=$(this).attr("num");
			$(".jump .content2 li").eq(num).addClass("highlight");
		});
	});
	var duration=5;
	var timer=setInterval(function(){
		duration--;
		if(duration==0){
			clearInterval(timer);
		}
		$(".countdown span").html(duration);
	},1000);
	////////////////
	var mydate=new Date();
	var starttime=mydate.getTime();
	var gotime=1;
	setInterval(function(){
		var s=new Date();
		var d=s.getTime()-starttime;
		var f=50*60*1000;
		var f1='',f2='';
		f=parseInt((f-d)/1000); // 剩余时间
		f1=Math.floor(f/60);
		f2=Math.floor(f%60);
		if (f1<10) f1='0' + f1;
		if (f2<10) f2='0' + f2;
		//alert(f1);
		$(".countdown span").html(f1+":"+f2);
		if (f==300){
			alert('离考试结束还有 5 分钟，请抓紧时间！');
		}
		if(f==0){
			alert("考试时间到,系统自动交卷！");
			$("#exam").submit();
		}
	},1000);


















});