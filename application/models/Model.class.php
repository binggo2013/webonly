<?php
/**
 * 模型的父类   
 *   */
class Model{
	private $db;
	/**
	 * 在构造方法中把pdo对象赋给$db属性；
	 *   */
	public function __construct(){
		try{
			$this->db=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PWD);
		}catch (PDOException $e){
			exit($e->getMessage());
		}
		$this->db->query("set names utf8");	
	}
	/**
	 * 获取所有的数据
	 * @param string $_sql
	 * @return array  */
	protected function getAllResult($_sql){
		$result=$this->db->query($_sql);
		$data=$result->fetchAll(PDO::FETCH_OBJ);
		return $data;
	}
	/**
	 * 获取第一条数据
	 * @param string $_sql
	 * @return array  */
	protected function getFirstResult($_sql){
		$result=$this->db->query($_sql);
		$data=$result->fetchAll(PDO::FETCH_OBJ);
		return $data[0];
	}
	/**
	 * 获取总记录数
	 * @param string $_sql
	 * @return number  */
	protected function getTotal($_sql){
		$result=$this->db->query($_sql);
		//Tools::dump($result);
		$total=$result->rowCount();
		return $total;
	}
	/**
	 * 获取一条数据
	 * @param string $_sql
	 * @return mixed  */	
	protected function getOne($_sql){
		$result=$this->db->query($_sql);
		$data=$result->fetchObject();
		return $data;
	}
	/**
	 * 执行cud
	 * c:insert into
	 * u:update
	 * d:delete
	 * @param string $_sql
	 * @return number  */
	public function cud($_sql){
		$result=$this->db->exec($_sql);
		//echo $_sql;
		return $result;
	}
	/**
	 * 执行多条sql语句
	 * @param string $_sql
	 * @return boolean  */
	protected function multi_query($_sql){
		$result=$this->db->exec($_sql);
		return true;
	}
	/**
	 * 获取表的最新插入数据的ID；
	 * @param string $_tableName  */
	protected function Auto_increment($_tableName){
		//获取表的状态信息;
		$_sql="show table status like '".$_tableName."'";		
		$result=$this->db->query($_sql);
		$data=$result->fetchObject();
		return $data->Auto_increment;
	}
	/**
	 * 根据id选择元素
	 * @param string $_table:表名
	 * @param int $_id
	 * @return mixed
	 * */
	protected function getOneDataById($_table,$_id){
	    $_sql="select * from ".$_table." where id=".$_id;
	    return $this->getOne($_sql);
	}
	protected function deleteOne($_table,$_id){
	    $_sql="delete from ".$_table." where id=".$_id;
	    return $this->cud($_sql);
	}
	protected function updateData($_table,$array,$_id){
	    $_sql="update ".$_table." set ";
	    foreach ($array as $key=>$value){
	        if (is_int($value)){
	            $_sql.=$key."=".$value.",";
	
	        }else{
	            $_sql.=$key."='".$value."',";
	        }
	    }
	    $_sql=rtrim($_sql,",");
	    $_sql.=" where id=".$_id;
	    //echo $_sql;
	    return $this->cud($_sql);
	}
	protected function addData($_table,$array){
	    $_key=null;
	    $_value=null;
	    foreach ($array as $key=>$value){
	        $_key.=$key.",";
	        if(is_int($value)){
	            $_value.="".$value.",";
	        }else{
	            $_value.="'".$value."',";
	        }
	    }
	    $_key=rtrim($_key,",");
	    $_value=rtrim($_value,",");
	    $_sql="insert into ".$_table."(".$_key.")values(".$_value.")";
	    return $this->cud($_sql);
	}
	protected function getAll($_table,$_limit=null,$where=null,$order=null){
	    $_sql="select * from ".$_table." ".$where." order by id desc ".$_limit;
	    //echo $_sql;
	    return $this->getAllResult($_sql);
	}
	protected function getAllDataTotal($_table,$where=null){
	    $_sql="select * from ".$_table." ".$where;
	    return $this->getTotal($_sql);
	}
}
?>