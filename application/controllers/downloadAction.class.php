<?php
class downloadAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case 'show':
                $this->show();
                break;
            case "add":
                $this->add();
                break;
            case "delete":
                $this->delete();
                break;
            case "update":
                $this->update();
                break;
        }
        $this->smarty->display("admin/download.html");
    }
    public function updateDownloadNum(){ 
        if(Tools::isSession("oneUser")){
            $this->smarty->display("home/download.html");
            Tools::Redirect("只有本站注册会员才可以下载","?",2,1);
            return false;
        }        
        $this->model->id=$_GET['id'];
        $this->model->updateDownloadNum(); 
        header("location:public/uploads/download/".$_GET['name']);        
    }    
    public function updateNum(){
        $this->model->url=$_POST['url'];
        $this->model->updateDownloadNum2();
        echo "ok";
    }
    public function all(){        
        //Tools::dump($download->getDownloadNum());
        $this->smarty->assign("downloadLeaderboard",$this->model->getDownloadNum());
        $topic=new topicModel();
        $topic->name=$_GET['name'];
        $oneTopic=$topic->getAllDownloadByTitle();
        $this->smarty->assign("oneTopic",$oneTopic);
        $this->model->tid=$oneTopic->id;
        parent::page($this->model->getAllDownloadByTID2Total());
        $allDownload=$this->model->getAllDownloadByTID2();        
        $this->smarty->assign("allDownload",$allDownload);
        $this->smarty->assign("all",true);
        $this->smarty->assign("back","?a=download&m=AllDownload");
        $this->smarty->display("home/download.html");
    }
    public function AllDownload(){
        $topic=new topicModel();
        $allTopic=$topic->getAlltopic();
        $temp=array();        
        foreach ($allTopic as $key=>$value){
            $this->model->tid=$value->id;            
            $allDownload=$this->model->getAllDownloadByTID();
            $temp[$value->name]=$allDownload;
        }    
        $this->smarty->assign("downloadLeaderboard",$this->model->getDownloadNum());
        //Tools::dump($temp);
        $this->smarty->assign("temp",$temp);
        $this->smarty->assign("show",true);
        $this->smarty->display("home/download.html"); 
    }
    private function delete(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            if($this->model->deleteDownload()){
                Tools::Redirect("删除成功", "?a=download&action=show");
            }else{
                Tools::Redirect("删除失败",$_SERVER['HTTP_REFERER']);
            }
        }
    }
    private function update(){
        if(isset($_POST['send'])){            
            $upload=new UploadFile("newpic","public/uploads/download");
            $upload->setAllowType(array('zip'));
            $this->model->id=$_GET['id'];
            $this->model->title=$_POST['title'];
            $this->model->description=$_POST['description'];
            $this->model->tid=$_POST['tid'];            
            if(is_uploaded_file($_FILES['newpic']['tmp_name'])){
                if($upload->upload("newpic")){
                    $this->model->name=$upload->getNewName();
                }
            }else{
                $this->model->name=$_POST['pic'];
            }
            $this->model->url=$_POST['url'];
            if($this->model->updateDownload()){
                Tools::Redirect("修改成功","?a=download&action=show");
            }else if($this->model->updateDownload()==0){
                Tools::Redirect("没有修改","?a=download&action=show");
            }else{
                Tools::Redirect("修改失败",$_SERVER['HTTP_REFERER'],2);
            }            
        }
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneDownload=$this->model->getOneDownload();
            $this->topic($oneDownload->tid);
            $this->smarty->assign("oneDownload",$oneDownload);
        }
        $this->smarty->assign("update",true);
    }
    private function show(){
        parent::page($this->model->getAllDownloadTotal()); 
        $data=$this->model->getAllDownload();
        $topic=new topicModel();
        foreach ($data as $key=>$value){
            $topic->id=$value->tid;
            $oneTopic=$topic->getOnetopic();
            $value->tid=$oneTopic->name;
        }
        $this->smarty->assign("data",$data);
        $this->smarty->assign("show",true);
    }
    private function add(){
        if(isset($_POST['send'])){            
            if(is_uploaded_file($_FILES['pic']['tmp_name'])){
                $upload=new UploadFile("pic","public/uploads/download");
                $upload->setAllowType(array('zip'));
                if($upload->upload("pic")){
                    $this->model->name=$upload->getNewName();
                }
            }else{
                $this->model->url=$_POST["url"];
            }
            $this->model->description=$_POST["description"];
            $this->model->tid=$_POST["tid"];
            $this->model->title=$_POST["title"];
            if($this->model->addDownload()){
                Tools::Redirect("添加上传内容成功", "?a=download&action=show");
            }else{
                Tools::Redirect("添加上传内容失败", $_SERVER['HTTP_REFERER'],2);
            }
        }
        $this->topic();
        $this->smarty->assign("add",true);
    }
    private function topic($num=0){
        $str=null;
        $topic=new topicModel();
        foreach ($topic->getAlltopic() as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->smarty->assign("topic",$str);
    }
}
?>