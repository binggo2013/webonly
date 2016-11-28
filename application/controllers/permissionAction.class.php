<?php
class permissionAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
			case "add":
				$this->add();
				break;
			case "delete":
				$this->delete();
				break;
			case "update":
				$this->update();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
		}
		if(Tools::isSession("username")){
			header("Location:index.php?a=admin&action=admin_login");
		}
		$permission=new permissionModel();		
		$data=$permission->getPID("权限管理");		
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$this->smarty->display("admin/permission.html");
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			if($this->model->deleteAllPermission()){
				Tools::Redirect("删除成功", "?a=permission&action=show",1,1);
			}else{
				Tools::Redirect("删除失败", "?a=permission&action=show",2,1);
			}
		}
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->id=$_POST['id'];
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];
			if($this->model->updatePermission()){
				Tools::Redirect("修改成功", "?a=permission&action=show");
			}elseif ($this->model->updatePermission()==0){
			    Tools::Redirect("没有修改", "?a=permission&action=show");
			}else{
				Tools::Redirect("修改失败", "?a=permission&action=show");
			}
		}
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$onePermission=$this->model->getOnePermission();
			//Tools::dump($onePermission);
			$this->smarty->assign("onePermission",$onePermission);
		}
		$this->smarty->assign("update",true);
	}
	private function delete(){
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			if($this->model->deletePermission()){
				//header("Location:?a=permission&action=show");
			    Tools::Redirect("ok",$_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("failed", "?a=permission&action=show");
			}
		}
	}
	private function show(){
		//Tools::dump($this->model->getAllPermission());
		parent::page($this->model->getAllPermissionTotal());
		$this->smarty->assign("data",$this->model->getAllPermission());
		$this->smarty->assign("show",true);
	}
	private function add(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];
			if($this->model->addPermission()){
				Tools::Redirect("权限添加成功", "?a=permission&action=show");
			}else{
				Tools::Redirect("权限添加失败", "?a=permission&action=add");
			}
		}
		$this->smarty->assign("add",true);
	}
}
?>