<?php
class subnavdetailAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
		}
		$this->smarty->display("home/subnavdetail.html");
	}
	private function show(){
	    $this->showNav();
		//Tools::dump($_GET);
		$article=new articleModel();
		$nav=new navModel();
		if($_GET['name']&& !empty($_GET['name'])){
			$nav->name=$_GET['name'];
			$oneNav=$nav->getNavByName();
			$this->smarty->assign("oneNav",$oneNav[0]);
			$article->nid=$oneNav[0]->id;
			$page=new Page($article->getArticleByNIDTotal(),10);
			$article->limit=$page->limit;
			$articles=$article->getArticleByNID();
			//Tools::dump($articles);
			$this->smarty->assign("page",$page->display());
			$this->smarty->assign("articles",$articles);
			$this->smarty->assign("father",$_GET['father']);
			$this->smarty->assign("fid",$_GET['fid']);
		}else{
			header("Location:index.php");
		}
	}
	private function showNav(){
	    $nav=new navModel();
	    $frontNav=$nav->getFrontNav();
	    $this->smarty->assign("frontNav",$frontNav);
	    //Tools::dump($frontNav);
	}
}
?>