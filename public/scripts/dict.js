/**
 * 
 */
$(function(){
	$("#modalBar").click(function(){
		$("#reportModal").modal("show");
		$("#reportWord").val($("#search").val());
	});
	//提交新词
	$("#reportBar").click(function(){
		$("#reportModal").modal("hide");
		$.ajax({
			'url':"/dict/report",
			"type":"post",
			'data':{
				"username":$("#username").val(),
				"contact":$("#contact").val(),
				"reportWord":$("#reportWord").val(),
				'send':'report'
				},
			beforeSend:function(){
				$("#feedbackMsg").html("单词提交中");
				$("#feedbackModal").modal("show");
			},
			success:function(response){
				if(response=="ok"){
					$("#report h1").html("单词提交成功");
				}else if(response=="failed"){
					alert("提交失败");
				}else{
					console.log(response);
				}
			},
			complete:function(){
				$("#feedbackMsg").html("");
				$("#feedbackModal").modal("hide");
			}
		});
	});
	//keyup：松开按键;
	$("#search").keyup(function(){
		var keyword=$(this).val().toLowerCase();
		//alert($(this).val());
		$.ajax({
			type:"post",
			url:"/dict/result",
			data:{"keyword":keyword},
			//开始交互
			beforeSend:function(){
				$("#loading").css({"display":"inline"});
			},
			//交互完成后，把数据返回；
			success:function(response){
				//alert(response);
				var str=eval(response);
				//console.log(str[0]);
				var content="";
				for(var i=0;i<str.length;i++){
					content+="<li>"+str[i].wordname+"</li>";
				}
				//content="</ul>";
				$("#content").css("display","block").html(content);
				$("li").hover(function(){
					$(this).css({"background":"#eee"});
				},function(){
					$(this).css({"background":""});
				});
				var content=document.getElementById("content");
                var lis=content.getElementsByTagName("li");
                //console.log(lis.length);
                //通过循环，点击结果，把选择的结果放入到search中
                for(var i=0;i<lis.length;i++){
                		lis[i].addEventListener("click",function(){
                			content.style.display="none";
                            //alert(this.innerHTML);
                            search.value=this.innerHTML;
                            $("#searchBtn").get(0).click();
                		});
                }
			},
			//交互完成
			complete:function(){
				$("#loading").css({"display":"none"});
			}
		});
	});
	$(document).keydown(function(_evt){
		if(_evt.keyCode==13){
			$("#searchBtn").get(0).click();
		}
	});
	////点击搜索按钮
	$("#searchBtn").click(function(){
		if($.trim($("#search").val()).length!=0){
			$.ajax({
				type:"post",
				url:"/dict/result2",
				data:{"keyword":$("#search").val()},
				//开始交互
				beforeSend:function(){
					$("#loading").css({"display":"inline"});
				},
				/**/
				//交互完成后，把数据返回；
				success:function(response){
					//alert(response);
					var str=eval(response);
					if(str.length!=0){
						$("#report").css({"display":"none"});
						var content="<table class='table table-bordered table-striped table-hover'>";
						content+="<tr'>"
						content+="<td>单词："+str[0].wordname+"</td>";
						content+="<td>音标："+str[0].phonetic+"</td>";
						content+="<td>图片："+str[0].pic+"</td>";
						content+="<td>分类："+str[0].catalogue+"</td>";
						content+="<td>贡献者："+str[0].provider+"</td>";
						content+="</tr>"
						content+="<tr>"
						content+="<td style='min-width:100px;'>释义</td><td colspan=5>"+str[0].paraphrase+"</td>";
						content+="</tr>"
						content+="<tr>"
						content+="<td colspan=6 class='text-center'><a href='http://www.webonly.org/home/index' target='_blank'>最有用的IT书籍</a></td>";
						//content+="<td>示例</td><td colspan=5>"+str[0].example+"</td>";
						content+="</tr>"
						content+="</table>";
						$("#entry").css("display","block").html(content);
					}else{
						$("#report").css({"display":"block"});
						$("#entry").css({"display":"none"});
					}
				},
				//交互完成
				complete:function(){
					$("#loading").css({"display":"none"});
				}
			});
		}
		
	});
});				

