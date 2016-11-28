<?php
class askModel extends Model{
	private $id;
	private $limit;
	private $topic;
	private $questioner;
	private $aid;
	private $content;
	private $cid;
	private $pid;
	private $date;
	private $kind;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function askLeaderboard(){
	    $_sql="select * from ask where pid=0 order by answerNum desc limit 0,7";
	    return parent::getAllResult($_sql);
	}
	public function deleteAsk(){
	    $_sql="delete from ask where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function updateAnswerNum(){
	    $_sql="update ask set answerNum=answerNum+1 where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function getAllAsk(){	    
	    $_sql="select * from ask where cid in (".$this->kind.") order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllAskTotal(){
	    $_sql="select * from ask where cid in (".$this->kind.")";
	    return parent::getTotal($_sql);
	}
	public function deleteAllAsk(){
	    $_sql="delete from ask where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function getOneAskByCID(){
	    $_sql="select * from ask where pid=0 and cid=".$this->cid." order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getOneAskByCIDTotal(){
	    $_sql="select * from ask where pid=0 and cid=".$this->cid."";
	    //echo $_sql;
	    return parent::getTotal($_sql);
	}
	public function getOneAsk(){
	    $_sql="select * from ask where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function addRespond(){
	    $_sql="insert into ask(content,aid,date,pid,cid)values('".$this->content."','".$this->aid."',now(),".$this->id.",".$this->cid.")";
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function addTopic(){
	    $_sql="insert into ask(topic,aid,date,pid,cid)values('".$this->topic."','".$this->aid."',now(),0,".$this->cid.")";
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function getAllAskByAID(){
	    $_sql="select * from ask where aid=".$this->aid." order by id desc limit 0,15";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllAsks(){
	    $_sql="select * from ask where pid=0 order by id desc limit 0,3";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}	
	public function getAllAnswersTotal(){
	    $_sql="select * from ask where pid=".$this->id;
	    //echo $_sql;
	    return parent::getTotal($_sql);
	}
	public function getAllAnswers(){
	    $_sql="select * from ask where pid=".$this->id." order by id desc".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
}
?>