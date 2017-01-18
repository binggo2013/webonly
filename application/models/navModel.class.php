<?php
class navModel extends Model{
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getNavByName(){
		$_sql="select * from nav where name='".$this->name."'";
		return parent::getAllResult($_sql);
	}
	public function getFrontNav(){
		return parent::getAll("nav","where pid=0 and state=1 order by sort desc limit 10");
	}
	public function deleteAllNav(){
		$_sql="delete from nav where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function getOneNav($id){
		return parent::getOne("nav","where id=".$id);
	}
	public function updateNav(){
		$_sql="update     nav
			   set        name='".$this->name."',
			              url='".$this->url."',
			              hasChild='".$this->hasChild."',
				          description='".$this->description."'
			   where      id=".$this->id;
		return parent::cud($_sql);
	}
	public function deleteNav(){
		$_sql="delete from nav where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getAllSubNav(){
		$_sql="select * from nav where pid<>0";
		return parent::getAllResult($_sql);
	}
	public function setSort(){
		foreach ($this->sort as $key=>$value){
			$_sql.="update nav set sort=".$value." where id=".$key.";";
		}
		//echo $_sql;
		return parent::multi_query($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update nav set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getAllMainNavTotal(){
		$_sql="select * from nav where pid=0";
		return parent::getTotal($_sql);
	}
	public function getAllSubNavById(){
		$_sql="select * from nav where pid=".$this->id." order by sort desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllSubNavByIdTotal(){
		$_sql="select * from nav where pid=".$this->id;
		return parent::getTotal($_sql);
	}
	public function getAllMainNav(){
		$_sql="select * from nav where pid=0 order by sort desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function addMainNav(){
		$_sql="insert into nav(
								name,
								description,
                        		    url,
                        		    hasChild,
								state,
								pid,
								sort,
								date,
								picked
				)values(
						'".$this->name."',
						'".$this->description."',
						'".$this->url."',
						'".$this->hasChild."',
						1,
						0,
						".parent::Auto_increment('nav').",
						now(),
						1
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addSubNav(){
		$_sql="insert into nav(
								name,
								description,
								state,
								pid,
								sort,
								date,
								picked
				)values(
						'".$this->name."',
						'".$this->description."',
						1,
						".$this->id.",
						".parent::Auto_increment('nav').",
						now(),
						1
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
}
?>