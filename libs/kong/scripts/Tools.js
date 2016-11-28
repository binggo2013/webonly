/**
 * 检测数据类型
 */
function checkType(_data) {
	if (typeof _data != 'object') {
		return typeof _data;
	} else {
		return Object.prototype.toString.call(_data);
	}
}
/**
 * 重定向
 */
function Redirect(){
	var timer=document.getElementById("timer");
	var Redirect=document.getElementById("Redirect");
	center(Redirect);
	var countdown=Redirect.dataset.countdown;
	var url=Redirect.dataset.url;
	var tt=setInterval(function(){
		if(countdown<=1){
			countdown=1;
			clearInterval(tt);
			Redirect.style.display="none";
			location.href=url;
		}
		countdown--;
		//console.log(countdown);
		timer.innerHTML=countdown;
	},1000);
}
/**
 * 为小于10的数字前面加0
 * */
function addZero(_num){
    //console.log(typeof _num);
    if(typeof _num=="number"){
        if(_num<10){
            _num="0"+_num;
        }else{
            _num=""+_num;
        }
    }else{
        console.log("参数"+_num+"类型错误");
    }
    return _num;
}
/*获取页面的滚动条*/
function getScroll(){
    return {
        "left":document.documentElement.scrollLeft||document.body.scrollLeft,
        "top":document.documentElement.scrollTop||document.body.scrollTop
    }
}
/*获取窗口的尺寸*/
function getWindowSize(){
    return {
        "width":document.documentElement.clientWidth||window.innerWidth,
        "height":document.documentElement.clientHeight||window.innerHeight
    }
}
/*居中函数*/
function center(_element){
    var left=(getWindowSize().width-_element.clientWidth)/2+getScroll().left;
    var top=(getWindowSize().height-_element.clientHeight)/2+getScroll().top;
    _element.style.left=left+"px";
    _element.style.top=top+"px";
}
/**
 * 跨浏览器的事件绑定
 * @param {Object}_element
 * @param {string}_type
 * @param {function}_listener
 * @return void
 */
function bind(_element,_type,_listener){
    if(_element){
        if(typeof _element.addEventListener=="undefined"){
            _element.attachEvent("on"+_type,_listener);
        }else{
            _element.addEventListener(_type,_listener);
        }
    }
}
/**
 * 跨浏览器的阻止默认冒泡
 * @param _evt
 */
function stopPropagation(_evt){
    //_evt在ie中，就是window对象的event对象
    if(window.event){
        _evt=window.event;
        _evt.cancelBubble=true;
    }else{
        //在非ie中，就是一个独立的事件对象
        _evt.stopPropagation();
    }
}
/**
 * 获取鼠标选择的文本
 * @returns {*}
 */
function getSelectionText(){
    var txt=null;
    //非ie
    if(window.getSelection){
        txt=window.getSelection();
    }else if(document.selection){
        txt=document.selection.createRange().text;
    }else if(document.getSelection){
        txt=document.getSelection();
    }
    return txt;
}
/**
 * 跨浏览器的创建Ajax对象
 * @returns {Object}
 */
function createXMLHttpRequest(){
    var xmlHttp;
    if(window.ActiveXObject){
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }else if(window.XMLHttpRequest){
        xmlHttp=new XMLHttpRequest();
    }
    return xmlHttp;
}
/**
 * 修剪前后的空格
 * @param _content
 * @returns {*|XML|void|string}
 */
function trim(_content){
    var pattern=/^\s*(.+?)\s*$/g;
    _content=_content.replace(pattern,"$1");
    return _content;
}