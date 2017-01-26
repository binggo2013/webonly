<?php
class user extends Controller{
    public function login(){
         if($_POST['action']=="login"){
             //$user->last_ip=$_SERVER['REMOTE_ADDR'];
             //$oneUser=$user->getOneUserByNamePWD();
             $oneUser=$this->model->getOne("user", "where username='".$_POST['username']."' and pwd='".md5($_POST['pwd'])."'");
             //$this->dump($oneUser);
             if($oneUser[0]){
                 $array=array(
                     'login_num'=>$oneUser[0]->login_num+1,
                     'last_ip'=>$_SERVER['REMOTE_ADDR']
                 );
                 $this->model->update("user", $array,"where id=".$oneUser[0]->id);
                 $_SESSION['oneUser']=$oneUser[0];
                 //exit("ok");
                 echo '['.json_encode($oneUser[0]).']';
             }else{
                 exit("failed");
             }
         }
    }
    public function reg(){
        $this->view("home/reg.html");
    }
    public function checkUserName(){
        if($_POST['action']=="reg"){
            $oneUser=$this->model->getOne("user", "user where username='".$_POST['username']."'");
            if($oneUser[0]){
                echo "taken";
            }else{
                echo "available";
            }
        }else if($_POST['action']=="send"){
            $oneUser=$this->model->getOne("user", "user where username='".$_POST['username']."'");
            //$this->model->pwd=md5($_POST['pwd']);
            //$this->model->last_ip=$_SERVER['REMOTE_ADDR'];
            if($_FILES['reg_icon']['name']){
                $transfer=new Transfer(array("fieldName"=>"reg_icon",'path'=>'public/uploads/member'));
                if($transfer->upload()){
                    $icon=$transfer->getNewFile();
                }else{
                    Tools::getBack($transfer->getErrorMsg());
                }
            }else{
                $icon="default.jpg";
            }
            $array=array(
                'username'=>$_POST['username'],
                'pwd'=>md5($_POST['pwd']),
                'login_num'=>1,
                'last_ip'=>$_SERVER['REMOTE_ADDR'],
                'last_time'=>date('Y-m-d H:i:s'),
                'regTime'=>date('Y-m-d H:i:s'),
                'icon'=>$icon,
                'email'=>$_POST['email'],
                'countdown'=>5,
                'state'=>1
            );
            if($oneUser[0]){
                echo "taken";
            }else{
                if($this->model->add("user", $array)){
                    $oneUser=$this->model->getOne("user", "user where username='".$_POST['username']."'");
                    //echo "<script>sessionStorage.setItem('icon','"+$oneUser[0]->icon+"');</script>";
                    echo '['.json_encode($oneUser[0]).']';
                    exit();
                }else{
                    exit("failed");
                }
            }
            
        }
    }
    public function img(){
        $captcha=new Captcha(90,34);
        $captcha->setConfig(array('level'=>5,"isNoise"=>true,'simple'=>false));
        $captcha->showCaptcha('/public/fonts/ARIALNB.TTF');
    }
}
?>