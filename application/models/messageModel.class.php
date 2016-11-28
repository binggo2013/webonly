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
	public function getAllUnreadMsg(){
	    return parent::getAll("message",$this->limit," where readStatus=0 and type=3","order by id desc");
	}
	public function getAllUnreadMsgTotal(){
	    return parent::getAllDataTotal("message","where readStatus=0 and type=3 order by id desc  limit 0,5");
	}
	public function updateMsg($array){
	    return parent::updateData("message", $array, $this->id);
	}
	public function getAllMsg(){
	    return parent::getAll("message",$this->limit);
	}
	public function getAllMsgTotal(){
	    return parent::getAllDataTotal('message');
	}
	public function getAdminOneMsg(){
	    return parent::getOneDataById("message", $this->id);
	}
	public function getOneMsg(){
	    $_sql="select * from message where id=".$this->id;
	    return parent::getOne($_sql);
	    //return parent::getOneDataById("message", $this->id);
	}
}
?>