<?php
/**
 * 前台注册会员控制器
 * @author kong
 *  */
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
                $transfer=new Transfer(array("fieldName"=>"reg_icon",'path'=>'public/uploads/user'));
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
    public function space($data=array()){
        /* $user=new userModel();
        $upload=new UploadFile("pic","public/uploads/member");
        if(isset($_POST['send'])){
            $user->id=$_POST['id'];
            $user->email=$_POST['email'];
            if($_POST['pwd']==$_POST['newpwd']){
                $user->pwd=$_POST['newpwd'];
            }else{
                $user->pwd=md5($_POST['newpwd']);
            }
            if(is_uploaded_file($_FILES['pic']['tmp_name'])){
                if($upload->upload("pic")){
                    $user->icon=$upload->getNewName();
                }
            }else {
                $user->icon=$_POST['newpic'];
                //echo "没有上传".$_POST['newpic'];
            }
            //Tools::dump($_POST);
            if($user->updateUser()){
                //echo "ok";
                Tools::Redirect("会员资料修改成功",$_SERVER['HTTP_REFERER']);
            }else if($user->updateUser()==0){
                Tools::Redirect("会员资料没有修改",$_SERVER['HTTP_REFERER']);
                //echo "not changed";
            }else{
                Tools::Redirect("会员资料修改失败",$_SERVER['HTTP_REFERER'],2);
            }
        }
        $comment=new commentModel();
        $article=new articleModel();
        $product=new productModel();
        $ask=new askModel();
        $quiz=new quizModel(); */
        if($data['id']){
            $this->showNav();
            $oneUser=$this->model->getOne("user","where id=".$data['id']);
            $this->assign("oneUser",$oneUser[0]);
            /////////////////////////////////
            /* $comment->uid=$_GET['id'];
            $allComments=$comment->getAllCommentsByUID();
            foreach ($allComments as $key=>$value){
                $article->id=$value->aid;
                $oneArticle=$article->getOneArticle();
                $value->title=$oneArticle->title;
            }
            $product->uid=$_GET['id'];
            $allOrders=$product->getAllOrdersByUID();
            foreach ($allOrders as $value){
                $pids=explode(",", $value->pid);
                $str=null;
                foreach ($pids as $v){
                    $product->id=$v;
                    //Tools::dump($v);
                    $oneProduct=$product->getOneProduct();
                    //Tools::dump($oneProduct);
                    $str.=$oneProduct->name.",";
                }
                $str=rtrim($str,",");
                //Tools::dump($str);
                $value->pid=$str;
                switch ($value->payed){
                    case 0:
                        $value->payed="<span style='color:red;'>[未付]</span>";
                        break;
                    case 1:
                        $value->payed="<span style='color:green;'>[已付]</span>";
                }
                switch ($value->sent){
                    case 0:
                        $value->sent="<span style='color:red;'>[未发货]</span>";
                        break;
                    case 1:
                        $value->sent="<span style='color:green;'>[已发货]</span>";
                }
            }
            $ask->aid=$_GET['id'];
            //$allAsks=$ask->getAllAskByAID();
            //Tools::dump($allAsks);
            //$this->smarty->assign("allAsks",$allAsks);
            $this->smarty->assign("allOrders",$allOrders);
            $this->smarty->assign("allComments",$allComments);*/
            
            $allScores=$this->model->getAll("examination","where uid=".$data['id']." order by id desc limit 0,10");
            $course=new courseModel();
            foreach ($allScores as $key=>$value){
                $oneCourse=$this->model->getOne("course", "where id=".$value->cid);
                $value->cid=$oneCourse[0]->name;
            }
            $this->assign("allScores",$allScores);
        } 
        $this->assign("space",true);
        $this->view("home/user.html");
    }
    private function showNav(){
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        //$this->dump($frontNav);
        $this->assign("frontNav",$frontNav);
    }
    public function addPoint(){
        $array=array(
            'countdown'=>$_POST['point']
        );
        if($this->model->update("user",$array,"where id=".$_POST['id'])){
            echo "ok";
        }elseif($this->model->update("user",$array,"where id=".$_POST['id'])==0){
            echo "same";
        }else{
            echo "failed";
        }
    }
    public function show(){
        $this->page($this->model->getAllTotal("user"));
        $data=$this->model->getAll("user","order by last_time desc",$this->model->limit);
        foreach ($data as $key=>$value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[已禁]</span>
							<a href='/user/state/flag=show/id/".$value->id."'>未禁</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[未禁]</span>
							<a href='/user/state/flag/hide/id/".$value->id."'>已禁</a>	";
            }
        }
        $this->assign('data',$data);
        $this->assign("show",true);
        $this->view("admin/user.html");
    }
    private function delete(){
        if(isset($_GET['id'])){
            $this->model->id=$_GET['id'];
            if($this->model->deleteUser()){
                //header("Location:?a=user&action=show");
                Tools::Redirect("ok",$_SERVER['HTTP_REFERER'],1,1);
            }
        }
    }
}
?>