<?php
class commentModel extends Model{
	private $limit;
	private $id;
	private $aid;
	private $uid;
	private $pid;
	private $state;
	private $content;
	private $up;
	private $down;
	private $date;
	private $icon;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function deleteAllComment(){
		$_sql="delete from comment where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function getAllCommentsByUID(){
	    $_sql="select * from comment where uid=".$this->uid." order by id desc  limit 0,15";	    
	    return parent::getAllResult($_sql);
	}
	public function getOneComment(){
		$_sql="select *  from comment where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update comment set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}	
	public function getAllCommentsByUIDTotal(){
		$_sql="select * from comment where uid='".$this->uid."'";
		return parent::getTotal($_sql);
	}
	public function deleteComment(){
		$_sql="delete from comment where id=".$this->id;
		return parent::cud($_sql);
	}
	public function addComment(){
		$_sql="insert into comment(
									aid,
									uid,
									pid,
									state,
									content,
									date
				)values(
						".$this->aid.",
						".$this->uid.",
						0,
						1,
						'".$this->content."',
						now()
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function getAdminAllCommentTotal(){
		$_sql="select * from comment";
		return parent::getTotal($_sql);
	}
	public function getAdminAllComment(){
		$_sql="select * from comment order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllComment(){
		$_sql="select * from comment where state=1 and aid=".$this->aid." order by id desc ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getAllCommentTotal(){
		$_sql="select * from comment where state=1 and aid=".$this->aid;
		//echo $_sql;
		return parent::getTotal($_sql);
	}


}
?>