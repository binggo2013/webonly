<?php
class askModel extends Model{
	private $id;
	private $limit;
	private $topic;
	private $questioner;
	private $answerer;
	private $content;
	private $cid;
	private $pid;
	private $date;
	private $kind;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAllAsk(){	    
	    $_sql="select * from ask where pid=0 and cid in (".$this->kind.") order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getOneAsk(){
	    $_sql="select * from ask where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function addRespond(){
	    $_sql="insert into ask(content,answerer,date,pid,cid)values('".$this->content."','mary',now(),".$this->id.",".$this->cid.")";
	    echo $_sql;
	    return parent::cud($_sql);
	}
	public function getAllAsks(){
	    $_sql="select * from ask where pid=0 order by id desc limit 0,3";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllAskTotal(){
	    $_sql="select * from ask";
	    return parent::getTotal($_sql);
	}
	public function getAllAnswersTotal(){
	    $_sql="select * from ask where pid=".$this->id;
	    return parent::getTotal($_sql);
	}
	public function getAllAnswers(){
	    $_sql="select * from ask where pid=".$this->id." order by id desc".$this->limit;
	    return parent::getAllResult($_sql);
	}
}
?>