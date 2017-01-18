<?php
class productModel extends Model{
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAllProductsByCID($cid){
	    return parent::getAll("products","where  cid=".$cid." order by id desc limit 3");
	}
	public function deleteAllProduct(){
	    $_sql="delete from products where id in ('".$this->multiId."')";
	    echo $_sql;
	    return parent::cud($_sql);
	}
	public function getHottedProducts(){
	    return parent::getAll("products","where attr like '%recommend%' order by id desc limit 6");
	}
 	
	public function getAllProducts(){
	    $_sql="select * from products order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function getHotProducts(){
	    return parent::getAll("products","where state=1 order by Rand() limit 3");
	}
	public function getAllOrdersByUID(){
	    $_sql="select * from orders where uid=".$this->uid." order by id desc  limit 0,15";
	    return parent::getAllResult($_sql);
	}
	public function getOneProduct(){
	    $_sql="select * from products where id=".$this->id;
	    return parent::getOne($_sql);
	}
	public function updateProduct(){
	    $_sql="update      products
			   set         name='".$this->name."',
			               author='".$this->author."',
				           price='".$this->price."',
				           inventory='".$this->inventory."',
				           pix='".$this->pix."',
				           cid=".$this->cid.",
				           attr='".$this->attr."',
				           description='".$this->description."'
			  where        id=".$this->id;
	    //echo $_sql;
	    return parent::cud($_sql);
	}
	public function placeOrder(){
	    $_sql="INSERT INTO `orders`(
							`orderId`,
							`pid`,
	 						`total`,
							`orderTime`,
	                         uid
					) VALUES (
							'".$this->orderId."',
							'".$this->pid."',
							'".$this->totalNum."',
							now(),
							".$this->uid."
					)";
	    return parent::cud($_sql);
	}
	public function addProduct(){
        $_sql = "insert into products(
							name,
                            author,
							price,
							inventory,
							pix,
                            cid,
                            attr,
                            state,
							description,
							addTime
	                   )values(
                    		'" .$this->name."',
                    		'" .$this->author."',   
                    		'" .$this->price."',
                    		'" .$this->inventory."',
                    		'" .$this->pix."',
                    		" .$this->cid.",
                    		'" .$this->attr."',
                    		    1,
                    		'" .$this->description."',
                    		now()
	               )";
        //echo $_sql;
        return parent::cud($_sql);
    }
	public function deleteProduct(){
		$_sql="delete from products where id=".$this->id;
		return parent::cud($_sql);
	}
	public function setState($_flag){
		$switch=null;
		if($_flag=='hide'){
			$switch=0;
		}elseif($_flag=='show'){
			$switch=1;
		}
		$_sql="update products set state=".$switch." where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getAllProductTotal(){
		$_sql="select * from products";
		//echo $_sql;
		return parent::getTotal($_sql);
	}
}
?>