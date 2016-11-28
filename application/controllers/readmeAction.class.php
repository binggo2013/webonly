<?php
class readmeAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "catalogoue":
				$this->catalogoue();
				break;
			case "func":
				$this->func();
				break;
			case "feature":
				$this->feature();
				break;
		}	
		if(Tools::isSession("username")){
			header("Location:index.php?a=admin&action=admin_login");
		}	
		$this->smarty->display("admin/readme.html");
	}
	private function feature(){
		$this->smarty->assign("feature",true);
	}
	private function func(){
		$this->smarty->assign("func",true);
	}
	private function catalogoue(){
		$this->smarty->assign("catalogoue",true);
	}
}
?>