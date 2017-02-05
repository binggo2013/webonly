<?php
class Factory{
    public static $controller = 'home';//控制器名
    public static $model = 'home';//模型名
    public static $method = 'index';//方法名
    protected static $pams = array();//其他参数
    /**
     * url重写路由的url地址解析方法
     */
    protected static function paseUrl(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if($url[0]==""){
                $url[0]="home";
            }
            //得到控制器
            if(isset($url[0])){
                self::$controller = $url[0];
                unset($url[0]);
            }
            //得到模型
            if(isset($url[0])){
                self::$model = $url[0];
                unset($url[0]);
            }
            //得到方法名
            if(isset($url[1])){
                self::$method = $url[1];
                unset($url[1]);
            }

            //判断是否有其他参数
            if(isset($url)){
                self::$pams = array_values($url);
            }
        }
        //var_dump($url);
    }

    /**
     * 项目的入口方法
     * @throws Exception
     */
    public static function run(){
        self::paseUrl();
        //得到控制器的路径
        $url = 'application/controllers/'.self::$controller.'.class.php';
        //判断控制器文件是否存在
        if(file_exists($url)){
            //$c = new self::$controller;
            $c = new self::$controller;
        }else{
            exit(self::$controller.'控制器文件不存在');
        }
    if(!self::$method){
        self::$method="index";
    }
        //执行方法
    if(method_exists($c,self::$method)){
        $m = self::$method;
        $new_pams = array();
        $num = count(self::$pams);
        //传递参数，判断是否有参数
        if($num > 0){
            //判断传递的参数的数量是否是2的倍数
            if($num % 2 == 0){
                //将参数进行处理
                for($i=0;$i<$num;$i+=2){
                    $new_pams[self::$pams[$i]] = self::$pams[$i+1];
                }
            }else{
                throw new Exception('非法参数!');
            }
        }
        $c->$m($new_pams);
    }else{
        exit(self::$method.'方法不存在');
    }
    }
}
?>