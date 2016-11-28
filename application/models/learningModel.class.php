<?php
class learningModel extends Model{
	private $id;
	private $limit;
	private $question;
	private $a;
	private $b;
	private $c;
	private $d;
	private $operater;
	private $tips;
	private $course_id;
	private $kind;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}	
	public function getSearchChoice(){
	    $_sql="select * from veling_exam_choice where course_id=".$this->course_id." and question like '%".$this->question."%'";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getSearchJudge(){
	    $_sql="select * from veling_exam_judge where course_id=".$this->course_id." and question like '%".$this->question."%'";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function deleteAllChoice(){
	    $_sql="delete from veling_exam_choice where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}	
	public function deleteOneExam(){
	    $_sql="delete from examination where id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function deleteAllJudge(){
	    $_sql="delete from veling_exam_judge where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function deleteAllExam(){
	    $_sql="delete from examination where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function addJudge(){
	    $_sql = "insert into veling_exam_judge(
                                    	        question,
                                    	        answer,
	                                            course_id,
	                                            tips,
                                    	        addtime
                            	        ) values(
                                    	        '" . $this->question."',
                                    	        '" .  $this->answer."',
                                    	        '" . $this->course_id."',
                                    	        '" . $this->tips."',
                                    	        now()
                            	            )";
	    //echo $sql;
	    return parent::cud($_sql);
	}
	public function addChoice(){
	    $_sql = "insert into veling_exam_choice(
                                    	        question,
	                                            pic,
                                    	        a,
                                    	        b,
                                    	        c,
                                    	        d,
                                    	        answer,
                                    	        operater,
	                                            course_id,
	                                            tips,
                                    	        addtime
                            	        ) values(
                                    	        '" . $this->question . "',
                                    	        '',
                                    	        '" . $this->a . "',
                                    	        '" .  $this->b. "',
                                    	        '" .  $this->c . "',
                                    	        '" .  $this->d . "',
                                    	        '" .  $this->answer . "',
                                    	        '" . $this->operater . "',
                                    	        '" . $this->course_id . "',
                                    	        '" . $this->tips . "',
                                    	        now()
                            	            )";
	    //echo $sql;
	    return parent::cud($_sql);
	}
	public function deleteOneChoice(){
	    $_sql="delete from veling_exam_choice where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function deleteOneJudge(){
	    $_sql="delete from veling_exam_judge where id=".$this->id;
	    return parent::cud($_sql);
	}
    public function getAllChoices(){
		$_sql="select * from veling_exam_choice where course_id in(".$this->kind.") order by id desc ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getAllExams(){
	    $_sql="select * from examination where cid in(".$this->kind.") order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllExamsTotal(){
	    $_sql="select * from examination where cid in(".$this->kind.")";
	    //echo $_sql;
	    return parent::getTotal($_sql);
	}
	public function getAllJudges(){
	    $_sql="select * from veling_exam_judge where course_id in(".$this->kind.") order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllChoicesTotal(){
		$_sql="select * from veling_exam_choice where course_id in(".$this->kind.")";
		return parent::getTotal($_sql);
	}
	public function getAllJudgesTotal(){
	    $_sql="select * from veling_exam_judge where course_id in(".$this->kind.")";
	    return parent::getTotal($_sql);
	}
	public function getOneChoice(){
	    $_sql="select * from veling_exam_choice where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function getOneJudge(){
	    $_sql="select * from veling_exam_judge where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function updateChoice(){
	    $_sql="update veling_exam_choice
	           set question='".$this->question."',
                   a='".$this->a."',
                   b='".$this->b."',
                   c='".$this->c."',
                   d='".$this->d."',
                   operater='".$this->operater."',
                   tips='".$this->tips."',
                   course_id='".$this->course_id."',
                   answer='".$this->answer."'
               where id=".$this->id;
        return parent::cud($_sql);
	}
	public function updateJudge(){
	    $_sql="update veling_exam_judge
	           set question='".$this->question."',
                   tips='".$this->tips."',
                   course_id='".$this->course_id."',
                   answer='".$this->answer."'
               where id=".$this->id;
	    return parent::cud($_sql);
	}
}
?>