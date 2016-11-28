define(function(DEMO){
	return{
		preview:function(){
			var uploadBar=document.getElementById("uploadBar");
			var file=document.getElementById("file");
			var defaultImage=document.getElementById("defaultImage");
			uploadBar.addEventListener("click",function(){
				file.click();
			});
			//上传之前预览图片
			file.addEventListener("change",function(){
				var pic=document.getElementById("file").files[0];
				var fr=new FileReader();
				fr.readAsDataURL(pic);
				fr.addEventListener("load",function(){
					defaultImage.src=this.result;
				});
			});
		}
	}
});
