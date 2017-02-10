<?php
class admin extends Controller{
    public function index($data=array()){
        //$this->dump($_SESSION);
        /*检测判断是否登录，未登录直接跳转*/
        if ($this->checkLogin("admin")){
            //echo "未登录";
            header("location:/admin/login"); 
        }
        $this->view("admin/index.html");
    }
    public function logout(){
        unset($_SESSION['admin']);
        if ($this->checkLogin("admin")){
            //echo "未登录";
            header("location:/admin/login");
        }
        //$this->dump($_SESSION);
    }
    public function welcome(){
        $this->view("admin/welcome.html");
    }
    public function login(){
        if(isset($_POST['send'])){
            $oneAdmin=$this->model->getOne('administrator',"where username='".$_POST['username']."' and pwd='".md5($_POST['pwd'])."'");
            //$this->dump($oneAdmin[0]);
            if($oneAdmin[0]){
                $_SESSION['admin']=$oneAdmin[0];
                $_SESSION['username']=$_POST['username'];
                //$oneAdmin->updateLogin();
                //var_dump($_SESSION);
                $array=array(
                    'login_num'=>$oneAdmin[0]->login_num+1,
                    'last_ip'=>$_SERVER['REMOTE_ADDR'],
                    'last_time'=>date('Y-m-d H:i:s')
                );
                $this->model->update("administrator", $array,"where id=".$oneAdmin[0]->id);
                $this->redirect("登录成功，页面跳转中...", '/admin/index');
            }else{
                //$this->feedback("用户名或密码错误");
                $this->redirect("用户名或密码错误",'/admin/index',0);
            }   
        }
        $this->view("admin/admin_login.html");
    }
}
?>