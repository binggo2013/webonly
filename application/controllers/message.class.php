<?php
class message extends Controller{
    public function msg(){
        $this->model->limit="limit 0,5";
        //$temp[0]=$this->model->getAllUnreadMsg();
        $temp[0]=$this->model->getAll("message","where readStatus=0 and type=3 order by id desc limit 5");
        $temp[1]=$this->model->getAllTotal("message","where readStatus=0 and type=3 order by id desc  limit 0,5");
        echo json_encode($temp);
    }
    public function getOne(){
        $oneMsg=$this->model->getOne("message","where id=".$_POST['id']);
        echo '['.json_encode($oneMsg[0])."]";
        //var_dump($_POST);
    }
}
?>