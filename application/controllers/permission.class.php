<?php
class permission extends Controller{
    public function update($data=array()){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description']
            );
            if($this->model->update("permission",$array,"where id=".$_POST['id'])){
                $this->redirect("修改成功", "/permission/show");
            }elseif ($this->model->update("permission",$array,"where id=".$_POST['id'])==0){
                $this->redirect("没有修改", "/permission/show");
            }else{
                $this->redirect("修改失败", "/permission/show",0);
            }
        }
        //Tools::dump($_GET);
        if($data['id']){
            $onePermission=$this->model->getOne("permission","where id=".$data['id']);
            $this->smarty->assign("onePermission",$onePermission[0]);
        }
        $this->assign("update",true);
        $this->view("admin/permission.html");
    }
    public function delete($data=array()){
        if(isset($data['id'])){
            if($this->model->delete("permission","where id=".$data['id'])){
                $this->redirect("删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("删除成功", "",0);
            }
        }
        $this->assign("show",true);
        $this->view("admin/permission.html");
    }
    public function show(){
        $this->page($this->model->getAllTotal("permission"));
        $this->assign("data",$this->model->getAll("permission","order by id desc",$this->model->limit));
        $this->assign("show",true);
        $this->view("admin/permission.html");
    }
    public function add(){
        if(isset($_POST['send'])){
            //Tools::dump($_POST);
            $this->model->name=$_POST['name'];
            $this->model->description=$_POST['description'];
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->add("permission",$array)){
                $this->redirect("权限添加成功", "/permission/show");
            }else{
                $this->redirect("权限添加失败", "/permission/add",0);
            }
        }
        $this->assign("add",true);
        $this->view("admin/permission.html");
    }
}
?>