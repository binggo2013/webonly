/**
 * 登录
 */
$(function(){
	$("#captcha").click(function(){
		$(this).attr("src",$(this).attr('src')+"/num/"+Math.random());
	});
	if(sessionStorage.getItem("username")){
        $("#userValue").html(sessionStorage.getItem("username")+'<span class="caret"></span>');        
        $(".point").html(sessionStorage.getItem("point"));
        $("#memberSpace").attr("href","/user/space/id/"+sessionStorage.getItem("id"));
        if(sessionStorage.getItem("icon")){
        	$(".dropdown img").attr("src","public/uploads/user/"+sessionStorage.getItem("icon"));
        }
        $("#uid").val(sessionStorage.getItem("id"));
        $(".UIA").css({"display":"none"});
        $(".UIB").css({"display":"inline"});
        //////获取未读信息数/////////////
        $.ajax({
			'type':"post",
			'url':"/message/msg",
			'data':{'uid':sessionStorage.getItem("id")},
			success:function(response){
				var str=eval(response);
				//console.log(str);
				if(str[1].length>=3){
					$(".bubble").html('<i class="fa fa-circle" aria-hidden="true"></i>');
				}else{
					$(".bubble").html(str[1]);
					var lis='<i class="fa fa-caret-up" style="left:320px"></i>';
					//
	                //<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a></li>
					for(i in str[0]){
						lis+='<li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#info_detail" data-id="'+str[0][i].id+'">'+str[0][i].title+'</a></li>';
						//lis+='<li>"+str[0][0].content+"</li>";
					}
					$("#msglist ul").html(lis);
					//console.log($("#msglist ul li").length);
					$("#msglist ul li a").each(function(){
						$(this).click(function(){
							$.ajax({
								'type':"post",
								'url':"/message/getOne",
								'data':{"id":$(this).attr("data-id")},
								success:function(response){
									var str=eval(response);
									$(".info_detail").html(str[0].content);
									$("#info_detail .modal-title").html(str[0].title);
									//console.log(str[0].title);
								}
							});
							
						});
					});
					//console.log(lis);
				}
			}
		});
        ////////////////////
    }else{
        //console.log("未登录");
        $(".UIA").css({"display":"inline"});
        $(".UIB").css({"display":"none"});
        //alert("meii");
    }
	///////////////登录//////////////////////////		
	$("#loginBtn").click(function(){		
		//////////////////
		$.ajax({
			'url':"/user/login",
			'type':"post",
			'data':{'action':'login','username':$("#login_username").val(),'pwd':$("#login_pwd").val()},
			beforeSend:function(){
				$("#loginBtn").val("登录中...");
			},
			success:function(data){				
				if(data=='failed'){
					$(".feedback").css({"display":"block"}).html("用户名或密码错误");
					setTimeout(function(){
						$(".feedback").fadeOut("slow");
					},2000);
				}else{
					var str=eval(data);
					//console.log(str[0]);
					if(str[0]){
						$("#loginModal").modal("hide");
	                    sessionStorage.setItem("username",str[0].username);  
	                    sessionStorage.setItem("icon",str[0].icon);
	                    $("#userValue").html(str[0].username+'<span class="caret"></span>');
	                    sessionStorage.setItem("id",str[0].id);
	                    $("#memberSpace").attr("href","/user/space/id/"+str[0].id);
	                    $("#uid").val(str[0].id);
	                    //$("#memberSpace").attr("href","?a=member&action=show&id="+str[0].id);
	                    if(sessionStorage.getItem("icon")){
	    		        			$(".dropdown img").attr("src","public/uploads/user/"+sessionStorage.getItem("icon"));
	    		        		}
	                    $(".point").html(str[0].countdown);
	                    sessionStorage.setItem("point",str[0].countdown);                    
	                    $(".UIA").css({"display":"none"});
	                    $(".UIB").css({"display":"inline"}); 
	                    ///处理信息////
	                    var xhr=new XMLHttpRequest();
	                    //console.log(xhr);
	                    xhr.open("post","/message/msg");
	                    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	                    xhr.send("uid="+sessionStorage.getItem("id"));
	                    xhr.addEventListener('readystatechange',function(){
		                    	if (xhr.readyState==4){
		                    		if (xhr.status==200){
		                    			var str=eval(xhr.responseText);
		                    			//////
		                    			if(str[1].length>=3){
		        							$(".bubble").html('<i class="fa fa-circle" aria-hidden="true"></i>');
		        						}else{
		        							$(".bubble").html(str[1]);
		        							var lis='<i class="fa fa-caret-up" style="left:320px"></i>';
		        							//
		        			                //<li role="presentation"><a role="menuitem" tabindex="-1" href="https://twitter.com/fat">Action</a></li>
		        							for(i in str[0]){
		        								lis+='<li role="presentation"><a role="menuitem" tabindex="-1" data-toggle="modal" data-target="#info_detail" data-id="'+str[0][i].id+'">'+str[0][i].title+'</a></li>';
		        								//lis+='<li>"+str[0][0].content+"</li>";
		        							}
		        							$("#msglist ul").html(lis);
		        							//console.log($("#msglist ul li").length);
		        							$("#msglist ul li a").each(function(){
		        								$(this).click(function(){
		        									$.ajax({
		        										'type':"post",
		        										'url':"/message/getOne",
		        										'data':{"id":$(this).attr("data-id")},
		        										success:function(response){
		        											var str=eval(response);
		        											$(".info_detail").html(str[0].content);
		        											$("#info_detail .modal-title").html(str[0].title);
		        											//console.log(str[0].title);
		        										}
		        									});
		        									
		        								});
		        							});
		        							//console.log(lis);
		        						}
		                    		}
		                    	}
		                    	
	                    });
	                    ///////
					}
					                  							
				}
			},
			complete:function(){
				$("#loginBtn").val("登录");
			}
		});
		return true;
	});
	//注销
	$("#logoutBar").click(function(){
	    $("#userValue").html('');
	    $("#uid").val("");
	    //移除本地sessionStorage
	    sessionStorage.removeItem("username");
	    //console.log(sessionStorage.getItem("username"));
	    sessionStorage.removeItem("icon");
	    sessionStorage.removeItem("id");
	    $(".UIA").css({"display":"inline"});
	    $(".UIB").css({"display":"none"});
	});
});