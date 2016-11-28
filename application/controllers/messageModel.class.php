<?php
/**
 *信息模型 
 *   */
class messageModel extends Model{
	private $id;
	private $limit;
	/**
	 * 在类外操作类的私有属性；
	 * @param mixed $_key
	 * @param mixed $_value  */
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function addMsg($array){
	    return parent::addData("message", $array);
	}
	public function getAllMsg(){
	    return parent::getAll("message");
	}
}
?>