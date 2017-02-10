<?php
class message extends Controller{
    public function msg(){
        $temp[0]=$this->model->getAll("message","where readStatus=0 and type=3 and state=1 order by id desc",$this->model->limit);
        $temp[1]=$this->model->getAllTotal("message","where readStatus=0 and type=3 and state=1 order by id desc",$this->model->limit);
        echo json_encode($temp);
    }
    public function getOne(){
        $oneMsg=$this->model->getOne("message","where id=".$_POST['id']);
        echo '['.json_encode($oneMsg[0])."]";
        //var_dump($_POST);
    }
    public function delete($data=array()){
        if($data['id']){
            $result=$this->model->delete("message", "where id=".$data['id']);
            if($result){
                $this->redirect("删除成功", $_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("删除成功", $_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("show",true);
        $this->view("admin/message.html");
    }
    public function add(){
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
            if($this->model->add("message",$array)){
                $this->redirect("添加信息成功","/message/show");
            }else{
                $this->redirect("添加信息失败","/message/add",2);
            }
        }
        $this->assign("add",true);
        $this->view("admin/message.html");
    }
    public function update($data=array()){
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
        if($data['id']){
            $oneMsg=$this->model->getOne("message","where id=".$data['id']);
            $check="checked='checked'";
            switch ($oneMsg[0]->type){
                case 1:
                    $this->assign('one',$check);
                    break;
                case 2:
                    $this->assign('two',$check);;
                    break;
                case 3:
                    $this->assign('three',$check);;
                    break;
            }
            $this->assign("all",$check);
            $this->assign("oneMsg",$oneMsg[0]);
        }
        $this->assign("update",true);
        $this->view("admin/message.html");
    }
    public function state($data=array()){
        $this->setState($data,"message", "admin/message.html");
    }
    public function show(){
        $this->page($this->model->getAllTotal("message"));
        $AllMsg=$this->model->getAll("message","order by id desc",$this->model->limit);
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
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[否]</span>
							<a href='/message/state/flag/show/id/".$value->id."'>显示</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[是]</span>
							<a href='/message/state/flag/hide/id/".$value->id."'>隐藏</a>	";
            }
        }
        $this->assign("AllMsg",$AllMsg);
        $this->assign("show",true);
        $this->view("admin/message.html");
    }
}
?>