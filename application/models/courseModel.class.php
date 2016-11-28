<?php
class courseModel extends Model{
	private $limit;
	private $id;
	private $name;
	private $description;
	private $permission;
	private $multiId;
	private $date;
	private $course_id;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function setState($_flag){
	    $switch=null;
	    if($_flag=='hide'){
	        $switch=0;
	    }elseif($_flag=='show'){
	        $switch=1;
	    }
	    $_sql="update course set state=".$switch." where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function getAllCourse(){
		$_sql="select * from course order by id desc ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getFrontCourse(){
	    $_sql="select * from course where state=1 order by id desc";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getFirstCourse(){
	    $_sql="select * from course  order by id desc ";
	    return parent::getFirstResult($_sql);
	}
	public function getAllCourseTotal(){
		$_sql="select * from course";
		return parent::getTotal($_sql);
	}
	public function getOneCourse(){
		$_sql="select * from course where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function deleteCourse(){
		$_sql="delete from course where id=".$this->id;
		return parent::cud($_sql);
	}
	public function updateCourse(){
		$_sql="update    course
			   set       name='".$this->name."',
				         description='".$this->description."'
			   where     id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addCourse(){
		$_sql="insert into course(
								name,
								description,
								date
				)values(
						'".$this->name."',
						'".$this->description."',
						now()
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
}
?>