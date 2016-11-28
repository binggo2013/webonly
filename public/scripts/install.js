$(function(){
	var num=5;
	var timer;
	timer=setInterval(function(){
		$(".step1").html(num);
		num--;
		if(num==-1){
			clearInterval(timer);			
			$(".step1").removeClass("disabled").html("下一步");
		}
	},1000);
});