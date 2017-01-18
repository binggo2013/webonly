<?php
//工厂方法，
//框架的路由,https://www.baidu.com?a=控制器&m=方法名
//getAction(){     //获得地址栏a的值，没有值就付给home访问主页
//setAction(){     //根据地址栏a的值，实例化相应的控制器
//setModel(){      //根据地址栏a的值，实例化相应的模型
class Factory{
    private static $obj=null;
    public static function getAction(){     //获得地址栏a的值，没有值就付给home访问主页
        if(isset($_GET['a'])&&!empty($_GET['a'])){
            return $_GET['a'];
        }
        return 'home';
    }
    /**
     * 根据地址栏传的a的值，返回相应的Action的对象
     *   */
    public static function setAction(){     //根据地址栏a的值，实例化相应的控制器，
        //self::getAction()：自身类的getAction()方法
        $a=self::getAction();
        if(file_exists(ROOT_PATH.'application/controllers/'.$a."Action.class.php")){
            //echo "ok";
            eval('self::$obj=new '.$a.'Action();');
            //var_dump(self::$obj);
            return self::$obj;
        }else{
            exit($a."Action控制器不存在");
        }
    }
    public static function setModel(){      //根据地址栏a的值，实例化相应的模型，
        $a=self::getAction();
        if(file_exists(ROOT_PATH.'application/models/'.$a."Model.class.php")){
            eval('self::$obj=new '.$a.'Model();');
            //var_dump(self::$obj);
            return self::$obj;
        }else{
            exit($a."Model模型不存在");
        }
    }
}
?>