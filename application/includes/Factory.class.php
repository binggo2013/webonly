<?php
/**
 * 工厂类
 * 根据地址栏的值，返回相应的控制器和模型  
 *  */
class Factory{
	static private $obj=null;
	/**
	 * 获取地址栏a的值，默认是home
	 * @return unknown|string  */
	static public function getAction(){
		if(isset($_GET['a'])&&!empty($_GET['a'])){
			return $_GET['a'];
		}
		return "home";
	}
	/**
	 * 设置控制器
	 * 根据传进来的不同值，返回相应的控制器对象
	 *   */
	static public function setAction(){
	    $a=self::getAction();
	    if(file_exists(ROOT_PATH.'/application/controllers/'.$a."Action.class.php")){
	        //a=index
	        //self::$obj=new indexAction();
	        eval('self::$obj=new '.$a.'Action();');
	        return self::$obj;
	    }else{
	        exit($a."Action控制器不存在");
	    }
	}
	/**
	 *设置模型
	 *根据传进来的不同值，返回相应的模型对象
	 *   */
	static public function setModel(){
		$a=self::getAction();		
		if(file_exists(ROOT_PATH."application/models/".$a."Model.class.php")){
			eval('self::$obj=new '.$a."Model();");			
			return self::$obj;
		}
	}
}
?>