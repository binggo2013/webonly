<?php
class administrator extends Controller{
    public function delete($data=array()){
        if($data['id']){
            if($this->model->delete("administrator","where id=".$data['id'])){
                $this->redirect("删除管理员成功","/administrator/show");
            }else{
                $this->redirect("删除失败","",0);
            }
        }
        $this->assign("show",true);
        $this->view("admin/administrator.html");
    }
    public function update($data=array()){
        if(isset($_POST['send'])){
            if($_POST['pwd']!=$_POST['pwd2']){
                $pwd=md5($_POST['pwd']);
            }else{
                $pwd=$_POST['pwd'];
            }
            $array=array(
                'username'=>$_POST['username'],
                'pwd'=>$pwd,
                'level_id'=>$_POST['level']
            );
            if($this->model->update("administrator",$array,"where id=".$_POST['id'])){
                $this->redirect("修改成功", "/administrator/show");
            }else if ($this->model->update("administrator",$array,"where id=".$_POST['id'])==0){
                $this->redirect("没有修改管理员", "/administrator/show");
            }else{
                $this->redirect("修改管理员失败", "",0);
            }
        }
        if($data['id']){
            $oneAdmin=$this->model->getOne("administrator","where id=".$data['id']);
            $this->level($oneAdmin[0]->level_id);
            $this->assign("oneAdmin",$oneAdmin[0]);
        }
        $this->assign("update",true);
        $this->view("admin/administrator.html");
    }
    public function show(){
        /* $permission=new permissionModel();
        $data=$permission->getPID("管理员管理");
        if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
            exit("权限不够");
        } */
        $AllLevel=$this->model->getAll("level");
        $levelStr=null;
        foreach ($AllLevel as $value){
            $levelStr.=$value->id.",";
        }
        $levelStr=rtrim($levelStr,",");
        //echo $levelStr;
        if(empty($_GET['level'])){
            $level_id=$levelStr;
        }else{
            $level_id=$_GET['level'];
        }
        $this->page($this->model->getAllTotal("administrator","where level_id in(".$level_id.")"));
        $data=$this->model->getAll("administrator","where level_id in(".$level_id.") order by id desc",$this->model->limit);
        $this->level($_GET['level']);
        //$this->dump($data);
        foreach ($data as $key=>$value){
            $oneLevel=$this->model->getOne("level","where id=".$value->level_id);
            $value->level_id=$oneLevel[0]->name;
        }
        $this->assign("data",$data);
        $this->assign("show",true);
        $this->view("admin/administrator.html");
    }
    public function add(){
        if(isset($_POST['send'])){
            //$this->dump($_POST['level']);
            $oneAdmin=$this->model->getOne("administrator","where username='".$_POST['username']."'");
            if($oneAdmin[0]){
                $this->redirect("用户名已经存在，请重试",$_SERVER['HTTP_REFERER']);
                $this->assign("add",true);
                $this->view("admin/administrator.html");
                return false;
            }else{$array=array(
                    'username'=>$_POST['username'],
                    'pwd'=>md5($_POST['pwd']),
                    'last_ip'=>$_SERVER['REMOTE_ADDR'],
                    'last_time'=>date("Y-m-d H:i:s"),
                    'login_num'=>0,
                    'level_id'=>$_POST['level'],
                    'reg_time'=>date("Y-m-d H:i:s")
                );
                if($this->model->add("administrator",$array)){
                    $this->redirect("添加成功", "/administrator/show");
                }else{
                    $this->redirect("添加失败", "",0);
                }
            }
        }
        $this->level();
        $this->assign("add",true);
        $this->view("admin/administrator.html");
    }
    private function level($num=0){
        $str=null;
        $AllLevel=$this->model->getAll("level");
        foreach ($AllLevel as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->assign("level",$str);
    }
}
?>