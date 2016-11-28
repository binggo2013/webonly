define(['jquery'],function(jquery){
	return{
		nav:function(){
			$(".nav dd").each(function(index){
				//console.log($(this).length);
				$(this).mouseover(function(){
					$(".nav dd").removeClass("active").eq(index).addClass("active");			
				});
			});
		}
	}
});