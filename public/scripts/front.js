require.config({
	//baseUrl: "public/scripts/"
	paths:{
		"jquery":"http://www.webonly.org/libs/jQuery/jquery3",
		'bootstrap':"http://www.webonly.org/libs/bootstrap/scripts/bootstrap",
		'AjaxPage':"http://www.webonly.org/public/scripts/AjaxPage"
	},
	shim : {  
        bootstrap : {  
             deps : [ 'jquery' ],  
             exports : 'bootstrap'  
        } ,
        AjaxPage : {  
            deps : [ 'jquery' ],  
            exports : 'AjaxPage'  
       }
   }    
});
//console.log(sessionStorage.getItem("username"));
require(['check',"bootstrap",'comment','header','AjaxPage'],function(check,bootstrap,comment,header){
	check.checkLogin();
	check.checkDownload();
	check.getLogin();
	check.refreshCaptcha();
	check.getLogout();
	comment.post();
	header.nav();
});
