<?php
class projectAction extends Action{
    public function __construct(){
        parent::__construct();
    }
    public function main(){
        switch ($_GET['action']){
            case "show":
                $this->show();
                break;
            default:
                echo "action的参数错误";
                break;
        }
    }
    private function show(){
        $this->smarty->display("home/project.html");
    }
}
?>