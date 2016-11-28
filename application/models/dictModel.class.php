<?php
class dictModel extends Model{
	private $id;
	private $limit;
	private $wordname;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function getAllReportWords(){
	    $_sql="select * from reportWords order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function deleteAllReportWords(){
	    $_sql="delete from reportWords where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function setState($_flag){
	    $switch=null;
	    if($_flag=='hide'){
	        $switch=0;
	    }elseif($_flag=='show'){
	        $switch=1;
	    }
	    $_sql="update reportWords set state=".$switch." where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function getAllEntryTotal2(){
	    $_sql="select * from dict";
	    return parent::getTotal($_sql);
	}
	public function getAllReportWordsTotal2(){
	    $_sql="select * from reportWords where state=0";
	    return parent::getTotal($_sql);
	}
	public function getAllReportWordsTotal(){
	    $_sql="select * from reportWords";
	    return parent::getTotal($_sql);
	}
	public function reportWord(){
	    $_sql="insert into reportWords(
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
	public function getOneEntryByName(){
	    $_sql="select * from dict where wordname='".$this->wordname."'";
	    return parent::getOne($_sql);
	}
    public function getSearchResult(){
        $_sql="select * from dict where wordname like '%".$this->wordname."%' limit 10";
        //echo $_sql;
        return parent::getAllResult($_sql);
    }
    public function getSearchResult2(){
        $_sql="select * from dict where wordname='".$this->wordname."' limit 1";
        //echo $_sql;
        return parent::getAllResult($_sql);
    }
    public function getAllEntryTotal(){
        $_sql="select * from dict";
        return parent::getTotal($_sql);
    }
    public function getAllEntry(){
        $_sql="select * from dict order by id desc ".$this->limit;
        //echo $_sql;
        return parent::getAllResult($_sql);
    }
    public function updateEntry(){
        $_sql="
            update   dict
            set      wordname='".$this->wordname."',
                     phonetic='".$this->phonetic."',
                     pic='".$this->pic."',
                     paraphrase='".$this->paraphrase."',
                     example='".$this->example."',
                     catalogue='".$this->catalogue."',
                     provider='".$this->provider."'
           where     id=".$this->id;
        return parent::cud($_sql);
    }
    public function getOneEntry(){
        $_sql="select * from dict where id=".$this->id;
        return parent::getOne($_sql);
    }
    public function addEntry(){
        $_sql="insert into dict(
								wordname,
								phonetic,
								pic,
								paraphrase,
								example,
								catalogue,
                                provider,
                                 vid,
								date
					)values(
							'".$this->wordname."',
							'".$this->phonetic."',
							'".$this->pic."',
							'".$this->paraphrase."',
							'".$this->example."',
							'".$this->catalogue."',
							'".$this->provider."',
							1,
							now()
					)";
        //echo $_sql;
        return parent::cud($_sql);
    }
    public function getOneSearch(){
        $_sql="select * from dict where wordname='".$this->wordname."' limit 10";
        //echo $_sql;
        return parent::getOne($_sql);
    }
}
?>