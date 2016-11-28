<?php
class askAction extends Action{    
    public function __construct(){
        parent::__construct();
    }
    public function main(){
		switch ($_GET['action']){
		    case "show":
		        $this->show();
		        break;
		    case "showAnswer":
		        $this->showAnswer();
		        break;
		    case "detail":
		        $this->detail();
		        break;
		   case "deleteAll":
		         $this->deleteAll();
		         break;
		   case "delete":
		       $this->delete();
		       break;
		}		
		$this->smarty->display("admin/ask.html");
    }  
    private function delete(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            if($this->model->deleteAsk()){
                Tools::Redirect("删除问答成功","?a=ask&action=show");
            }else{
                Tools::Redirect("删除问答失败",$_SERVER['HTTP_REFERER']);
            }
        }
    }
    public function AllAsk(){ 
        if(Tools::isSession("oneUser")){
            Tools::Redirect("只有注册会员才可以问答","?",2,1);
        }
        $course=new courseModel();         
        if($_GET['id']){
            $course->id=$_GET['id'];
            $oneCourse=$course->getOneCourse();
            $this->model->cid=$oneCourse->id;
            parent::page($this->model->getOneAskByCIDTotal());
            $sub=$this->model->getOneAskByCID();
            foreach ($sub as $value){
                $this->model->id=$value->id;
                //Tools::dump($this->model->getAllAnswersTotal());
                $value->AnswerNum=$this->model->getAllAnswersTotal();
            }
            $this->smarty->assign("sub",$sub);
        }else{
            $this->model->cid=$course->getFirstCourse()->id;
            parent::page($this->model->getOneAskByCIDTotal());
            $sub=$this->model->getOneAskByCID();
            foreach ($sub as $value){
                $this->model->id=$value->id;
                //Tools::dump($this->model->getAllAnswersTotal());
                $value->AnswerNum=$this->model->getAllAnswersTotal();
            }
            $this->smarty->assign("sub",$sub);
        }
        $this->smarty->assign("AllCourse",$course->getAllCourse());
        $this->smarty->assign("AllAsk",true);
        $this->smarty->display("home/ask.html");
    }   
    public function respond(){
        if(Tools::isSession("oneUser")){
            Tools::Redirect("只有注册会员才可以回复","?",2,1);
        }
        //Tools::dump($_SESSION);
        if($_GET['id']){            
                       
        }
        $askLeaderboard=$this->model->askLeaderboard();
        $this->smarty->assign("askLeaderboard",$askLeaderboard);
        $this->smarty->assign("id",$_GET['id']);
        $this->model->id=$_GET['id'];
        $oneTopic=$this->model->getOneAsk();
        $this->smarty->assign("oneTopic",$oneTopic);
        $this->smarty->assign("pid",$_GET['pid']);
        $this->smarty->assign("cid",$_GET['cid']);
        $this->smarty->assign("respond",true);
        $this->smarty->display("home/ask.html");
    }
    public function addTopic(){
        if(Tools::isSession("oneUser")){
            Tools::Redirect("只有注册会员才可以提问","?",2,1);
        }        
        if(isset($_POST['send'])){
            $this->model->aid=$_SESSION['oneUser']->id;            
            $this->model->cid=$_POST['cid'];
            $this->model->topic=$_POST['respond'];
            //Tools::dump($_POST);
            if($this->model->addTopic()){
                Tools::Redirect("添加提问成功","?");
            }else{
                Tools::Redirect("添加提问成功",$_SERVER['HTTP_REFERER']);
            }
        }	
		$askLeaderboard=$this->model->askLeaderboard();	
		$this->smarty->assign("askLeaderboard",$askLeaderboard);
        $this->course();
        $this->smarty->assign("addTopic",true);
        $this->smarty->display("home/ask.html");
    }
    public function handleResponse(){
        if(isset($_POST['send'])){
            //Tools::dump($_POST);
            //exit();
            $this->model->id=$_POST['id'];
            $this->model->cid=$_POST['cid'];
            $this->model->content=$_POST['respond'];
            $this->model->aid=$_SESSION['oneUserName']->id;
            if($this->model->addRespond()){
                $this->model->updateAnswerNum();
                 Tools::Redirect("回复成功","?a=ask&action=detail&id=".$_POST['id']); 
                 //header("location:?".$_SERVER['HTTP_REFERER']);
            }else{
                exit("回复失败！");
            }
        }
        $this->smarty->display("home/ask.html");
    }
    private function detail(){ 
        if(Tools::isSession("oneUser")){
            Tools::Redirect("只有注册会员才可以回复","?",2,1);
        }        
        if($_GET['id']){
            $user=new userModel();            
            $this->model->id=$_GET["id"];
            $oneAsk=$this->model->getOneAsk();
            //Tools::dump($oneAsk);
            //Tools::dump($this->model->getAllAnswersTotal());
            parent::page($this->model->getAllAnswersTotal());
            //$AllAnswers=$this->model->getAllAnswers();
            $data=$this->model->getAllAnswers();
            //Tools::dump($data);
            foreach ($data as $key=>$value){
                $user->id=$value->aid;                
                $oneUser=$user->getOneUserByID();
                //Tools::dump($oneUser);
                $value->username=$oneUser->username;
                $value->icon=$oneUser->icon;
            }
           /*  $data=array();
            foreach ($AllAnswers as $key=>$value){
                $this->model->id=$value->id;                
                $SubAllAnswers=$this->model->getAllAnswers();
                //Tools::dump($this->model->getAllAnswers());
                $data[$value->content]=$SubAllAnswers;                               
            } */
            //Tools::dump($oneAsk);   
            $askLeaderboard=$this->model->askLeaderboard();
            $this->smarty->assign("askLeaderboard",$askLeaderboard);
            $this->smarty->assign("data",$data);   
            //Tools::dump($data);
            $this->smarty->assign("oneAsk",$oneAsk);            
        }
        $this->smarty->display("home/ask.html");
    }
    /*$course=new courseModel();
        $ask=new askModel();
        $AllAsk=$ask->getAllAsks();
        //Tools::dump($AllAsk);
        foreach ($AllAsk as $key=>$value){
            $course->id=$value->cid;
            $oneCourse=$course->getOneCourse();
            $value->courseName=$oneCourse->name;
            $ask->id=$value->id;
            $value->answerNum=$ask->getAllAnswersTotal();
        }
        $this->smarty->assign("AllAsk",$AllAsk);  */
    private function showAnswer(){
        if($_GET['id']){            
            $this->model->id=$_GET['id'];
            parent::page($this->model->getAllAnswersTotal());
            $AllAnswers=$this->model->getAllAnswers();
            $this->smarty->assign("AllAnswers",$AllAnswers);
            $this->smarty->assign("back",$_SERVER['HTTP_REFERER']);
        }
        $this->smarty->assign("showAnswer",true);
    }
    private function course($num=0){
        $str=null;
        $course=new courseModel();
        foreach ($course->getAllCourse() as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->smarty->assign("course",$str);
    }
    private function deleteAll(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllAsk()){
                Tools::Redirect("删除成功", "?a=ask&action=show",1,1);
            }else{
                Tools::Redirect("删除失败", "?a=ask&action=show",2,1);
            }
        }
    }
    private function show(){        
        $course=new courseModel();
        $AllCourse=$course->getAllCourse();
        $courseStr=null;
        foreach ($AllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $this->model->kind=$courseStr;
        }else{
            $this->model->kind=$_GET['kind'];
        }
        parent::page($this->model->getAllAskTotal());
        $AllAsk=$this->model->getAllAsk();
        foreach ($AllAsk as $key=>$value){
            $course->id=$value->cid;
            $oneCourse=$course->getOneCourse();
            $value->courseName=$oneCourse->name;
            $this->model->id=$value->id;
            $value->answerNum=$this->model->getAllAnswersTotal();
        }
        $this->course($_GET['kind']);
        //Tools::dump($AllAsk);
        $this->smarty->assign("AllAsk",$AllAsk);
        $this->smarty->assign("show",true);
    }
}
?>