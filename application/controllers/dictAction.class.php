<?php
class dictAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "show":
                $this->show();
                break;
            case "add":
                $this->add();
                break;
            case "deleteAll":
                $this->deleteAll();
                break;
            case "result":
                $this->result();
                break;
            case "result2":
                $this->result2();
                break;
            case "admin":
                $this->admin();
                break;
            case "update":
                $this->update();
                break;
            case "search":
                $this->search();
                break;
            case "report":
                $this->report();
                break;
            case "reportAdmin":
                $this->reportAdmin();
                break;
            case "state":
                $this->state();
                break;
            default:
                echo "action的参数错误";
                break;
        }
    }
    private function deleteAll(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllReportWords()){
                echo "<script>location.href='?a=dict&action=reportAdmin';</script>";
                //Tools::Redirect("删除成功", "?a=dict&action=reportAdmin",1,1);
            }else{
                echo "<script>location.href='?a=dict&action=reportAdmin';</script>";
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
                echo "<script>location.href='?a=dict&action=reportAdmin';</script>";
            }else{
                echo "<script>location.href='?a=dict&action=reportAdmin';</script>";
            }
        }
    }
    private function reportAdmin(){
        parent::page($this->model->getAllReportWordsTotal(),5);
        $AllReportWords=$this->model->getAllReportWords();
        foreach ($AllReportWords as $value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[未处理]</span>
							<a href='?a=dict&action=state&flag=show&id=".$value->id."'>处理</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[已处理]</span>
							<a href='?a=dict&action=state&flag=hide&id=".$value->id."'>未处理</a>	";
            }
        }
        $this->smarty->assign('AllReportWords',$AllReportWords);
        //Tools::dump($this->model->getAllReportWords());
        $this->smarty->assign("reportAdmin",true);
        $this->smarty->display("admin/dict.html");
    }
    private function report(){
        if($_POST['send']=='report'){
            $this->model->username=$_POST['username'];
            $this->model->contact=$_POST['contact'];
            $this->model->reportWord=$_POST['reportWord'];
            if($this->model->reportWord()){
                echo "ok";
            }else{
                echo "failed";
            }
        }
        //Tools::dump($_POST);
    }
    private function search(){
        if($_POST['send']){
            $this->model->wordname=$_POST['keyword'];
            $keyword=$this->model->getOneEntryByName();
            if($keyword){
                $this->smarty->assign("search",true);
                $this->smarty->assign("keyword",$keyword);
            }else{
                Tools::Redirect("单词不存在", "?a=dict&action=admin",2,1);
            }
            //Tools::dump($oneEntry);
        }else{
            Tools::dump($_POST);
        }
        $this->smarty->display("admin/dict.html");
    }
    private function update(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneEntry=$this->model->getOneEntry();
            //Tools::dump($oneEntry);
            $this->smarty->assign("oneEntry",$oneEntry);
        }
        if($_POST['send']){
            $this->model->wordname=$_POST['wordname'];
            $this->model->phonetic=$_POST['phonetic'];
            $this->model->pic=$_POST['pic'];
            $this->model->paraphrase=$_POST['paraphrase'];
            $this->model->example=$_POST['example'];
            $this->model->catalogue=$_POST['catalogue'];
            $this->model->provider=$_POST['provider'];
            $this->model->id=$_POST["id"];
            if($this->model->updateEntry()){
                Tools::Redirect("修改成功","?a=dict&action=admin",1,1);
            }else{
                Tools::Redirect("修改失败","?a=dict&action=admin",2,1);
            }
            //Tools::dump($_POST);
        }
        $this->smarty->assign("update",true);
        $this->smarty->display("admin/dict.html");
    }
    private function result(){
        $json=null;
        $this->model->wordname=trim($_POST['keyword']);
        $json.=json_encode($this->model->getSearchResult());
        //while($data=$this->model->getSearchResult()){	
        	   //$json.=json_encode($data).",";	
        //}
        echo rtrim($json,",");
        //Tools::dump($this->model->getSearchResult());
    }
    private function result2(){
        $json=null;
        $this->model->wordname=trim($_POST['keyword']);
        echo json_encode($this->model->getSearchResult2());
        //$json.=json_encode($this->model->getSearchResult2());
        //while($data=$this->model->getSearchResult()){
        //$json.=json_encode($data).",";
        //}
        //echo rtrim($json,",");
        //Tools::dump($this->model->getSearchResult());
    }
    private function getOneResult(){
        $this->model->wordname=trim($_POST['keyword']);
        echo json_encode($this->model->getOneSearch());
    }
    private function admin(){
        parent::page($this->model->getAllEntryTotal(),5);
        $this->smarty->assign('AllEntry',$this->model->getAllEntry());
        $this->smarty->assign("admin",true);
        $this->smarty->display("admin/dict.html");
    }
    private function reportWords(){
        parent::page($this->model->getAllReportWordsTotal(),5);
        $this->smarty->assign('AllReportWords',$this->model->getAllReportWords());
        $this->smarty->assign("report",true);
        $this->smarty->display("admin/dict.html");
    }
    private function show(){
        $this->smarty->display("home/dict.html");
        
    }
    private function add(){
        if($_POST['send']){
            $this->model->wordname=$_POST['wordname'];
            $oneEntry=$this->model->getOneEntryByName();
            if($oneEntry){
                Tools::Redirect("单词已经存在", "?a=dict&action=admin",2,1);
            }else{
                $this->model->phonetic=$_POST['phonetic'];
                $this->model->pic=$_POST['pic'];
                $this->model->paraphrase=$_POST['paraphrase'];
                $this->model->example=$_POST['example'];
                $this->model->catalogue=$_POST['catalogue'];
                $this->model->provider=$_POST['provider'];
                //Tools::dump($this->model);
                if($this->model->addEntry()){
                    Tools::Redirect("单词添加成功", "?a=dict&action=add",1,1);
                }else{
                    Tools::Redirect("单词添加失败", "?a=dict&action=admin",2,1);
                }
            }
        }
        $this->smarty->assign("add",true);
        $this->smarty->display("admin/dict.html");
    }
}
?>