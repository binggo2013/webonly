<?php
class detailAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "detail":
                $this->detail();
                break;
        }
        $this->smarty->display("home/detail.html");
    }
    private function detail(){
        $nav=new navModel();
        $article=new articleModel();
        $product=new productModel();
        if(isset($_GET['id'])&&!empty($_GET['id'])){
            //Tools::dump($_GET);
            $article->id=$_GET['id'];
            $article->updateArticle();
            $oneArticle=$article->getOneArticle();
            $product->cid=$oneArticle->cid;
            //Tools::dump($product->cid);
            //Tools::dump($product->getAllProductsByCID());
            $this->smarty->assign("oneArticle",$oneArticle);
            $nav->id=$oneArticle->nid;
            $subNav=$nav->getOneNav();
            $this->smarty->assign("subNav",$subNav);
            $nav->id=$subNav->pid;
            $mainNav=$nav->getOneNav();
            $this->smarty->assign("mainNav",$mainNav);
            $this->smarty->assign("recommend",$product->getAllProductsByCID());
            //Tools::dump($mainNav);
        }else{
            Tools::Redirect("","home.php");
        }
    }
}
?>