$(function() {
	$("#submitBtn").click(function() {
		//alert(ue.getContent());
		//alert($("#commentEditor")[0].getContent());
		if ($("#cid").val() == 0) {
			$("#msgModal .msg").html("主题不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		if(ue.getContent().length==0){
			$("#msgModal .msg").html("内容不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		return true;
	});
});