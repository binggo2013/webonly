<?php
class subnavAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
		}
		$this->smarty->display("home/subnav.html");
	}
	private function show(){
	    $this->showNav();
		$article=new articleModel();
		$nav=new navModel();
		if($_GET['id']&& !empty($_GET['id'])){
			$nav->id=$_GET['id'];
			$oneNav=$nav->getOneNav();
			$this->smarty->assign("oneNav",$oneNav);
			$allSubNav=$nav->getAllSubNavById();
			//Tools::dump($oneNav);
			$arr=array();
			foreach ($allSubNav as $value){
				//Tools::dump($value);
				$article->nid=$value->id;
				//echo $article->nid."<br>";
				//$arr[$value->name][]=$article->getSubNavArticle();
				$arr[$value->name][]=$article->getArticleByNID();
			}
			//Tools::dump($arr);
			$this->smarty->assign("articles",$arr);
			$this->smarty->assign("allSubNav",$allSubNav);
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