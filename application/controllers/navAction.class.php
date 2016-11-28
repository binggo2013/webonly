<?php
class navAction extends Action{
	public function __construct() {
		parent::__construct();
	}
	public function main(){
		//Tools::dump($this->model->getAllSubject());
		switch ($_GET['action']){
			case "addMainNav":
				$this->addMainNav();
				break;
			case "addSubNav":
				$this->addSubNav();
				break;
			case "showMainNav":
				$this->showMainNav();
				break;
			case "showSubNav":
				$this->showSubNav();
				break;
			case "state":
				$this->state();
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
		$data=$permission->getPID("导航管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$this->smarty->display("admin/nav.html");
	}
	private function deleteAll(){
		$url=null;
		if($_GET['type']=="MainNav"){
			$url="?a=nav&action=showMainNav";
		}elseif ($_GET['type']=="SubNav"){
			$url="?a=nav&action=showSubNav&id=".$_GET['id'];
		}
		//Tools::dump($_POST);
		if($_POST['send']=="排序"){
			if(isset($_POST['sort'])){
				$this->model->sort=$_POST['sort'];
				if($this->model->setSort()){
					Tools::Redirect("排序成功", $url);
				}else{
					Tools::getBack("排序失败");
				}
			 }
		}
		//Tools::dump($_POST);
		//Tools::dump($_GET);
		//exit();
		if($_POST['send']=="全删"){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			$ids=explode(",", $this->model->multiId);
			//Tools::dump($ids);
			foreach ($ids as $key=>$value){
				//echo $value;
				$this->model->id=$value;
				$items=$this->model->getAllSubNavById();
				if($items){
					Tools::Redirect("第".($key+1)."不为空，不能删除",$url);
					//exit("第".($key+1)."不为空，不能删除<br>");
				}
			}
			if($this->model->deleteAllNav()){
				Tools::Redirect("删除成功", $url,1,1);
			}else{
				Tools::Redirect("删除失败", $url,2,1);
			}
		}
	}
	private function showSubNav(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneNav=$this->model->getOneNav();
			$this->smarty->assign("oneNav",$oneNav);
			//Tools::dump($oneNav);
			parent::page($this->model->getAllSubNavByIdTotal());
			$data=$this->model->getAllSubNavById();
			foreach ($data as $value){
				//echo $value->state="hello";
				switch ($value->state){
					case 0:
						$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=nav&action=state&type=SubNav&flag=show&id=".$value->id."'>显示</a>";
						break;
					case 1:
						$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=nav&action=state&type=SubNav&flag=hide&id=".$value->id."'>隐藏</a>	";
						break;
				}
			}
			//Tools::dump($AllSubNav);
			$this->smarty->assign("data",$data);
		}else{
			header("Location:".$_SERVER['HTTP_REFERER']);
		}
		$this->smarty->assign("showSubNav",true);
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_GET);
			$this->model->id=$_POST['id'];
			$oneNav=$this->model->getOneNav();
			$this->model->name=$_POST['name'];
			$this->model->url=$_POST['url'];
			$this->model->hasChild=$_POST['hasChild'];
			$this->model->description=$_POST['description'];
			if($_GET['type']=='MainNav'){
			 $url="?a=nav&action=showMainNav";
			}else if($_GET['type']=='SubNav'){
				$url="?action=showSubNav&id=".$oneNav->pid;
			}
			if($this->model->updateNav()){
				Tools::Redirect("修改成功", $url);
			}elseif ($this->model->updateNav()==0){
			    Tools::Redirect("没有修改", $url);
			}else{
				Tools::getBack("修改失败");
			}
		}
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneNav=$this->model->getOneNav();
			//Tools::dump($oneNav);
			$this->smarty->assign("oneNav",$oneNav);
			//Tools::dump($oneNav);
		}
		$this->smarty->assign("update",true);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneNav=$this->model->getOneNav();
			if($_GET['type']=='MainNav'){
				$url="?a=nav&action=showMainNav";
				$this->model->id=$oneNav->id;
				$SubNav=$this->model->getAllSubNavById();
				if($SubNav){
					Tools::Redirect("主导航不为空，不能删除!", $url);
				}
			}else if($_GET['type']=='SubNav'){
				$url="?a=nav&action=showSubNav&id=".$oneNav->pid;
			}
			if($this->model->deleteNav()){
				//header("Location:".$url);
				Tools::Redirect("ok",$url,1,1);
			}else{
				Tools::Redirect("failed",$url,2,1);
			}
		}
	}
	private function state(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneNav();
			$switch=null;
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}
			$url="?a=nav&action=showMainNav";
			if($_GET['type']=='SubNav'){
				$url="?a=nav&action=showSubNav&id=".$oneVote->pid;
			}
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", $url);
			}else{
				Tools::Redirect($switch."失败",$url,2);
			}
		}
	}
	private function showMainNav(){
		parent::page($this->model->getAllMainNavTotal());
		$data=$this->model->getAllMainNav();
		foreach ($data as $value){
			//echo $value->state="hello";
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=nav&action=state&type=MainNav&flag=show&id=".$value->id."'>显示</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=nav&action=state&type=MainNav&flag=hide&id=".$value->id."'>隐藏</a>	";
					break;
			}
		}
		$this->smarty->assign("data",$data);
		$this->smarty->assign("showMainNav",true);
	}
	private function addMainNav(){
		if(isset($_POST['send'])){
		    //Tools::dump($_POST);
		    //exit();
			$this->model->name=$_POST['name'];
			$this->model->url=$_POST['url'];
			$this->model->hasChild=$_POST['hasChild'];
			$this->model->description=$_POST['description'];
			if($this->model->addMainNav()){
				Tools::Redirect("添加成功", "?a=nav&action=showMainNav");
			}else{
				Tools::getBack("添加失败");
			}
		}
		$this->smarty->assign("addMainNav",true);
	}
	private function addSubNav(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneNav=$this->model->getOneNav();
			$this->smarty->assign("oneNav",$oneNav);
		}
		if(isset($_POST['send'])){
			$this->model->id=$_GET['id'];
			$this->model->name=$_POST['name'];
			$this->model->description=$_POST['description'];
			if($this->model->addSubNav()){
				Tools::Redirect("添加成功", "?a=nav&action=showSubNav&id=".$_GET['id']);
			}else{
				//Tools::getBack("添加失败");
			}
		}
		$this->smarty->assign("addSubNav",true);
	}
}
?>