$(function(){	
	$(".addPoint").each(function(_index){
		$(this).click(function(){			
			//alert($("input[type=text]:eq("+_index+")").val());
			$.ajax({
				'url':"?a=quiz&m=addPoint",
				'type':"post",
				"data":{"point":$("input[type=text]:eq("+_index+")").val(),"id":$(this).attr("info")},
				success:function(response){
					if(response=='ok'){
						$(".msg").css({"display":"block"});
						$(".msg .text-danger").html("充值成功");
						setTimeout(function(){
							$(".msg").fadeOut("slow");
						},2000);
					}else if(response=='same'){
						$(".msg").css({"display":"block"});
						$(".msg .text-danger").html("没有更新积分");
						setTimeout(function(){
							$(".msg").fadeOut("slow");
						},500);
					}else if(response=='faile'){
						$(".msg").css({"display":"block"});
						$(".msg .text-danger").html("充值失败");
						setTimeout(function(){
							$(".msg").fadeOut("slow");
						},500);
					}else{
						$(".msg").css({"display":"block"});
						$(".msg .text-danger").html("未知错误"+response);
						setTimeout(function(){
							$(".msg").fadeOut("slow");
						},500);
					}				
				}
			});
			//
		});
	});
});