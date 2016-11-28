<?php
class regAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "add":
				$this->add();
				break;
			case "show":
				$this->show();
				break;
			case "showPermission":
				$this->showPermission();
				break;
			case "delete":
				$this->delete();
				break;			
		}
	}
    //////
    public function show(){
        $this->showNav();
        $this->smarty->assign("show",true);
        $this->smarty->display("home/reg.html");
    }
    private function showNav(){
        $nav=new navModel();
        $frontNav=$nav->getFrontNav();
        $this->smarty->assign("frontNav",$frontNav);
    }
}
?>