<?php
/*文章-模型*/
class articleModel extends Model{
    /*添加文章*/
    public function addArticle($array){
        return parent::add("article",$array);
    }
    /*获取所有数据*/
    public function getAllArticle($limit){
        return parent::getAll("article","order by id desc",$limit);
    }
    /*获取总记录数*/
    public function getAllArticleTotal(){
        return parent::getAllTotal("article");
    }
    /*删除*/
    public function deleteArticle($id){
        return parent::delete("article","where id=".$id);
    }
    /*多项删除*/
    public function deleteAllArticle($ids){
        return parent::delete("article","where id in (".$ids.")");
    }
    /*根据属性显示文章，在homg.html主页上*/
    public function getArticleByAttr($attrs,$limit=null) {
        return parent::getAll("article","where attr in (".$attrs.") and state=1 order by id desc",$limit);
    }
    /*编辑修改时，根据id获取一篇文章*/
    public function getOneArticle($id){
        return parent::getOne("article","where id=".$id);
    }
    /*将修改后的数据，重新上传到数据库*/
    public function updateArticle($array,$id){
        return parent::update("article",$array,"where id=".$id);
    }
    /*更新用户访问量*/
    public function updatePageView($array,$id){
        return parent::update("article",$array,"where id=".$id);
    }
    /*获取最新的5篇文章，action在homeAction中*/
    public function getFiveArticle($limit=5){
        return parent::getAll("article","order by id desc","limit ".$limit);
    }
    /*获取最热的5篇文章，action在homeAction中*/
    public function getFiveHotted($limit=5){
        return parent::getAll("article","order by pageview desc","limit ".$limit);
    }
    /*设置对应id文章的状态*/
    public function setArticleState($array,$id){
        return parent::update("article",$array,"where id=".$id);
    }
}