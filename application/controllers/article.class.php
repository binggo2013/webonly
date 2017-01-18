<?php
class article extends Controller{
    /*显示文章所在页面方法*/
    public function detail($data=array()){
        if ($data["id"]){
            $oneArticle=$this->model->getOne("article","where id=".$data['id']);
            $nav->id=$oneArticle[0]->nid;
            $subNav=$this->model->getOne("nav","where id=".$nav->id);
            $this->assign("subNav",$subNav[0]);
            $nav->id=$subNav[0]->pid;
            $mainNav=$this->model->getOne("nav","where id=".$oneArticle[0]->nid);
            $this->assign("mainNav",$mainNav[0]);
            $recommend=$this->model->getAll("products","where  cid=".$oneArticle[0]->cid." order by id desc limit 3");
            $this->assign("recommend",$recommend);
            
            
            $this->model->exec("update article set pageview=pageview+1 where id=".$data['id']);
            $this->assign("oneArticle",$oneArticle[0]);
        }
        $this->view("home/detail.html");
    }
}
?>