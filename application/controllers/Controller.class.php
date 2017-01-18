<?php
class Controller{
    protected $smarty=null;
    protected $model=null;
    public function __construct(){
        //实例化smarty，保存在smarty属性中
        $this->smarty=Template::getInstance();
        $this->model=Model::getinstance();
        
        $this->setURL();
    }
    protected function setURL(){
        $PHP_SELF=$_SERVER['PHP_SELF'];
$url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);
        $this->assign('ROOT',$url);
        
    }
    protected function assign($key,$value){
        $this->smarty->assign($key,$value);
    }
    protected function view($template){
        $this->smarty->display($template);
    }
    protected function redirect(){
        
    }
    protected function page($_total){
        $page=new Page($_total);
        $this->model->limit=$page->limit;
        $this->smarty->assign("num",$page->listRowsBegin());
        $this->smarty->assign("page",$page->display());
    }
}
?>