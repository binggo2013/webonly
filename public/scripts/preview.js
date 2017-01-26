$(function(){
	//上传图片预览
	var pic=document.querySelector("#pic");
	var preview=document.querySelector("#preview");
	if(pic){
		pic.addEventListener("change",function(){
			//console.log(this.files[0]);
			var fr=new FileReader();
			//console.log(fr);
			fr.readAsDataURL(this.files[0]);
			fr.addEventListener("load",function(){
				preview.src=this.result;
			});
		});
	}			
});
