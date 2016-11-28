setPage("?a=comment&page=1");

function setPage(url){
	//url=url.replace(/\//,"");
	//console.log(url);
	$("#showComment").html("");
	$.ajax({
	type:'GET',
	url:url,
	"data":{"action":"show","aid":$("#aid").val()},
	beforeSend:function(){
		
	},
	success:function(response){
		//console.log(response);
		//console.log(sessionStorage.getItem("username"));
		var str=eval(response);
		for(var i=0;i<str[0].length;i++){
			//console.log(str[0]);
			str[0][i].icon=sessionStorage.getItem("icon")||"default.jpg";
			$("#showComment").append("<table class='table table-condensed'>" +
					"<tr>" +
					"<td rowspan='3' width=48 height=48><img src='public/uploads/member/"+str[0][i].icon+"' class='img-circle'></td><td>"+str[0][i].username+"</td><td>"+str[0][i].date+"</td><td></td>" +
					"</tr>" +
					"<tr>" +
					"<td colspan='3'>"+str[0][i].content+"</td>" +
					"</tr>" +
					"<tr>" +
					"<td><a href='#'>回复</a></td><td><a href='#'><span class='glyphicon glyphicon-hand-up'></span></a>&nbsp;&nbsp;&nbsp;<a href='#'><span class='glyphicon glyphicon-hand-down'></span></a></td><td>查看回复</td>" +
					"</tr>" +
					"</table>");
		}
		$("#showComment").append(str[1]);
		//$("#showComment").append(response);
	},
		complete:function(){
			/*$("#mask").css({"display":"none"});
			$(".loading").css({"display":"none"});*/
		}
	});
}