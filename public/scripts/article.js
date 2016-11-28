$(function(){
	////////////////
	$("#iconBtn").click(function(){
		$("#reg_icon").click();
	});
	var reader=new FileReader();
	$("#reg_icon").change(function(){		
		 reader.readAsDataURL($("#reg_icon").get(0).files[0]);
			reader.onload=function(){
				//console.log(this.result);
				$(".img-circle").attr("src",this.result);
			}
	});
});