<?php
class topicModel extends Model{
	private $limit;
	private $id;
	private $name;
	private $description;
	private $permission;
	private $multiId;
	private $date;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAlltopic(){
		$_sql="select * from topic order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllDownloadByTitle(){
	    $_sql="select * from topic where name='".$this->name."'";
	    //echo $_sql;
	    return parent::getOne($_sql);
	}
	public function getAlltopicTotal(){
		$_sql="select * from topic";
		return parent::getTotal($_sql);
	}
	public function getOnetopic(){
		$_sql="select * from topic where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function deletetopic(){
		$_sql="delete from topic where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updatetopic(){
		$_sql="update    topic 
			   set       name='".$this->name."',
				         description='".$this->description."',
				         permission='".$this->permission."' 
			   where     id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addtopic(){
		$_sql="insert into topic(
								name,
								description,
								permission,
								date
				)values(
						'".$this->name."',
						'".$this->description."',	
						'".$this->permission."',
						now()
				)";
		return parent::cud($_sql);
	}
}
?>