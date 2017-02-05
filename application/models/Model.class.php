<?php
/**
 * 父类
 * 模型：操作数据库
 * @author OracleOAEC
 *  */
class Model{
    private $db;
    public function __construct(){
        try{
            $this->db=new PDO('mysql:host='.DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        }catch (PDOException $e){
            exit($e->getMessage());
        }
        //echo 'mysql:host='.HOST.";dbname=".DBNAME;
        $this->db->query("set names utf8");
    }
    protected static $_instance;
    //获得类的实例
    public static function getinstance(){
        //判断我们类的实例是否存在，没有则创建之
        if(!isset(self::$_instance)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /**修改时,根据条件获取一条数据  */
    public function getOne($_table,$_where){
        //设置sql语句
        $_sql="select * from ".$_table." ".$_where;
        //echo $_sql;
        //pdo执行sql,返回结果集对象
        $result=$this->db->query($_sql);
        //echo $_sql;
        //fetchObject()：从结果集对象中取得数据，
        //$data=$result->fetchObject();
        $data=$result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    /*添加*/
    public function add($_table,$array){
        $_key=null;//空字符串
        $_value=null;//空字符串
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
        //return $_key.":::".$_value;
        //insert into user()values()
        $sql="insert into ".$_table."(".$_key.")values(".$_value.")";
        //echo $sql;
        $result=$this->db->exec($sql);
        return $result;
        
    }
    /**
     * 获取所有的数据
     * @param string $_table:表名
     * @param string $_where：sql条件
     * @param string $_limit：sql limit
     * @return object:  */
    public function getAll($_table,$_where=null,$_limit=null){
        $_sql="select * from ".$_table." ".$_where." ".$_limit;
        //echo $_sql;
        $result=$this->db->query($_sql);
        $data=$result->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
    /**
     * 从数据库获取总记录数
     * @param string $_table:表名
     * @return int  $total:总记录数
     *   */
    public function getAllTotal($_table,$where=null){
        $_sql="select * from ".$_table." ".$where;          //类型分类：$where将type=1，2,3,4传入，为null平时不影响
        //echo $_sql;
        $result=$this->db->query($_sql);
        $total=$result->rowCount();
        return $total;
    }
    /**
     * 根据条件删除
     * @param string $_table
     * @param string $_where  */
    public function delete($_table,$_where){
        $_sql="delete from ".$_table." ".$_where;
        //echo $_sql;
        $result=$this->db->exec($_sql);
        return $result;
    }
    /*修改*/
    //update user set username='tom',age=12 where ;
    public function update($_table,$array,$_where){
        $_sql="update ".$_table." set ";
        foreach ($array as $key=>$value){
            if(is_int($value)){
                $_sql.=$key."=".$value.",";
            }else{
                $_sql.=$key."='".$value."',";
            }
        }
        $_sql=rtrim($_sql,",");
        $_sql.=" ".$_where;
        //echo $_sql;
        $result=$this->db->exec($_sql);
        return $result;
    }
    /*获得新增导航栏数据的id*/
    public function nextID($_table){
        $sql="show table status like '".$_table."'";
        $result=$this->db->query($sql);
        $data=$result->fetchObject();
        return $data->Auto_increment;
    }
    /*排序*/
    /*封装了exec方法，返回int类型0/1，sql语句可以是多条，*/
    /*"update nav set a='tom' where id=2 ;update nav set a='peter' where id=2;update nav set a='mary' where id=2"*/
    public function exec($sql){
        $result=$this->db->exec($sql);
        return $result;
    }

    
    
    
}
?>