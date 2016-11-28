<?php
class adminModel extends Model{
	private $limit;
	private $id;
	private $username;
	private $pwd;
	private $last_ip;
	private $last_time;
	private $login_num;
	private $level_id;
	private $reg_time;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function updateLogin(){
		$_sql="update    admin 
			   set       login_num=login_num+1,
				         last_ip='".$this->last_ip."',
				         last_time=now()
			   where     username='".$this->username."'";
		return parent::cud($_sql);
	}
	public function getOneByNamePWD(){
		$_sql="select    * 
			   from      admin,level 
			   where     username='".$this->username."' 
			   and       pwd='".$this->pwd."' 
			   and       admin.level_id=level.id";
		return parent::getOne($_sql);
	}
	public function deleteAllAdmin(){
		$_sql="delete from admin where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAllAdmin(){
		//$_sql="select * from admin order by id desc ".$this->limit;
		$_sql="select admin.id,
				      admin.username,
				      admin.pwd,
				      admin.level_id,
				      admin.login_num,
				      admin.last_ip,
				      admin.last_time,
					  level.name
			   from admin,level where admin.level_id=level.id and admin.level_id in (".$this->level_id.") order by admin.id desc ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getOneAdmin(){
		$_sql="select * from admin where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function deleteAdmin(){
		$_sql="delete from admin where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updateAdmin(){
		$_sql="update     admin 
			   set        username='".$this->username."',				          
				          pwd='".$this->pwd."',
				          level_id=".$this->level_id." 
			 where        id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function getAllAdminTotal(){
		$_sql="select * from admin,level where admin.level_id=level.id and admin.level_id in (".$this->level_id.")";
		//echo $_sql;
		return parent::getTotal($_sql);
	}
	public function addAdmin(){
		$_sql="insert into admin(
								username,
								pwd,
								last_ip,
								last_time,
								login_num,
								level_id,
								reg_time
				)values(
						'".$this->username."',
						'".$this->pwd."',
						'".$this->last_ip."',
						now(),
						1,
						".$this->level_id.",
						now()
				)";
		return parent::cud($_sql);
	}
}
?>