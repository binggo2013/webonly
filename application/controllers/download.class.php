<?php
class download extends Controller{
    private function showNav(){
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        //$this->dump($frontNav);
        $this->assign("frontNav",$frontNav);
    }
    public function topic(){
        $total=$this->model->getAllTotal("topic");
        $this->page($total);
        $data=$this->model->getAll("topic","order by id desc ",$this->model->limit);
        //$this->dump($data);
        $this->assign("data",$data);
        $this->assign("topic",true);
        $this->view("admin/download.html");
    }
    public function updateNum(){
        $this->model->exec("update download set download_num=download_num+1 where id=".$_POST['info']);
        //echo "update download set download_num=download_num+1 where id=".$_POST['info'];
        echo "ok";
    }
    public function updateDownloadNum($data=array()){
        $this->model->exec("update download set download_num=download_num+1 where where id=".$data['info']);
        //header("location:public/uploads/download/".$data['name']);
    }
    public function delete($data=array()){
        if($data['id']){
            if($this->model->delete("download","where id=".$data['id'])){
                $this->redirect("删除成功", "/download/content");
            }else{
                $this->redirect("删除失败",$_SERVER['HTTP_REFERER']);
            }
        }
        $this->assign("delete",true);
        $this->view("admin/download.html");
    }
    public function update($data=array()){
        if(isset($_POST['send'])){
            $transfer=new Transfer(array("fieldName"=>"newpic",'allowType'=>array('zip'),'path'=>'public/uploads/download'));
            if(is_uploaded_file($_FILES['newpic']['tmp_name'])){
                if($transfer->upload()){
                    $name=$transfer->getNewFile();
                }
            }else{
                $name=$_POST['pic'];
            }
            $url=$_POST['url'];
            $array=array(
                'name'=>$name,
                'url'=>$url,
                'title'=>$_POST['title'],
                'description'=>$_POST['description'],
                'tid'=>$_POST['tid']
            );
            if($this->model->update("download", $array,"where id=".$data['id'])){
                $this->redirect("修改成功","/download/content");
            }else if($this->model->updateDownload()==0){
                $this->redirect("没有修改","/download/content");
            }else{
                $this->redirect("修改失败",$_SERVER['HTTP_REFERER'],2);
            }
        }
        if($data['id']){
            $oneDownload=$this->model->getOne("download","where id=".$data['id']);
            $this->allTopic($oneDownload[0]->tid);
            $this->assign("oneDownload",$oneDownload[0]);
        }
        $this->assign("update",true);
        $this->view("admin/download.html");
    }
    public function content(){
        $total=$this->model->getAllTotal("download");
        //$data=$this->model->getAllDownload();
        $this->page($total);
        $data=$this->model->getAll("download","order by id desc ",$this->model->limit);
        foreach ($data as $key=>$value){
            $oneTopic=$this->model->getOne("topic", "where id=".$value->tid);
            $value->tid=$oneTopic[0]->name;
        }
        $this->smarty->assign("data",$data);
        $this->smarty->assign("content",true);
        $this->view("admin/download.html");
    }
    public function add(){
        if(isset($_POST['send'])){
            if(is_uploaded_file($_FILES['pic']['tmp_name'])){
                $transfer=new Transfer(array("fieldName"=>"pic",'allowType'=>array('zip'),'path'=>'public/uploads/download'));
                if($transfer->upload()){
                    $name=$transfer->getNewFile();
                }
            }else{
                $url=$_POST["url"];
            }
            $array=array(
                'name'=>$name,
                'url'=>$url,
                'description'=>$_POST["description"],
                'tid'=>$_POST["tid"],
                'title'=>$_POST["title"],
                'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->add('download',$array)){
                $this->redirect("添加上传内容成功", "/download/content");
            }else{
                $this->redirect("添加上传内容失败", $_SERVER['HTTP_REFERER'],2);
            }
        }
        $this->allTopic();
        $this->assign("add",true);
        $this->view("admin/download.html");
    }
    private function allTopic($num=0){
        $str=null;
        $allTopic=$this->model->getAll("topic");
        foreach ($allTopic as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->assign("topic",$str);
    }
    public function AllDownload(){
        $this->showNav();
        $allTopic=$this->model->getAll("topic");
        $temp=array();
        foreach ($allTopic as $key=>$value){
            $allDownlad=$this->model->getAll("download","where tid=".$value->id." order by date desc limit 0,10");
            $temp[$value->name]=$allDownlad;
        }
        $this->assign("downloadLeaderboard",$this->model->getAll("download","order by download_num desc limit 0,5"));
        //$this->dump($temp);
        $this->assign("temp",$temp);
        $this->assign("show",true);
        $this->view("home/download.html");
    }
    public function all($data=array()){
        $this->showNav();
        $this->assign("downloadLeaderboard",$this->model->getAll("download","order by download_num desc limit 0,5"));
        $oneTopic=$this->model->getOne("topic","where name='".$data['name']."'");
        $this->assign("oneTopic",$oneTopic[0]);
        $this->page($this->model->getAllTotal("download","where tid=".$oneTopic[0]->id),10);
        $allDownload=$this->model->getAll("download","where tid=".$oneTopic[0]->id." order by id desc ",$this->model->limit);
        $this->assign("allDownload",$allDownload);
        $this->assign("back","/download/AllDownload");
        $this->view("home/download.html");
    }
}
?>