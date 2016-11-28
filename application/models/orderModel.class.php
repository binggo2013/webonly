<?php
class orderModel extends Model{
	private $id;
	private $limit;
    private $orderId;
    private $productName;
    private $total;
    private $orderTime;
    private $multiId;
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAllOrders(){
	    $_sql="select * from orders order by id desc ".$this->limit;
		return parent::getAllResult($_sql);
	}
	public function deleteAllOrder(){
	    $_sql="delete from orders where id in (".$this->multiId.")";
	    return parent::cud($_sql);
	}
	public function getOneOrder(){
        $_sql="select * from orders where id=".$this->id;
		return parent::getOne($_sql);
	}
    public function setState($_flag){
        $switch=null;
        if($_flag=='hide'){
            $switch=0;
        }elseif($_flag=='show'){
            $switch=1;
        }
        $_sql="update orders set payed=".$switch." where id=".$this->id;
        return parent::cud($_sql);
    }
    public function setSent($_flag){
        $switch=null;
        if($_flag=='hide'){
            $switch=0;
        }elseif($_flag=='show'){
            $switch=1;
        }
        $_sql="update orders set sent=".$switch." where id=".$this->id;
        return parent::cud($_sql);
    }
	public function deleteOrder(){
		$_sql="delete from orders where id=".$this->id;
		return parent::cud($_sql);
	}
	public function getAllOrdersTotal(){
		$_sql="select * from orders";
		//echo $_sql;
		return parent::getTotal($_sql);
	}
}
?>