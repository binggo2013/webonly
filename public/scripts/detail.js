$(document).ready(function(){
	setPage("?a=comment&page=1");
	$(window).load(function(){
		$("#mask").css({"width":$(document).width()+"px","height":$(document).height()+"px","opacity":0.7});
		$(".loading").css({"left":($(window).width()-150)/2+"px","top":(($(window).height()-150)/2)+"px"});
	});
});
function setPage(url){
	$("#showComment").html("");
	$.ajax({
	type:'GET',
	url:url,
	"data":{"action":"show","aid":$("#aid").val()},
	beforeSend:function(){
		$("#mask").css({"display":"block"});
		$(".loading").css({"display":"block"});
	},
	success:function(response){
		//$("#content").html(response);
		//alert(response);
		//console.log(response);
		var str=eval(response);
		//alert(typeof str);
		//alert(str.length);
		//str[i].content
		for(var i=0;i<str[0].length;i++){
			//console.log(str[0]);
			str[0][i].icon=str[0][i].icon||"default.jpg";
			$("#showComment").append("<table border=0 width=100% cellspacing=0 cellpadding=0>" +
					"<tr>" +
					"<td rowspan='2' class='icon'><img src='public/uploads/member/"+str[0][i].icon+"' class='img-circle'></td><td colspan='2'>"+str[0][i].username+"</td>" +
					"</tr>" +
					"<tr>" +
					"<td colspan='2'>"+str[0][i].content+"</td>" +
					"</tr>" +
					"<tr>" +
					"<td><a href='#'>回复</a></td><td><a href='#'>赞</a>||<a href='#'>踩</a></td><td>"+str[0][i].date+"</td>" +
					"</tr>" +
					"</table>");
		}
		$("#showComment").append(str[1]);
		//$("#showComment").append(response);
	},
		complete:function(){
			$("#mask").css({"display":"none"});
			$(".loading").css({"display":"none"});
		}
	});
}
