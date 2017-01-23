$(function(){
	//console.log($("#downloadBtn"));
	$(".downloadBar").click(function(){	
		alert($(this).attr("href"));
		$.ajax({
			'type':"post",
			'url':"/download/updateNum",
			'data':{"url":$(this).attr("href")},
			success:function(response){
				console.log(response);
			}
		});
		return true;
	});
	////////////////
	$("#changeBtn").click(function(){
		$("#newpic").click();			
	});
	$("#submitBtn").click(function(){		
		$("#tid").change(function(){
			$(".glyphicon-asterisk").html("必须是zip格式");
		});
		if($("#tid").val()=="0"){
			$(".glyphicon-asterisk").html("必须要选择一个主题");
			return false;
		}
		return true;
	});	
});