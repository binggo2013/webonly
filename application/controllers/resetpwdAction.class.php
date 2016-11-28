<?php
class resetpwdAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "forget":
                $this->forget();
                break;
            case "reset":
                $this->reset();
                break;
        }
        $this->smarty->display("home/resetpwd.html");
    }
    private function forget(){        
        $this->smarty->assign("forget",true);
    }
    private function reset(){
        $this->smarty->assign("reset",true);
    }
}
?>