<?php
class articleModel extends Model{
	private $id;
	private $limit;
	private $title;
	private $thumbnail;
	private $lead;
	private $content;
	private $author;
	private $source;
	private $pageview;
	private $nid;
	private $cid;
	private $state;
	private $attr;
	private $tag;
	private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function updateArticle(){
		$_sql="update article set pageview=pageview+1 where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getOneArticle(){
		$_sql="select * from article where id=".$this->id;
		return parent::getOne($_sql);
	}
	public function getArticleNum(){
	    $_sql="select * from article";
	    return parent::getTotal($_sql);
	}
	public function getAttrArticle($_attr){
		switch ($_attr){
			case "headline":
				$_sql="select * from article where state=1 and attr like '%headline%' order by id desc limit 1";
				return parent::getOne($_sql);
				break;
			case "focus":
				$_sql="select * from article where state=1 and attr like '%focus%' order by id desc limit 1";
				return parent::getOne($_sql);
				break;
			case "topic":
				$_sql="select * from article where state=1 and attr like '%topic%' order by id desc limit 1";
				return parent::getOne($_sql);
				break;
			case "recommend":
				$_sql="select * from article where state=1 and attr like '%recommend%' order by id desc limit 1";
				return parent::getOne($_sql);
				break;
			case "pickup":
				$_sql="select * from article where state=1 and attr like '%pickup%' order by id desc limit 1";
				return parent::getOne($_sql);
				break;
		}
	}
	public function getArticleByNID(){
		$_sql="select * from article where nid=".$this->nid." ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getArticleByNIDTotal(){
		$_sql="select * from article where nid=".$this->nid." ";
		return parent::getTotal($_sql);
	}
	public function deleteArticle(){
		$_sql="delete from article where id=".$this->id;
		return parent::cud($_sql);
	}
	public function deleteAllArticle(){
		$_sql="delete from article where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function getSubNavArticle(){
		$_sql="select * from article,nav where article.nid=nav.id  order by article.id desc limit 3";
		echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function getAllArticle(){
		$_sql="select * from article where nid in (".$this->nid.") order by id desc ".$this->limit;
		//echo $_sql;
		return parent::getAllResult($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update article set state=".$switch." where id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function getAllArticleTotal(){
		$_sql="select * from article where nid in (".$this->nid.")";
		return parent::getTotal($_sql);
	}
	public function updateOneArticle(){
		$_sql="update  article
			   set     title='".$this->title."',
				       lead='".$this->lead."',
				       content='".$this->content."',
				       author='".$this->author."',
				       tag='".$this->tag."',
				       thumbnail='".$this->thumbnail."',
				       nid=".$this->nid.",
				       source='".$this->source."',
				       attr='".$this->attr."'
			  where    id=".$this->id;
		//echo $_sql;
		return parent::cud($_sql);
	}
	public function addArticle(){
		$_sql="insert into article(
									title,
									lead,
									content,
									author,
									tag,
									thumbnail,
									nid,
		                            cid,
									source,
									pageview,
									state,
									attr,
									date
				)values(
						'".$this->title."',
						'".$this->lead."',
						'".$this->content."',
						'".$this->author."',
						'".$this->tag."',
						'".$this->thumbnail."',
						'".$this->nid."',
						'".$this->cid."',
						'".$this->source."',
						".$this->pageview.",
						1,
						'".$this->attr."',
						now()
				)";
		//echo $_sql;
		return parent::cud($_sql);
	}
}
?>