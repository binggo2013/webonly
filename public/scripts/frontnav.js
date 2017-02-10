/**
 * 
 */
$(function(){
	//导航动画移动
	$("header .nav dd").each(function(index){
		//console.log($(this).length);
		$(this).mouseover(function(){
			$(".nav dd").removeClass("active").eq(index).addClass("active");			
		});
	});
	///////滑动到指定的位置导航浮动
	$(window).scroll(function(){
		//外部的变量都不到，就重新定义;
		scrollTop=$("html").scrollTop()||$("body").scrollTop();
		if(scrollTop<20){
			$("header").removeClass("float");
			$('.inner').removeClass("float");
		}else{
			$("header").addClass("float");
			$('.inner').addClass("float").css({"top":"55px"});
		}
	});
});