<?php
/**
 * 结合bootsrap使用
 * @todo pageList添加左右箭头  
 * 
 *  */
class Page{
	private $limit;
	private $listRows;
	private $page;
	private $total;
	private $url;
	/**
	 * 当前页前后各显示几个页面;
	 * @var int  */
	private $num;
	/**
	 * 总页数
	 * @var int  */
	private $pageNum;
	private $config=array("prev"=>"上一页",'next'=>"下一页");
	/**
	 * 参数的顺序
	 * 
	 * @param number $_total
	 * @param number $_listRows
	 * @param number $_num  */
	public function __construct($_total,$_listRows=10,$_num=3){
		//var_dump($this->config);
		$this->num=$_num;
		$this->total=$_total;
		$this->listRows=$_listRows;		
		$this->pageNum=ceil($this->total/$this->listRows);
		$this->handlePage();
		//公式（当前页-1）×每页的条数;
		$this->limit=" limit ".($this->page-1)*$this->listRows.", ".$this->listRows;
		$this->url=$this->reWrite();
	}
	private function reWrite(){
		$newURL=null;
		//url路径
		$url=$_SERVER['REQUEST_URI'];
		//把路径解析为数组,保护path，query
		//query：路径中？后的内容===>查询字符串
		$parseURL=parse_url($url);
		//如果有查询字符串的话
		if(isset($parseURL['query'])){
			//把查询字符串再解析为key:value的数组
			parse_str($parseURL['query'],$query);
			unset($query['page']);
			//print_r($query);
			$newURL=$parseURL['path']."?".http_build_query($query);
		}else{
			$newURL=$parseURL['path']."?";
		}
		//var_dump($parseURL);
		return $newURL;
	}
	/*
	 * 属性一般要设置成私有，但有些属性要在外部调用。
	 * php通过__set(),__get()魔术方法处理类的私有属性；
	 * */
	/**
	 * 外部可以设置类的私有属性
	 * @param mixed $_key
	 * @param mixed $_value  */
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	/**
	 * 外部获取类的私有属性;
	 * @param unknown $_key  */
	public function __get($_key){
		return $this->$_key;
	}	
	/**
	 * 处理页的范围
	 *   */
	private function handlePage(){
		//三元选择
		$this->page=!empty($_GET['page'])?$_GET['page']:1;
		if($this->page>$this->pageNum){
			$this->page=$this->pageNum;
		}
		if($this->page<1){
			$this->page=1;
		}
	}
	public function setConfig($_key,$_value){
		if(isset($this->config[$_key])){
			$this->config[$_key]=$_value;
		}else{
			echo "<span style='color:red;font-weight:bold;'>config的下标不存在</span>";
		}
	}
	/**
	 * 循环显示页数;
	 *   */
	private function pageList(){
		$prev=null;
		$next=null;
		for($i=$this->num;$i>=1;$i--){
			if($this->page-$i<1){
				//忽略，代码继续执行；
				continue;
			}else{
				$prev.="<li><a href='".$this->url."&page=".($this->page-$i)."' >".($this->page-$i)."</a></li>";
			}			
		}
		$present="<li class='active'><span>".$this->page."</span></li>";
		for($j=1;$j<=$this->num;$j++){
			if($this->page+$j<=$this->pageNum){
				$next.="<li><a href='".$this->url."&page=".($this->page+$j)."'>".($this->page+$j)."</a></li>";
			}else{
				//代码终止;
				break;
			}			
		}
		return $prev.$present.$next;
	}
	/**
	 * 显示首页
	 * @return string*/
	private function first(){
		$str=null;
		//当前页是第一页时;
		if($this->page==1){
			//$str="<li><span class='disabled'>1</span></li>";
			$str=null;
		}elseif($this->page>$this->num+2){
			$str="<li><a href='".$this->url."&page=1'>1</a></li><li><span class='disabled'>...</span></li>";
		}elseif($this->page>$this->num+1){
			$str="<li><a href='".$this->url."&page=1'>1</a></li>";
		}
		return $str;
	}
	/**
	 * 前一页
	 * @return string  */
	private function prev(){
		$str=null;
		if($this->page==1){
			$str="<li class='disabled'><span class='fa fa-angle-double-left'></span></li>";
			//$str=null;
		}else{
			$str="<li><a href='".$this->url."&page=".($this->page-1)."' class='fa fa-angle-double-left'></a></li>";
		}
		return $str;
	}
	/**
	 * 下一页
	 * @return string  */
	private function next(){
		$str=null;
		if($this->page==$this->pageNum){
			$str="<li class='disabled'><span class='fa fa-angle-double-right'></span></li>";
			//$str=null;
		}else{
			$str="<li><a href='".$this->url."&page=".($this->page+1)."' class='fa fa-angle-double-right'></a></li>";
		}
		return $str;
	}
	/**
	 * 当前页
	 * @return string  */
	private function present(){
		return "<li class='active'><span>".$this->page."</span></li>";
	}
	/**
	 * 显示 末页
	 * @return string*/
	private function end(){
		$str=null;
		if($this->page==$this->pageNum){
			//$str="<li><span class='disabled'>".$this->pageNum."</span></li>";
			$str=null;
		}elseif($this->pageNum-$this->page>$this->num+1){
			$str="<li><span class='disabled'>...</span></li><li><a href='".$this->url."&page=".$this->pageNum."'>".$this->pageNum."</a></li>";
		}elseif($this->pageNum-$this->page>$this->num){
			$str="<li><a href='".$this->url."&page=".$this->pageNum."'>".$this->pageNum."</a></li>";			
		}
		return $str;
		
	}
	private function select(){
		$str=null;
		$str.="&nbsp;<select class='form-control text-center' style='width:85px;display:inline' id='mySelect'>";
		for($i=$this->num*2;$i>=1;$i--){
			if($this->page-$i<1){
				//忽略，代码继续执行；
				continue;
			}else{
				$str.="<option value='".($this->page-$i)."'>".($this->page-$i."/".$this->pageNum)."</option>";
			}
		}		
		for($j=0;$j<=$this->num*2;$j++){
			if($this->page+$j<=$this->pageNum){
				//找到当前页，把当前页显示在第一行
				if($this->page==($this->page+$j)){
					$str.="<option value='".($this->page+$j)."' selected='selected'>".($this->page+$j."/".$this->pageNum)."</option>";
				}else{
					$str.="<option value='".($this->page+$j)."'>".($this->page+$j."/".$this->pageNum)."</option>";
				}
				
			}else{
				//代码终止;
				break;
			}
		}
		$str.="</select>";
		$str.="<script>";
		$str.="
				var mySelect=document.getElementById('mySelect');
				//alert(myselect.tagName);
				mySelect.onchange=function(){
					//alert(mySelect.value);
					location.href='".$this->url."&page='+mySelect.value;
				}
				";
		$str.="</script>";
		return $str;
	}
	private function jump(){
		$str=null;
		$str.="<li>";
		$str.="&nbsp;<input type='text' class='form-control text-center' style='width:50px;display:inline' id='urInput' value='".$this->page."'>";
		$str.="&nbsp;<input type='button' value='GO' class='btn btn-success' id='btn'>";
		$str.="</li>";
		$str.="<script>";
		$str.="
				var urInput=document.getElementById('urInput');
				//alert(urInput.tagName);
				urInput.onkeyup=function(evt){
					//alert(333);
				var e=evt||window.event;
					if(e.keyCode==13){
						location.href='".$this->url."&page='+urInput.value;
					}
				}
				var btn=document.getElementById('btn');
				btn.onclick=function(){
					location.href='".$this->url."&page='+urInput.value;
	            }
				";
		$str.="</script>";
		return $str;
	}
	/**
	 * 每页的第一条数据的自然序号
	 * @return number  */
	public function listRowsBegin(){
		return ($this->page-1)*$this->listRows+1;
	}
	/**
	 * 每页的最后一条数据的自然序号
	 * @return number  */
	private function listRowsEnd(){
		return min($this->page*$this->listRows,$this->total);
	}
	/**
	 * 显示分页的样式
	 * @param array $_data:
	 * @return string:字符串 */
	public function display($_data=array(0,1,2,3,4,5,6)){
		$str="<ul class='pagination'>";	
		$ui[0]=	$this->prev();
		$ui[1]=$this->first();
		$ui[2]=$this->pageList();
		$ui[3]=$this->end();
		$ui[4]=$this->next();
		$ui[5]=$this->select();
		$ui[6]=$this->jump();
		$data=array(0,1,2,3,4,5,6);				
		foreach ($_data as $value){
			//echo $value."<br>";
			if(in_array($value, $data)){
				$str.=$ui[$value];
			}else{
				echo "<span style='color:red;font-weight:bold;'>display中参数的下标不正确</span>";
			}			
		}			
		$str.="</ul>";
		return $str;
	}	
}