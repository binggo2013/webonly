<?php
class messageAction extends Action{
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
            case "msg":
                $this->msg();
                break;
            case "getOne":
                $this->getOne();
                break;
            case "update":
                $this->update();
                break;
        }
    }
    private function update(){
        //Tools::dump($_POST);
        if($_POST['send']){
            $this->model->id=$_GET['id'];
            if($_POST['range']==1){
                $uid=0;
            }else{
                $uid=$_POST['uid'];
            }
            $array=array(
                'type'=>$_POST['type'],
                'uid'=>$uid,
                'title'=>$_POST['title'],
                'content'=>$_POST['content']
            );
            $result=$this->model->updateMsg($array);
            if($result){
                Tools::Redirect("修改成功", "?a=message&action=show");
            }else{
                Tools::Redirect("修改成功", $_SERVER['HTTP_REFERER']);
            }
        }
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneMsg=$this->model->getAdminOneMsg();
            //Tools::dump($oneMsg);
            switch ($oneMsg->type){
                case 1:
                    $oneMsg->one="checked='checked'";
                    break;
                case 2:
                   $oneMsg->two="checked='checked'";
                    break;
                case 3:
                    $oneMsg->three="checked='checked'";
                    break;
            }
        }
        $this->smarty->assign("oneMsg",$oneMsg);
        $this->smarty->assign("update",true);
        $this->smarty->display("admin/message.html");
    }
    private function getOne(){
        $this->model->id=$_POST['id'];
        $array=array(
            'readStatus'=>1
        );
        //$this->model->updateMsg($array);
        $oneMsg=$this->model->getOneMsg();
        echo '['.json_encode($oneMsg)."]";
        //var_dump($_POST);
    }
    private function msg(){
        $this->model->limit="limit 0,5";
        $temp[0]=$this->model->getAllUnreadMsg();
        $temp[1]=$this->model->getAllUnreadMsgTotal();
        echo json_encode($temp);
    }
    private function add(){
        if($_POST['send']){
            if($_POST['range']==1){
                $uid=0;
            }else{
                $uid=$_POST['uid'];
            }
            $array=array(
                'type'=>$_POST['type'],
                'uid'=>$uid,
                'content'=>$_POST['content'],
                'readStatus'=>0,
                'state'=>1,
                'title'=>$_POST['title'],
                'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->addMsg($array)){
                Tools::Redirect("添加信息成功","?a=message&action=show");
            }else{
                Tools::Redirect("添加信息失败","?a=message&action=add",2);
            }
        }
        $this->smarty->assign("add",true);
        $this->smarty->display("admin/message.html");
    }
    private function show(){
        parent::page($this->model->getAllMsgTotal());
        $this->model->limit=" limit 0,5";
        $AllMsg=$this->model->getAllMsg();
        //Tools::dump($AllMsg);
        foreach($AllMsg as $key=>$value){
            if($value->uid==0){
                $value->range='整站';
            }else{
                $value->range=$value->uid;
            }
            switch($value->type){
                case 1:
                    $value->type='公告';
                    break;
                case 2:
                    $value->type='通知';
                    break;
                case 3:
                    $value->type="提示";
                    break;
            }
        }
        $this->smarty->assign("AllMsg",$AllMsg);
        $this->smarty->assign("show",true);
        $this->smarty->display("admin/message.html");
    }
}
?>