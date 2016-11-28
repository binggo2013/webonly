<?php
class categoryAction extends Action{
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
		/* $permission=new permissionModel();
		$data=$permission->getPID("等级管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		} */
		$this->smarty->display("admin/category.html");
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->id=$_POST['id'];
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];			
			if($this->model->updateCategory()){
				Tools::Redirect("修改成功", "?a=category&action=show");
			}elseif ($this->model->updateCategory()==0){
			    Tools::Redirect("没有修改分类", $_SERVER['HTTP_REFERER']);
			}else{
				Tools::Redirect("修改失败",$_SERVER['HTTP_REFERER'],2);
			}
		}
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			$oneLevel=$this->model->getOneCategory();
			//Tools::dump($oneLevel);			
			$this->smarty->assign("oneLevel",$oneLevel);
		}
		$this->smarty->assign("update",true);
	}
	private function delete(){
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			if($this->model->deleteCategory()){
				Tools::Redirect("删除分类成功",$_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("删除失败", $_SERVER['HTTP_REFERER'],2);
			}
		}
	}	
	private function show(){		
		parent::page($this->model->getAllCategoryTotal());
		$data=$this->model->getAllCategory();
		$this->smarty->assign("data",$data);
		$this->smarty->assign("show",true);
	}
	private function add(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];			
			if($this->model->addCategory()){
				Tools::Redirect("添加成功","?a=category&action=show");
			}else{
				Tools::Redirect("添加失败",$_SERVER['HTTP_REFERER'],2);
			}
		}		
		$this->smarty->assign("add",true);
	}	
}
?>