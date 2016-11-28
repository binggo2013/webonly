<?php
class feedbackAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "feedback":
                $this->feedback();
                break;
            case "admin":
                $this->admin();
                break;
            case "deleteAll":
                $this->deleteAll();
                break;
            case "state":
                $this->state();
                break;
            default:
                echo "action的参数错误:".$_GET['action'];
                break;
        }
        $this->smarty->display("admin/feedback.html");
    }
    private function deleteAll(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllFeedback()){
                echo "<script>location.href='?a=feedback&action=admin';</script>";
                //Tools::Redirect("删除成功", "?a=dict&action=reportAdmin",1,1);
            }else{
                echo "<script>location.href='?a=feedback&action=admin';</script>";
                //Tools::Redirect("删除失败", "?a=dict&action=reportAdmin",2,1);
            }
        }
    }
    private function state(){
        //Tools::dump($_GET);
        if(isset($_GET['id'])){
            $this->model->id=$_GET['id'];
            $switch=null;
            if($_GET['flag']=='hide'){
                $switch="hide";
            }elseif($_GET['flag']=='show'){
                $switch="show";
            }
            if($this->model->setState($switch)){
                //echo "<script>location.href='?a=feedback&action=admin';</script>";
                Tools::Redirect($switch,'?a=feedback&action=admin',1,1);
            }else{
                //echo "<script>location.href='?a=feedback&action=admin';</script>";
                Tools::Redirect($switch,'?a=feedback&action=admin',2,1);
            }
        }
    }
    private function admin(){
        parent::page($this->model->getAllFeedbackTotal(),5);
        $AllFeedback=$this->model->getAllFeedback();
        //Tools::dump($AllFeedback);
        foreach ($AllFeedback as $value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[未处理]</span>
							<a href='?a=feedback&action=state&flag=show&id=".$value->id."'>处理</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[已处理]</span>
							<a href='?a=feedback&action=state&flag=hide&id=".$value->id."'>未处理</a>	";
            }
        }
        $this->smarty->assign("AllFeedback",$AllFeedback);
        $this->smarty->assign("admin",true);
        
    }
    private function feedback(){
        if($_POST['send']=='feedback'){
            $this->model->username=$_POST['username'];
            $this->model->contact=$_POST['contact'];
            $this->model->reportWord=$_POST['reportWord'];
            if($this->model->addFeedback()){
                echo "ok";
            }else{
                echo "failed";
            }
        }
        //Tools::dump($_POST);
    }
}
?>