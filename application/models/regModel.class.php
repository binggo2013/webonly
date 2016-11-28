<?php
class regModel extends Model{
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
	public function getAllLevel(){
		$_sql="select * from level order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllLevelTotal(){
		$_sql="select * from level";
		return parent::getTotal($_sql);
	}
	public function getOneLevel(){
		$_sql="select * from level where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function deleteLevel(){
		$_sql="delete from level where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updateLevel(){
		$_sql="update    level
			   set       name='".$this->name."',
				         description='".$this->description."',
				         permission='".$this->permission."'
			   where     id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addLevel(){
		$_sql="insert into level(
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