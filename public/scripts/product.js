$(function(){	
	$("#cid").change(function(){
		$(".glyphicon-asterisk").html("");
	});
	$("#submitBtn").click(function(){		
		if($("#cid").val()==0){
			$(".glyphicon-asterisk").html("分类不能为空");
			return false;
		}
		return true;
	});
	//changePIC($("#product_icon"),$("#aaaa"));	
	$("#changeBtn").click(function(){		
		$("#product_icon").click();
	});
	var reader=new FileReader();
	$("#product_icon").change(function(){
		//限定图片类型
		 if(!/image\/\w+/.test($("#product_icon").get(0).files[0].type)){
			 	alert("头像必须是图片格式");
				return false;
		 }
		 //限定图片大小
		 if($("#product_icon").get(0).files[0].size>1000000){					 	
				alert("图片不能大于1M");						
				return false;
		 }				 
		 reader.readAsDataURL($("#product_icon").get(0).files[0]);
			reader.onload=function(){
				//console.log(this.result);
				$("#aaaa").attr("src",this.result);
			}
	});	
});