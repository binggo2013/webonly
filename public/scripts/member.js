$(function(){	
	$(".tab:eq(0)").addClass("highlight");
	$(".memberTitle dd:eq(0)").addClass("bg");
	$(".memberTitle a").each(function(_index){		
		$(this).click(function(){	
			$(".memberTitle dd").removeClass("bg").eq(_index).addClass("bg");
			$(".tab").removeClass("highlight").eq(_index).addClass("highlight");			
		});
	});
	//////////////////
	$("#changeBtn").click(function(){
		$("#pic").click();
	});
	var reader=new FileReader();
	$("#pic").change(function(){
		//限定图片类型
		 if(!/image\/\w+/.test($("#pic").get(0).files[0].type)){
			 	alert("头像必须是图片格式");
				return false;
		 }
		 //限定图片大小
		 if($("#pic").get(0).files[0].size>1000000){					 	
				alert("图片不能大于1M");						
				return false;
		 }				 
		 reader.readAsDataURL($("#pic").get(0).files[0]);
			reader.onload=function(){
				//console.log(this.result);
				$(".img-circle").attr("src",this.result);
			}
	});
});