$(function(){
$("#fold").click(function(){
	//$(".menu").css({"width":"0px"});
	//alert($(".menu").css("width"));
	if($(".menu").css("width")=="0px"){
		$(".menu").animate({"width":"19%"},300);
		$(".rightFrame").animate({"width":"80%"},300);
	}else{
		$(".menu").animate({"width":"0px"},300);
		$(".rightFrame").animate({"width":"100%"},300);
	}
});
	//console.dir($("#subBtn"));
$("#subBtn").click(function(){
	alert(333);
	return false;
});
	//alert($)
	$("#admin_login .closeBar").click(function(){
		location.href="/home/index";
	});
	///////////////////////////////////
	//alert($(".panel").length);
	$(".menu .panel").each(function(index){
		$(this).click(function(){
			$(".panel").removeClass('panel-primary').addClass('panel-default');
			$(this).addClass('panel-primary');
		});
	});
	$("#selectBar").click(function(){
		$("input[type=checkbox]:not(#selectBar)").prop("checked",$("#selectBar").prop("checked"));
	});
	/////////////////////
////点击删除，弹出确认框/////////////
    $(".deleteBtn").click(function(){
    	$("#true").attr("href",$(this).attr("href"));    	
    	//$(".confirm").css({"display":"block"});
    	$(".confirm").fadeIn();
    	return false;
    });
    /////点击确认框的取消按钮，确认框消失/////////
    $("#falseBtn").click(function(){    	
    	//$(".confirm").css({"display":"none"});
    	$(".confirm").fadeOut();
    	return false;
    });
    /////点击确认框的确定按钮，删除元素/////////
    $("#true").click(function(){    	
    	return true;
    });
});