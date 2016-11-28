<?php
class userModel extends Model{
	private $id;
	private $username;
	private $pwd;
	private $login_num;
	private $last_ip;
	private $last_time;
	private $regTime;
	private $icon;
	private $email;
	private $limit;
	private $multiId;
	private $countdown;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function addPoint(){
	    $_sql="update user set countdown=".$this->countdown." where id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function updateCountdown(){
	    $_sql="update user set countdown=countdown-1 where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function resetPWD(){
	    $_sql="update user
	           set    pwd='".$this->pwd."'
	           where  username='".$this->username."'";
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function updateUser(){
	    $_sql="update  user
	           set     pwd='".$this->pwd."',
	                   email='".$this->email."',
	                   icon='".$this->icon."'
	          where    id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function getLatestUser(){
		$_sql="select * from user order by id desc limit 1";
		return parent::getOne($_sql);
	}
	public function updateLogin(){
		$_sql="update    user
			   set       login_num=login_num+1,
				         last_ip='".$this->last_ip."',
				         last_time=now()
			   where     username='".$this->username."'";
		return parent::cud($_sql);
	}
	public function deleteAllUser(){
		$_sql="delete from user where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update user set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}
	public function deleteUser(){
		$_sql="delete from user where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getAllUser(){
		$_sql="select * from user order by last_time desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllUserTotal(){
		$_sql="select * from user";
		return parent::getTotal($_sql);
	}
	public function getOneUserByNamePWD(){
		$_sql="select * from user where username='".$this->username."' and pwd='".$this->pwd."'";
		return parent::getOne($_sql);
	}	
	public function getOneUserByID(){
		$_sql="select * from user where id=".$this->id;
		//echo $_sql;
		return parent::getOne($_sql);
	}
	public function getOneUserByName(){
		$_sql="select * from user where username='".$this->username."'";
		return parent::getOne($_sql);
	}
	public function getOneUserByEmail(){
	    $_sql="select * from user where email='".$this->email."' and username='".$this->username."'";
	    //echo $_sql;
	    return parent::getOne($_sql);
	}
	public function addUser(){
		$_sql="insert into user(
								username,
								pwd,
								login_num,
								last_ip,
								last_time,
								regTime,
								icon,
								email,
		                        countdown,
		                        state
				)values(
						'".$this->username."',
						'".$this->pwd."',
						1,
						'".$this->last_ip."',
						now(),
						now(),
						'".$this->icon."',
						'".$this->email."',
						    5,
						1
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
}
?>