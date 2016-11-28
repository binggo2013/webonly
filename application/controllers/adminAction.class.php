<?php
class adminAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		//Tools::dump($_SESSION);
		switch ($_GET['action']){
			case "add":
				$this->add();
				break;
			case "show":
				$this->show();
				break;
			case "update":
				$this->update();
				break;
			case "delete":
				$this->delete();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
		}
		$this->smarty->display("admin/administrator.html");
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			if($this->model->deleteAllAdmin()){
				Tools::Redirect("删除成功", "?a=admin&action=show",1,1);
			}else{
				Tools::Redirect("删除失败", "?a=admin&action=show",2,1);
			}
		}
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteAdmin()){
				Tools::Redirect("删除管理员成功","?a=admin&action=show");
			}else{
				Tools::Redirect("删除失败","?a=admin&action=show");
			}
		}
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->id=$_POST['id'];
			$this->model->username=$_POST['username'];
			if($_POST['pwd']!=$_POST['pwd2']){
                $this->model->pwd=md5($_POST['pwd']);
			}else{
			    $this->model->pwd=$_POST['pwd'];
			}
			$this->model->level_id=$_POST['level'];
			if($this->model->updateAdmin()){
				Tools::Redirect("修改成功", "?a=admin&action=show");
			}else if ($this->model->updateAdmin()==0){
			    Tools::Redirect("没有修改管理员", "?a=admin&action=show");
			}else{
				Tools::Redirect("修改管理员失败", "?a=admin&action=show");
			}
		}
		if(isset($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			$oneAdmin=$this->model->getOneAdmin();
			$this->level($oneAdmin->level_id);
			//Tools::dump($oneAdmin);
			$this->smarty->assign("oneAdmin",$oneAdmin);
		}
		$this->smarty->assign("update",true);
		$this->smarty->display("admin/administrator.html");
		exit();
	}
	private function show(){
		$permission=new permissionModel();
		$data=$permission->getPID("管理员管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$level=new levelModel();
		$AllLevel=$level->getAllLevel();
		$levelStr=null;
		foreach ($AllLevel as $value){
			$levelStr.=$value->id.",";
		}
		$levelStr=rtrim($levelStr,",");
		//echo $levelStr;
		if(empty($_GET['level'])){
			$this->model->level_id=$levelStr;
		}else{
			$this->model->level_id=$_GET['level'];
		}
		parent::page($this->model->getAllAdminTotal());
		$data=$this->model->getAllAdmin();
		//Tools::dump($data);
		$this->level($_GET['level']);
		$this->smarty->assign("data",$data);
		$this->smarty->assign("show",true);
	}
	private function add(){
		//Tools::dump($this->model->getAllAdmin());
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$this->model->username=$_POST['username'];
			$this->model->pwd=md5($_POST['pwd']);
			$this->model->last_ip=$_SERVER['REMOTE_ADDR'];
			$this->model->level_id=$_POST['level'];
			if($this->model->addAdmin()){
				Tools::Redirect("添加成功", "?a=admin&action=show");
			}else{
				Tools::Redirect("添加失败", "?a=admin&action=show",2);
			}
		}
		$this->level();
		$this->smarty->assign("add",true);
	}
	private function level($num=0){
		$str=null;
		$level=new levelModel();
		foreach ($level->getAllLevel() as $key=>$value){
			if($num==$value->id){
				$selected="selected='selected'";
			}else{
				$selected='';
			}
			$str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
		}
		$this->smarty->assign("level",$str);
	}
}
?>