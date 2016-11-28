$(function(){
	$("input[type=radio]").click(function(){
		if($("#no").is(":checked")){
			$("#url").css({"display":"block"});
			$("#feedback").html("");
			//alert(1);
		}else if($("#yes").is(":checked")){
			$("#url").css({"display":"none"});
			$("#feedback").html("");
			//alert(2);
		}
	});
	$("#subBtn").click(function(){
		if($("input[type=radio]").is(":checked")==false){
			$("#feedback").html("必须要选择是否有子导航");
			return false;
		}
		return true;
	});
});