<?php
class loader{
    public static function myAutoloader($className){
        //echo $className;
        //控制器类文件目录
        $controller = 'application/controllers/'.$className.'.class.php';
        //模型类文件目录
        $model = 'application/models/'.$className.'.class.php';
        //核心类文件目录
        $kong = 'vendor/kong/'.$className.'.class.php';
        $smarty='vendor/smarty'.$className.'.class.php';
        if(file_exists($controller)){
           require_once $controller;
        }else if(file_exists($model)){
            require_once $model;
        }else if(file_exists($kong)){
            require_once $kong;
        }else{
           exit ($className.'类文件不存在');
        }
     }
}
?>