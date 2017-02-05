$(function(){
	//跳转窗口
	var percent;
    var start=1;
    var t=$("#msg").attr("info");
    var url=$("#msg").attr("url");
    var flag=$("#msg").attr("flag");
    //alert(flag);
    timer=setInterval(function(){
        if(t!=0){
           percent=parseInt(start/t*100)+'%';
        }
        $("#countdown").html(percent);
        $(".progress-bar").css({"width":percent});
        if(t==0){
           clearInterval(timer);
           $(".redirect").css({"display":"none"});
           if(flag==1){
        	   	location.href=url;
           }
        }
        t--;
    },1000);
   
});

