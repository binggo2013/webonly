<?php
class Template extends Smarty{
    private static $instance;       //$instance=new Template();
    /**
     * 单例模式
     * @return Template*/
    public static function getInstance(){       //getInstance()获取Template这个对象的实例
        //instance如果不是类的实例的话
        //就实例化自身，赋给instance；
        if(!self::$instance instanceof self){
            self::$instance=new self();
        }
        return self::$instance;
    }
    public function __construct(){
        parent::__construct();
        $this->setConfig();
    }
    //重新定义smarty属性，让其直接找到对应静态文件
    //1.smarty访问的静态页面路径
    //2.smarty的编译目录
    private function setConfig(){
        //设置模板目录（静态页面）
        $this->template_dir='application/views';
        //设置编译目录,
        $this->compile_dir='application/runtime';
    }
}
?>