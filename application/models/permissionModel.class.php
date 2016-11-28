<?php
class permissionModel extends Model{
	private $limit;
	private $id;
	private $name;
	private $description;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}	
	public function __get($_key){
		return $this->$_key;
	}
	public function getPID($_name){
		$_sql="select * from permission where name='".$_name."'";
		return parent::getOne($_sql);
	}
	public function getAllPermission(){
		$_sql="select * from permission order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function deleteAllPermission(){
		$_sql="delete from permission where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function getAllPermissionTotal(){
		$_sql="select * from permission";
		return parent::getTotal($_sql);
	}
	public function getOnePermission(){
		$_sql="select * from permission where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function updatePermission(){
		$_sql="update permission 
			   set    name='".$this->name."',
				      description='".$this->description."' 
			   where  id=".$this->id;
		return parent::cud($_sql);		
	}
	public function deletePermission(){
		$_sql="delete from permission where id=".$this->id;
		return parent::cud($_sql);
	}
	public function addPermission(){
		$_sql="insert into permission(
										name,
										description,
										pid,
										date
				)values(
						'".$this->name."',
						'".$this->description."',
						".parent::Auto_increment('permission').",
						now()
				)";
		return parent::cud($_sql);
	}
}
?>