require.config({
	paths: {
	   "jquery": "http://www.webonly.org/public/scripts/jquery-1.10.2"
	   
	}
});
require(['uploadPreview','page'],function(upload,page){
	upload.preview();
	page.page();
});