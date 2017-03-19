<?php
class article extends Controller{
    /*添加文章*/
    public function add(){
        //var_dump($_POST);
        $this->nav();           //调用nav方法
        $transfer=new Transfer(array("fieldName"=>"thumbnail","path"=>"public/uploads/article"));  
        if (isset($_POST['send'])){
            if($_POST['nid']==null){
                $this->redirect("文章栏目不能为空","",0);
                return false;
            }
            if ($transfer->upload()){
                $array=array(                       
                    'title'=>$_POST['title'],
                    'author'=>$_POST['author'],
                    'tag'=>$_POST['tag'],
                    'thumbnail'=>$transfer->getNewFile(),
                    'lead'=>$_POST['lead'],
                    'source'=>$_POST['source'],
                    'content'=>$_POST['content'],
                    'state'=>1,
                    'date'=>date('Y-m-d H:i:s'),
                    "attr"=>implode(",",$_POST['attr']),
                    "nid"=>$_POST['nid']
                );
                if ($this->model->add("article",$array)){
                    $this->redirect("添加成功","/article/show");
                }else{
                    //$this->redirect("添加失败","/article/add",0);
                }
            }else{
                $this->redirect($transfer->getErrorMsg(),"",0);
            }
        }
        $this->assign("add",true);
        $this->view("admin/article.html");
    }
    private function showNav(){
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        //$this->dump($frontNav);
        $this->assign("frontNav",$frontNav);
    }
    public function delete($data=array()){
        if($data['id']){
            $result=$this->model->delete("article","where id=".$data['id']);
            if($result){
                $this->redirect("删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("删除失败","",0);
            }
        }
        $this->assign("show",true);
        $this->view("admin/article.html");
    }
    /*显示文章所在页面方法*/
    public function detail($data=array()){
        if ($data["id"]){
            $this->showNav();
            $oneArticle=$this->model->getOne("article","where id=".$data['id']);
            $nav->id=$oneArticle[0]->nid;
            $subNav=$this->model->getOne("nav","where id=".$nav->id);
            $this->assign("subNav",$subNav[0]);
            $nav->id=$subNav[0]->pid;
            $mainNav=$this->model->getOne("nav","where id=".$oneArticle[0]->nid);
            $this->assign("mainNav",$mainNav[0]);
            $recommend=$this->model->getAll("product","where attr like '%1%' and state=1 order by id desc limit 6");
            $this->assign("recommend",$recommend);
            $this->model->exec("update article set pageview=pageview+1 where id=".$data['id']);
            $this->assign("oneArticle",$oneArticle[0]);
        }
        $this->view("home/detail.html");
    }
    private function nav($nid=0){
        $allMainNav=$this->model->getAll("nav","where pid=0 and state=1");
        $str=null;
        foreach ($allMainNav as $key=>$value){
            $str.="<optgroup label='".$value->name."'>";
            $subNav=$this->model->getAll("nav",'where id='.$value->id);
            foreach ($subNav as $k=>$v){  
                /*编辑修改,运用参数start*/
                if ($nid==$v->id){ 
                    $selected="selected='selected'"; 
                }else{
                    $selected="";
                }
                $str.="<option value='".$v->id." '".$selected.">".$v->name."</option>";
    
            }
            $str.="</optgroup>";
            //var_dump($value);
        }
        //$this->dump($str);
        $this->assign("nav",$str); 
    }
    public function update($data=array()){
        $transfer=new Transfer(array("fieldName"=>"thumbnail",'path'=>'public/uploads/article'));
        if(isset($_POST['send'])){
            if($_POST['nid']==null){
                $this->redirect("栏目不能为空",$_SERVER["HTTP_REFERER"],0);
                return false;
            }
            if ($transfer->upload()){
                $thumbnail=$transfer->getNewFile();
            }else{
                $thumbnail=$_POST['thumbnail2'];
            }
            $array=array(
                'title'=>$_POST['title'],
                'tag'=>$_POST['tag'],
                'thumbnail'=>$thumbnail,
                'lead'=>$_POST['lead'],
                'author'=>$_POST['author'],
                'source'=>$_POST['source'],
                'content'=>$_POST['content'],
                "attr"=>implode(",",$_POST['attr']),
                "nid"=>$_POST['nid']
            );
            if ($this->model->update("article",$array,"where id=".$data['id'])){
                $this->redirect("修改成功","/article/show");
            }else if ($this->model->update("article",$array,"where id=".$data['id'])==0){
                $this->redirect("未有任何变动","/article/show");
            }else{
                $this->redirect("修改失败",$_SERVER["HTTP_REFERER"],0);
            }
        }
        $oneArticle=$this->model->getOne("article", "where id=".$data['id']);
        $this->nav($oneArticle[0]->nid);
        $checkAttr="checked='checked'";
        foreach (explode(",",$oneArticle[0]->attr) as $key=>$value){
            switch ($value){
                case "1":
                    $this->assign("headline",$checkAttr);
                    break;
                case "2":
                    $this->assign("recommend",$checkAttr);
                    break;
                case "3":
                    $this->assign("topic",$checkAttr);
                    break;
            }
        }
        $this->assign("oneArticle",$oneArticle[0]);
        $this->assign("update",true);
        $this->view("admin/article.html");
    }
    public function show(){
        $this->page($this->model->getAllTotal("article"));
        $data=$this->model->getAll("article","order by id desc",$this->model->limit);
        $this->assign("data",$data);
        $this->assign("show",true);
        $this->view("admin/article.html");
    }
}
?>