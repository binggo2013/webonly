<?php
class categoryModel extends Model{
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
	public function getAllCategory(){
		$_sql="select * from category order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllCategoryTotal(){
		$_sql="select * from category";
		return parent::getTotal($_sql);
	}
	public function getOneCategory(){
		$_sql="select * from category where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function deleteCategory(){
		$_sql="delete from category where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updateCategory(){
		$_sql="update    category 
			   set       name='".$this->name."',
				         description='".$this->description."'				         
			   where     id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addCategory(){
		$_sql="insert into category(
								name,
								description,								
								date
				)values(
						'".$this->name."',
						'".$this->description."',						
						now()
				)";
		return parent::cud($_sql);
	}
}
?>