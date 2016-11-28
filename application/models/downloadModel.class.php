<?php
class downloadModel extends Model{
	private $limit;
	private $id;
	private $name;
	private $description;
	private $tid;
	private $multiId;
	private $date;
	private $title;
	private $url;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}	
	public function getDownloadNum(){
	    $_sql="select * from download order by download_num desc,date desc limit 6";
	    return parent::getAllResult($_sql);
	}
	public function getLatestDownload(){
	    $_sql="select * from download order by id desc limit 6";
	    return parent::getAllResult($_sql);
	}
	public function updateDownloadNum(){
	    $_sql="update download
	           set    download_num=download_num+1
	           where  id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function updateDownloadNum2(){
	    $_sql="update download
	           set    download_num=download_num+1
	           where  url='".$this->url."'";
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function updateDownload(){
	    $_sql="update    download
	           set       title='".$this->title."',
	                     name='".$this->name."',
	                     description='".$this->description."',
	                     tid=".$this->tid.",
	                     url='".$this->url."'
	          where      id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function getAllDownload(){
	    $_sql="select * from download order by id desc ".$this->limit;	    
	    return parent::getAllResult($_sql);
	}
	public function getAllDownloadByTIDTotal(){
	    $_sql="select * from download where tid=".$this->tid;
	    //echo $_sql;
	    return parent::getTotal($_sql);
	}	
	public function getAllDownloadByTID2Total(){
	    $_sql="select * from download where tid=".$this->tid;
	    //echo $_sql;
	    return parent::getTotal($_sql);
	}
	public function getAllDownloadByTID2(){
	    $_sql="select * from download where tid=".$this->tid." order by id desc ".$this->limit;
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllDownloadByTID(){
	    $_sql="select * from download where tid=".$this->tid." order by id desc limit 5";
	    //echo $_sql;
	    return parent::getAllResult($_sql);
	}
	public function getAllDownloadTotal(){
	    $_sql="select * from download";
	    return parent::getTotal($_sql);
	}
	public function getOneDownload(){
	    $_sql="select * from download where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function deleteDownload(){
	    $_sql="delete from download where id=".$this->id;
	    return parent::cud($_sql);
	}
	public function addDownload(){
	    $_sql="insert into download(
                    	        name,
	                            url,
	                            title,
                    	        description,
                    	        tid,
                    	        date
                	        )values(
                    	        '".$this->name."',
                    	        '".$this->url."',
                    	         '".$this->title."',
                    	        '".$this->description."',
                    	        ".$this->tid.",
                    	        now()
                	        )";
	    return parent::cud($_sql);
	}
}
?>