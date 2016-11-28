<?php
class levelAction extends Action{
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
			case "update":
				$this->update();
				break;
		}
		if(Tools::isSession("username")){
			header("Location:index.php?a=admin&action=admin_login");
		}
		$permission=new permissionModel();
		$data=$permission->getPID("等级管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$this->smarty->display("admin/level.html");
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->id=$_POST['id'];
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];
			$this->model->permission=implode(",", $_POST['permission']);
			if($this->model->updateLevel()){
				Tools::Redirect("修改成功", "?a=level&action=show");
			}elseif ($this->model->updateLevel()==0){
			    Tools::Redirect("没有修改等级", "?a=level&action=show");
			}else{
				Tools::Redirect("修改失败",$_SERVER['HTTP_REFERER']);
			}
		}
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			$oneLevel=$this->model->getOneLevel();
			//Tools::dump($oneLevel);
			$this->permission($oneLevel->permission);
			$this->smarty->assign("oneLevel",$oneLevel);
		}
		$this->smarty->assign("update",true);
	}
	private function delete(){
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			if($this->model->deleteLevel()){
				Tools::Redirect("删除等级成功",$_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("删除失败", "?a=level&action=show");
			}
		}
	}
	private function showPermission(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$permission=new permissionModel();
			$AllPermission=$permission->getAllPermission();
			$this->model->id=$_GET['id'];
			$oneLevel=$this->model->getOneLevel();
			$this->smarty->assign("oneLevel",$oneLevel);
			$num=$oneLevel->permission;
			$n=explode(",", $num);
			$str=null;
			foreach ($AllPermission as $value){
				if(in_array($value->id, $n)){
					$str.="<i class='fa fa-check-square-o'></i><input type='checkbox' style='display:none'>&nbsp;".$value->name."&nbsp;&nbsp;";
				}
			}
			$this->smarty->assign("permission",$str);
			$this->smarty->assign("back",$_SERVER['HTTP_REFERER']);
		}
		$this->smarty->assign("showPermission",true);
	}
	private function show(){
		$permission=new permissionModel();
		$AllPermission=$permission->getAllPermission();
		parent::page($this->model->getAllLevelTotal());
		$data=$this->model->getAllLevel();
		$this->smarty->assign("data",$data);
		$this->smarty->assign("show",true);
	}
	private function add(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];
			$this->model->permission=implode(",", $_POST['permission']);
			if($this->model->addLevel()){
				Tools::Redirect("添加成功","?a=level&action=show");
			}else{
				Tools::Redirect("添加失败","?a=level&action=show",2);
			}
		}
		$this->permission();
		$this->smarty->assign("add",true);
	}
	private function permission($num=null){
		$permission=new permissionModel();
		$AllPermission=$permission->getAllPermission();
		//Tools::dump($AllPermission);
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
		$this->smarty->assign("permission",$str);
	}
}
?>