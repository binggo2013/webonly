var reader=new FileReader();
function changePIC(_element,_icon){
	_element.change(function(){
		//限定图片类型
		 if(!/image\/\w+/.test(_element.get(0).files[0].type)){
			 	alert("头像必须是图片格式");
				return false;
		 }
		 //限定图片大小
		 if(_element.get(0).files[0].size>1000000){					 	
				alert("图片不能大于1M");						
				return false;
		 }				 
		 reader.readAsDataURL(_element.get(0).files[0]);
			reader.onload=function(){				
				_icon.attr("src",this.result);
				console.log(_icon.src);
			}
	});
}