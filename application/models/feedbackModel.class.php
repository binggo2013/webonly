<?php
class feedbackModel extends Model{
	private $id;
	private $limit;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function getAllFeedback(){
	    $_sql="select * from feedback order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function deleteAllFeedback(){
	    $_sql="delete from feedback where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function getAllNewFeedbackTotal(){
	    $_sql="select * from feedback where state=0";
	    return parent::getTotal($_sql);
	}
	public function setState($_flag){
	    $switch=null;
	    if($_flag=='hide'){
	        $switch=0;
	    }elseif($_flag=='show'){
	        $switch=1;
	    }
	    $_sql="update feedback set state=".$switch." where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function getAllFeedbackTotal(){
	    $_sql="select * from feedback";
	    return parent::getTotal($_sql);
	}
	public function addFeedback(){
	    $_sql="insert into feedback(
	           provider,
	           contact,
	           reportWord,
	           state,
	           reportTime
	        )values(
	           '".$this->username."',
	               '".$this->contact."',
	                   '".$this->reportWord."',
	                       0,
	                       now()
	        )";
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function __get($_key){
		return $this->$_key;
	}	
}
?>