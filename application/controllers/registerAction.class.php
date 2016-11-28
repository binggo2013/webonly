<?php
class registerAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){			
			case "show":
				$this->show();
				break;						
		}
	}
    //////
    public function show(){        
        $this->smarty->display("home/register.html");
    }    
}
?>