$(function() {
	$("#cid").change(function(){
		$(".text-danger").html("");
	});
	$("#submitBtn").click(function() {
		if ($("#cid").val() == 0) {
			// $(".text-danger").html("主题不得为空");
			$(".text-danger").html("主题不得为空");
			return false;
		}
		if($.trim($("#respond").val()).length==0){
			$(".text-danger").html("提问内容不得为空");
			return false;
		}
		return true;
	});
});