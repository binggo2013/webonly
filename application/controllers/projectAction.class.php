<?php
class projectAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "show":
                $this->show();
                break;
            default:
                echo "action的参数错误";
                break;
        }
    }
    private function show(){
        $this->smarty->display("home/project.html");
    }
    public function img(){
        $captcha=new Captcha(100,28);
        $_SESSION['captcha']['code']=$captcha->getCaptcha();
        //var_dump($captcha);
        //echo $captcha->getMsg();
        //输出验证码图片
        //var_dump($_SESSION);
        $captcha->showCaptcha("public/fonts/ARIALNB.TTF");
    }
    public function checkUsername(){
        $pdo=new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD);
        //把前台传过来的用户名带入到sql语句中
        $sql="select * from user where username='".$_POST['username']."'";
        //echo $sql;
        //执行sql语句
        $result=$pdo->query($sql);
        //获取所有的数据
        $data=$result->fetchAll();
        //var_dump($data);
        if($data){
            echo "taken";
        }else{
            echo "ok";
        }
    }
}
?>