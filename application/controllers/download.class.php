<?php
class download extends Controller{
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
        echo "update download set download_num=download_num+1 where id=".$_POST['info'];
        //echo "ok";
    }
    public function updateDownloadNum($data=array()){
        $this->model->exec("update download set download_num=download_num+1 where where id=".$data['info']);
        header("location:public/uploads/download/".$data['name']);
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
                'title'=>$_POST["title"]
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
}
?>