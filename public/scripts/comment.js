define(['check'],function(check){
	return{
		
			
	/////////
		post:function(){
			$("#commentBtn").click(function(){
				/////验证是否登录
				if(!sessionStorage.getItem("username")){
					$("#msgModal .msg").html("请先登录");
					$("#msgModal").modal("show");
					setTimeout(function(){
						$("#msgModal").modal("hide");
					},2000);
					return false;
				}
				//验证内容不能为空
				if($.trim($(".comment_content").val()).length==0){
					$("#msgModal .msg").html("内容不得为空");
					$("#msgModal").modal("show");
					setTimeout(function(){
						$("#msgModal").modal("hide");
					},2000);
					return false;
				}
				////////////
				$.ajax({
					"url":"?a=comment",
					'type':"GET",
					"data":{
							"action":"add",
							"content":$(".comment_content").val(),
							"aid":$("#aid").val(),
							"uid":sessionStorage.getItem("id")
							},
					beforeSend:function(){
						$("#commentBtn").val("发表中...");
					},
					success:function(response){
						//alert(response);
						if(response=='failed'){
							alert("评论添加失败");
						}else{						
							$("#showComment").html("");						
							var str=eval(response);						
							for(var i=0;i<str[0].length;i++){
								///////////////////
								str[0][i].icon=sessionStorage.getItem("icon")||"default.jpg";
								$("#showComment").append("<table class='table table-condensed'>" +
										"<tr>" +
										"<td rowspan='3' width=48 height=48><img src='public/uploads/member/"+str[0][i].icon+"' class='img-circle'></td><td>"+str[0][i].username+"</td><td>"+str[0][i].date+"</td><td></td>" +
										"</tr>" +
										"<tr>" +
										"<td colspan='3'>"+str[0][i].content+"</td>" +
										"</tr>" +
										"<tr>" +
										"<td><a href='#'>回复</a></td><td><a href='#'><span class='glyphicon glyphicon-hand-up'></span></a><a href='#'><span class='glyphicon glyphicon-hand-down'></span></a></td><td>查看回复</td>" +
										"</tr>" +
										"</table>");
							}
							$("#showComment").append(str[1]);
						}
					},
					complete:function(){
						$("#commentBtn").val("发表评论");
					}
				});
				///////
			});
		}
	//
	}
});
