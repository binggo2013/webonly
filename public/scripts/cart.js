/**
 * 
 */
$(function(){
	$(".orderBtn").click(function(){
		if($("#userValue").text()==""){
			$("#msgModal .msg").html("请先登录");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
	});
	
});