$(function(){
	errorMsg=null;
	function valid_email(_content){
	    var pattern=/^[a-z0-9]+([\._-][a-z0-9]+)?@[a-z0-9]+([_-][a-z0-9]+)?\.[a-z]{2,9}(\.[a-z]{2,4})?$/i;
	    var result=null;
	    if(pattern.test(_content)){
	        result=true;
	    }else{
	        result=false;
	    }
	    return result;
	}
	function valid_pwd(_content){
	    var num=0;
	    //如果密码不是数字
	    if(!/[\d]/.test(_content)){
	        num+=1;
	    }
	    if(!/[a-z]/.test(_content)){
	        num+=1;
	    }
	    if(!/[A-Z]/.test(_content)){
	        num+=1;
	    }
	    /*特殊字符*/
	    if(!/[\W]/.test(_content)){
	        num+=1;
	    }
	    return num;
	}
	//////检测用户名:用户名失去焦点////////
	$("#reg_username").blur(function(){
		if($.trim($.trim($("#reg_username").val())).length==0){
			$(".right div:eq(0)").addClass("alert-danger").removeClass("alert-success");;
			$(".right div:eq(0) span").addClass("glyphicon-remove");
			$(".right div:eq(0) strong").html("用户名不得为空");
			return false;
		}else{
			$(".right div:eq(0)").removeClass("alert-danger").addClass("alert-success");
			$(".right div:eq(0) span").removeClass("glyphicon-remove");
			$(".right div:eq(0) strong").html("");
			///////
			$.ajax({
				'url':"/user/checkUserName",
				'type':"post",
				'data':{'action':'reg','username':$("#reg_username").val()},
				beforeSend:function(){
					$(".right div:eq(0) span").addClass("fa fa-spinner fa-spin");
					//$(".right div:eq(0)").addClass("alert-danger");
				},
				success:function(_data){
					//alert(_data);
					if(_data=='taken'){
						//return false;
						$(".right div:eq(0)").removeClass("alert-success").addClass("alert-danger");
						$(".right div:eq(0) span").addClass("glyphicon-remove");
						$(".right div:eq(0) strong").html("用户名已经存在");
					}else{
						$(".right div:eq(0)").removeClass("alert-danger").addClass("alert-success");
						$(".right div:eq(0) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
						$(".right div:eq(0) strong").html("可以使用");
					}
				},
				complete:function(){
					//alert('loaded');
					$(".right div:eq(0) span").removeClass("fa fa-spinner fa-spin");
					//$(".right div:eq(0)").removeClass("alert-danger");
				}
			});
		}
	});
	/////用户名获得焦点//////////
	$("#reg_username").focus(function(){
		$(".right div:eq(0) span").removeClass("glyphicon-remove glyphicon-ok");
		$(".right div:eq(0) strong").html("");
		$(".right div:eq(0)").removeClass("alert-danger alert-success");
	});
	//////密码/////
	$("#reg_pwd").keyup(function(){
		switch (valid_pwd($(this).val())){
	        case 3:
	        		$(".right div:eq(1)").removeClass("alert-warning alert-success").addClass("alert-danger");
				$(".right div:eq(1) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
				$(".right div:eq(1) strong").html("密码强度低");
	            break;
	        case 2:
	        		$(".right div:eq(1)").removeClass("alert-danger alert-success").addClass("alert-warning");
				$(".right div:eq(1) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
				$(".right div:eq(1) strong").html("密码强度中");
	            break;
	        case 1:
	        		$(".right div:eq(1)").removeClass("alert-danger alert-warning").addClass("alert-success");
				$(".right div:eq(1) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
				$(".right div:eq(1) strong").html("密码强度较高");
	            break;
	        case 0:
	        		$(".right div:eq(1)").removeClass("alert-danger alert-warning").addClass("alert-success");
				$(".right div:eq(1) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
				$(".right div:eq(1) strong").html("密码强度高");	
	            break;
	    }
	});
	//密码确认
	$("#confirm_reg_pwd").keyup(function(){
		if($.trim($("#reg_pwd").val())!=$.trim($("#confirm_reg_pwd").val())){
			$(".right div:eq(2)").removeClass("alert-warning alert-success").addClass("alert-danger");
			$(".right div:eq(2) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
			$(".right div:eq(2) strong").html("两次密码不一致");
			return false;
		}else if($.trim($("#reg_pwd").val()).length==0){

		}else{
			$(".right div:eq(2)").removeClass("alert-danger alert-warning").addClass("alert-success");
			$(".right div:eq(2) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
			$(".right div:eq(2) strong").html("密码一致");
		}
	});
	//////////检测邮箱////////////////
	$("#reg_email").keyup(function(){
		if(!valid_email($(this).val())){
			$(".right div:eq(3)").addClass("alert-danger");
			$(".right div:eq(3) span").addClass("glyphicon-remove");
			$(".right div:eq(3) strong").html("邮箱格式不正确");
			errorMsg="邮箱格式错误";
			return false;
        }else{
        		$(".right div:eq(3) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
			$(".right div:eq(3) strong").html("邮箱格式正确");
			$(".right div:eq(3)").removeClass("alert-danger").addClass("alert-success");
            errorMsg=false;
        }
	});
	////////////////
	$("#iconBtn").click(function(){
		$("#reg_icon").click();
	});
	var reader=new FileReader();
	$("#reg_icon").change(function(){
		//限定图片类型
		 if(!/image\/\w+/.test($("#reg_icon").get(0).files[0].type)){
			 	$(".right div:eq(4)").addClass("alert-danger");
				$(".right div:eq(4) span").addClass("glyphicon-remove");
				$(".right div:eq(4) strong").html("头像必须是图片");
				return false;
		 }
		 //限定图片大小
		 if($("#reg_icon").get(0).files[0].size>1000000){
			 	$(".right div:eq(4)").addClass("alert-danger");
				$(".right div:eq(4) span").addClass("glyphicon-remove");
				$(".right div:eq(4) strong").html("图片不能大于1M");
				return false;
		 }
		 $(".right div:eq(4) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
		 $(".right div:eq(4) strong").html("头像合法");
		 $(".right div:eq(4)").removeClass("alert-danger").addClass("alert-success");
		 reader.readAsDataURL($("#reg_icon").get(0).files[0]);
			reader.onload=function(){
				//console.log(this.result);
				$(".reg .img-circle").attr("src",this.result);
			}
	});
	////上传///
	$("#submitBtn").click(function(evt){
		//用户名不得为空
		if($.trim($("#reg_username").val()).length==0){
			$("#msgModal .msg").html("用户名不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		//密码不得为空
		if($.trim($("#reg_pwd").val()).length==0){
			$("#msgModal .msg").html("密码不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		/*验证密码*/
        switch (valid_pwd($.trim($("#reg_pwd").val()))){
            case 3:
                errorMsg="密码强度低";
                break;
            case 2:
                errorMsg="密码强度中";
                break;
            case 1:
                errorMsg="密码强度较高";
                break;
            case 0:
                errorMsg=false;
                break;
        }
        //alert(errorMsg);
		//两次密码必须一致
		if($.trim($("#reg_pwd").val())!=$.trim($("#confirm_reg_pwd").val())){
			$("#msgModal .msg").html("两次密码必须一致");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			errorMsg="两次密码必须一致";
			return false;
		}
		//alert(errorMsg);
		if($.trim($("#reg_email").val()).length==0){
			$("#msgModal .msg").html("邮箱不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			errorMsg="邮箱不得为空";
			return false;
		}
		if(!valid_email($("#reg_email").val())){
			$("#msgModal .msg").html("邮箱格式错误");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			errorMsg="邮箱格式错误";
			return false;
        }
		if(typeof $("#reg_icon").get(0).files[0]=="undefined"){
			$("#msgModal .msg").html("必须要上传图片");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
            errorMsg="必须要上传图片";
            return false;
        }
        //alert(errorMsg);
        if(errorMsg){
        		$("#msgModal .msg").html(errorMsg);
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
            return false;
        }
        //alert(errorMsg+"aaa");
		var fd=new FormData($("#reg_form")[0]);
		fd.append("action","send");
		fd.append("username",$("#reg_username").val());
		fd.append("pwd",$("#reg_pwd").val());
		fd.append("email",$("#reg_email").val());
		$.ajax({
			type:"post",
			url:"/user/checkUserName",
			data:fd,
			//fd对象在jquery的设置;
			processData:false,
			contentType:false,
			/////
			beforeSend:function(){
				$(".submit i").addClass("fa-spinner fa-spin");
			},
			success:function(response){
				if(response!='taken'){
					//console.log(response);
					var str=eval(response);
					if(response!="failed"){
						sessionStorage.setItem("username",str[0].username);
	                    sessionStorage.setItem("id",str[0].id); 
	                    sessionStorage.setItem("icon",str[0].icon); 
	                    sessionStorage.setItem("point",str[0].countdown); 
						location.href='/home/index';					
					}
				}
				
			},
			complete:function(){
				$(".submit i").removeClass("fa-spinner fa-spin");
			}
		});
		return false;
	});
});









