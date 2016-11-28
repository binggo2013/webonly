<?php
class voteModel extends Model{
	private $id;
	private $limit;
	private $title;
	private $description;
	private $amount;
	private $state;
	private $pid;
	private $date;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function deleteVote(){
		$_sql="delete from vote where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updateVote(){
		$_sql="update      vote
			   set         title='".$this->title."',
				           description='".$this->description."'
			   where       id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function setCast(){
		$_sql="update vote set amount=amount+1 where id=".$this->id;
		return parent::cud($_sql);
	}
	public function deleteAllVote(){
		$_sql="delete from vote where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update vote set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getOneVote(){
		$_sql="select * from vote where id=".$this->id;
		//echo $_sql;
		return parent::getOne($_sql);
	}
	public function getAllSubjectTotal(){
		$_sql="select * from vote where pid=0";
		//echo $_sql;
		return parent::getTotal($_sql);
	}
	/**
	 * 显示某个主题下的所有的投票项
	 * @return multitype:  */
	public function getItemById(){
		$_sql="select * from vote where pid=".$this->id." order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getItemByIdTotal(){
		$_sql="select * from vote where pid=".$this->id;
		return parent::getTotal($_sql);
	}
	public function addItem(){
		$_sql="insert into vote(
								title,
								description,
								state,
								date,
								pid
				)values(
						'".$this->title."',
						'".$this->description."',
						1,
						now(),
						".$this->id."
				)";
		return parent::cud($_sql);
	}
	public function getFrontVoteSubject(){
		$_sql="select * from vote where state=1 and pid=0 order by id desc limit 1";
		return parent::getFirstResult($_sql);
	}
	public function getFrontVoteItem(){
		$_sql="select * from vote where state=1 and pid=(select id from vote where state=1 and pid=0 order by id desc limit 1)";
		return parent::getAllResult($_sql);
	}
	/**
	 * 把表中投票项的投票数相加
	 * @return multitype:  */
	public function getAllSubject(){
		//$_sql="select * from vote where pid=0 order by id desc ".$this->limit;
		$_sql="select  v.id,
				v.title,
				v.description,
				v.state,
				(select sum(amount) from vote where pid=v.id)as totalCount
				from vote as v where v.pid=0 order by v.id desc".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function addSubject(){
		$_sql="insert into vote(
								title,
								description,
								date,
								state,
								pid
				)values(
						'".$this->title."',
						'".$this->description."',
						now(),
						1,
						0
				)";
		return parent::cud($_sql);
	}
}
?>