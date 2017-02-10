<?php
class level extends Controller{
    public function update($data=array()){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'pid'=>implode(",", $_POST['permission']),
                'description'=>$_POST['description']
            );
            if($this->model->update("level",$array,"where id=".$_POST['id'])){
                $this->redirect("修改成功", "/level/show");
            }elseif ($this->model->update("level",$array,"where id=".$_POST['id'])==0){
                $this->redirect("没有修改等级", "/level/show");
            }else{
                $this->redirect("修改失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($data['id']){
            $oneLevel=$this->model->getOne("level","where id=".$data['id']);
            $this->permission($oneLevel[0]->pid);
            $this->assign("oneLevel",$oneLevel[0]);
        }
        $this->assign("update",true);
        $this->view("admin/level.html");
    }
    public function delete($data=array()){
        if(isset($data['id'])){
            if($this->model->delete("level","where id=".$data['id'])){
                $this->redirect("删除等级成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("删除失败", "",0);
            }
        }
        $this->assign("show",true);
        $this->view("admin/level.html");
    }
    public function showPermission($data=array()){
        //Tools::dump($_GET);
        if($data['id']){
            $AllPermission=$this->model->getAll("permission");
            $oneLevel=$this->model->getOne("level","where id=".$data['id']);
            $this->assign("oneLevel",$oneLevel[0]);
            $num=$oneLevel[0]->pid;
            $n=explode(",", $num);
            $str=null;
            foreach ($AllPermission as $value){
                if(in_array($value->id, $n)){
                    $str.="<i class='fa fa-check-square-o'></i><input type='checkbox' style='display:none'>&nbsp;".$value->name."&nbsp;&nbsp;";
                }
            }
            $this->assign("permission",$str);
            $this->assign("back",$_SERVER['HTTP_REFERER']);
        }
        $this->assign("showPermission",true);
        $this->view("admin/level.html");
    }
    public function show(){
        $this->page($this->model->getAllTotal("level"));
        $data=$this->model->getAll("level","order by id desc",$this->model->limit);
        $this->assign("data",$data);
        $this->assign("show",true);
        $this->view("admin/level.html");
    }
    public function add(){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'pid'=>implode(",", $_POST['permission'])
            );
            if($this->model->add("level",$array)){
                $this->redirect("添加成功","/level/show");
            }else{
                $this->redirect("添加失败","/level/show",2);
            }
        }
        $this->permission();
        $this->assign("add",true);
        $this->view("admin/level.html");
    }
    public function permission($num=null){
        $AllPermission=$this->model->getAll("permission");
        $n=explode(",", $num);
        $str=null;
        foreach ($AllPermission as $value){
            if(in_array($value->id, $n)){
                $checked="checked='checked'";
            }else{
                $checked='';
            }
            $str.="<input type='checkbox' value='".$value->id."' name='permission[]' ".$checked.">".$value->name."&nbsp;";
        }
        $this->assign("permission",$str);
    }
}
?>