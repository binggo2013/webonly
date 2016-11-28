<?php
/**
 *广告模型 
 *   */
class adModel extends Model{
	private $id;
	private $limit;
	private $link;
	private $thumbnail;
	private $description;
	private $type;
	private $state;	
	private $multiId;
	private $kind;
	/**
	 * 在类外操作类的私有属性；
	 * @param mixed $_key
	 * @param mixed $_value  */
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function deleteAllAd(){
		$_sql="delete from ad where id in (".$this->multiId.")";
		return parent::cud($_sql);
	}
	public function deleteAd(){
		$_sql="delete from ad where id=".$this->id;
		return parent::cud($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update ad set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}	
	public function getOneAd(){
		$_sql="select * from ad where id=".$this->id;
		return parent::getOne($_sql);
	}
	/**
	 * 获取所有的广告
	 * @return multitype:  */
	public function getAllAd(){
		$_sql="select * from ad where type in (".$this->kind.")  order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getAllAdTotal(){
		$_sql="select * from ad where type in (".$this->kind.")";		
		return parent::getTotal($_sql);
	}
	public function updateAd(){
		$_sql="update      ad 
			   set         title='".$this->title."',
				           link='".$this->link."',
				           thumbnail='".$this->thumbnail."',
				           description='".$this->description."',
				           type='".$this->type."' 
			  where        id=".$this->id;
		return parent::cud($_sql);
	}
	public function addAd(){
		$_sql="insert into ad(
								title,
								link,
								thumbnail,
								description,
								type,
								state,
								date
					)values(
							'".$this->title."',
							'".$this->link."',
							'".$this->thumbnail."',
							'".$this->description."',
							'".$this->type."',
							1,
							now()
					)";
		return parent::cud($_sql);
	}
	/**
	 * 1：通栏广告
	 * 2：banner
	 * 3：slider
	 * 4：sidebar
	 * @param string $_flag
	 * @return multitype:  */
	public function getFrontAd($_flag){
		if($_flag=='banner'){
			$_sql="select * from ad where type=2 and state=1 order by id desc limit 1";
			return parent::getFirstResult($_sql);
		}elseif($_flag=='fullcolumn'){
			$_sql="select * from ad where type=1 and state=1 order by id desc limit 1";
			return parent::getFirstResult($_sql);			
		}elseif($_flag=='sidebar'){
			$_sql="select * from ad where type=4 and state=1 order by id desc limit 1";
			return parent::getFirstResult($_sql);			
		}elseif($_flag=='slider'){
			$_sql="select * from ad where type=3 and state=1 order by id desc limit ".SLIDER_NUM;
			return parent::getAllResult($_sql);
		}		
	}
}
?>