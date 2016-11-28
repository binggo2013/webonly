$(function(){
	//////检测用户名////////
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
				'url':"?a=user&m=checkUserName",
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
	///////////////
	$("#reg_username").focus(function(){
		$(".right div:eq(0) span").removeClass("glyphicon-remove glyphicon-ok");
		$(".right div:eq(0) strong").html("");
		$(".right div:eq(0)").removeClass("alert-danger alert-success");
	});
	//////密码/////
	$("#reg_pwd").keyup(function(){
		var errorNum = 0;
		if (!/[\d]/.test($.trim($.trim($("#reg_pwd").val())))) {
			//errorNum=errorNum+1;
			errorNum++;
		}
		//不包含小写
		if (!/[a-z]/.test($.trim($.trim($("#reg_pwd").val())))) {
			//errorNum=errorNum+1;
			errorNum++;
		}
		//不包含大写
		if (!/[A-Z]/.test($.trim($.trim($("#reg_pwd").val())))) {
			//errorNum=errorNum+1;
			errorNum++;
		}
		//不包含非[a-zA-Z0-9]
		if (!/[\W]/.test($.trim($.trim($("#reg_pwd").val())))) {
			//errorNum=errorNum+1;
			errorNum++;
		}
		if (errorNum == 4) {
			$(".right div:eq(1)").removeClass("alert-warning alert-success").addClass("alert-danger");
			$(".right div:eq(1) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
			$(".right div:eq(1) strong").html("密码必须包含大小写、数字、特殊字符");
			return false;
		} else if (errorNum == 3) {
			$(".right div:eq(1)").removeClass("alert-warning alert-success").addClass("alert-danger");
			$(".right div:eq(1) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
			$(".right div:eq(1) strong").html("密码强度非常低");
			return false;
		} else if (errorNum == 2) {
			$(".right div:eq(1)").removeClass("alert-danger alert-success").addClass("alert-warning");
			$(".right div:eq(1) span").removeClass("glyphicon-ok").addClass("glyphicon-remove");
			$(".right div:eq(1) strong").html("密码强度低");
			return false;
		} else if (errorNum == 1) {
			$(".right div:eq(1)").removeClass("alert-danger alert-warning").addClass("alert-success");
			$(".right div:eq(1) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
			$(".right div:eq(1) strong").html("密码强度中");
			return false;
		} else if (errorNum == 0) {
			$(".right div:eq(1)").removeClass("alert-danger alert-warning").addClass("alert-success");
			$(".right div:eq(1) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
			$(".right div:eq(1) strong").html("密码强度高");			
		}
	});
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
	var pattern=/^[a-zA-Z0-9]+([\._-]+[a-zA-Z0-9]+)?@[a-zA-Z0-9]+([_-]+[a-zA-Z0-9]+)?\.[a-zA-Z]{2,4}(\.[a-zA-Z]{2,4})?$/i;
	$("#reg_email").keyup(function(){
			if(!pattern.test($.trim($("#reg_email").val()))){
				$(".right div:eq(3)").addClass("alert-danger");
				$(".right div:eq(3) span").addClass("glyphicon-remove");
				$(".right div:eq(3) strong").html("邮箱格式不正确");
				return false;
			}else{
				$(".right div:eq(3) span").removeClass("glyphicon-remove").addClass("glyphicon-ok");
				$(".right div:eq(3) strong").html("邮箱格式正确");
				$(".right div:eq(3)").removeClass("alert-danger").addClass("alert-success");
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
	$("#submitBtn").click(function(){
		if($.trim($("#reg_username").val()).length==0){
			$("#msgModal .msg").html("用户名不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		if($.trim($("#reg_pwd").val()).length==0){
			$("#msgModal .msg").html("密码不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		if($.trim($("#reg_pwd").val())!=$.trim($("#confirm_reg_pwd").val())){
			$("#msgModal .msg").html("两次密码必须一致");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		if($.trim($("#reg_email").val()).length==0){
			$("#msgModal .msg").html("邮箱不得为空");
			$("#msgModal").modal("show");
			setTimeout(function(){
				$("#msgModal").modal("hide");
			},2000);
			return false;
		}
		var fd=new FormData($("#reg_form")[0]);
		fd.append("action","send");
		fd.append("username",$("#reg_username").val());
		fd.append("pwd",$("#reg_pwd").val());
		fd.append("email",$("#reg_email").val());
		$.ajax({
			type:"post",
			url:"?a=user&m=checkUserName",
			data:fd,
			//fd对象在jquery的设置;
			processData:false,
			contentType:false,
			/////
			beforeSend:function(){
				$(".submit i").addClass("fa-spinner fa-spin");
			},
			success:function(response){
				var str=eval(response);
				if(response!="failed"){
					sessionStorage.setItem("username",str[0].username);
                    sessionStorage.setItem("id",str[0].id); 
                    sessionStorage.setItem("icon",str[0].icon); 
                    sessionStorage.setItem("point",str[0].countdown); 
					location.href='?a=home';					
				}
			},
			complete:function(){
				$(".submit i").removeClass("fa-spinner fa-spin");
			}
		});
		return false;
	});
});









