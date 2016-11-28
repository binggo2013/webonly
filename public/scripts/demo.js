$(function(){
	QC.Login({
	      //插入按钮的节点id 
		btnId:"qqLoginBtn",   
	       scope:"all",
	       //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
	      size: "B_M"
	},function(reqData, opts){	
		//登录成功
		console.log(reqData.nickname);
		console.log(localStorage.getItem("username"));
		$.ajax({
			'type':"post",
			'url':"?a=user&m=tempUser",
			'data':{'user':reqData.nickname},
			success:function(response){
				console.log(response);
			}
		});
		$("#myModal").modal("hide");
	    localStorage.setItem("username",reqData.nickname);                    
	    $("#userValue").html(reqData.nickname+"<span class='caret'></span>");
	    //localStorage.setItem("id",str[0].id); 
	    //$("#memberSpace").attr("href","?a=member&action=show&id="+str[0].id);
	    //$(".point").html(str[0].countdown);
	    //localStorage.setItem("point",str[0].countdown);                    
	    $(".UIA").css({"display":"none"});
	    $(".UIB").css({"display":"block"}); 
		$("#userValue").html(reqData.nickname+"<span class='caret'></span>");
	},function(){
		$("#userValue").html('');
		$.ajax({
        	"url":"?a=home&m=logout",
        	'type':"get",
        	success:function(data){
        		console.log(data);
        	} 
        })
	    //移除本地localStorage
	    localStorage.removeItem("username");
	    $(".UIA").css({"display":"block"});
	    $(".UIB").css({"display":"none"});
		//alert("注销成功");	
	}); 
})
