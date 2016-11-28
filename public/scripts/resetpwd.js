$(function(){	
	$(".UIA").css({"display":"none"});
	$(".UIB").css({"display":"none"});
	$("#nextBtn").click(function(){
		//alert(333);
		$.ajax({
			"url":"?a=user&m=forget",
			"type":"post",
			"data":{"email":$("#email").val(),"username":$("#username").val()},
			success:function(response){
				if(response=='failed'){
					$("#msgModal .msg").html("用户名或邮箱错误！");
					$("#msgModal").modal("show");
				}else if(response=='ok'){
					location.href="?a=resetpwd&action=reset";
					sessionStorage.setItem("username",$("#username").val());
				}else{
					console.log(response);
				}
			}			
		});
	});
	$("#submitBtn").click(function(){
		if($("#pwd").val()!=$("#repwd").val()){
			$("#msgModal .msg").html("两次密码不一致");
			$("#msgModal").modal("show");
			return false;
		}
		$.ajax({			
			"url":"?a=user&m=reset",
			"type":"get",
			"data":{"pwd":$("#pwd").val(),"username":sessionStorage.getItem("username")},
			success:function(response){
				if(response=='failed'){
					$("#msgModal .msg").html("用户名或者邮箱错误");
					$("#msgModal").modal("show");
				}else if(response=='same'){
					$("#msgModal .msg").html("这是您的旧密码");
					$("#msgModal").modal("show");
					setTimeout(function(){
						$("#msgModal").modal("hide");
						location.href='?';
					},2000);
				}else{
					//console.log(response)
					var str=eval(response);
					//console.log(str);
					sessionStorage.setItem("username",str[0].username);  
                    sessionStorage.setItem("icon",str[0].icon);
                    sessionStorage.setItem("id",str[0].id);
                    //console.log(sessionStorage.getItem("username"));
                    //console.log(sessionStorage.getItem("id"));
                    //console.log(sessionStorage.getItem("icon"));
					$("#msgModal .msg").html("重置密码成功");
					$("#msgModal").modal("show");
					setTimeout(function(){
						$("#msgModal").modal("hide");
						location.href='?';
					},2000);
					//location.href='?';
				}
			}			
		});
	});
});