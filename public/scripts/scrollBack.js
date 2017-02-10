$(function(){
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
});