<?php
class voteAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "addSubject":
				$this->addSubject();
				break;
			case "addItem":
				$this->addItem();
				break;
			case "showSubject":
				$this->showSubject();
				break;
			case "state":
				$this->state();
				break;
			case "showItem":
				$this->showItem();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
			case "delete":
				$this->delete();
				break;
			case "update":
				$this->update();
				break;
			case "showResult":
				$this->showResult();
				break;
		}
		if(Tools::isSession("username")){
			header("Location:index.php?a=admin&action=admin_login");
		}
		$permission=new permissionModel();
		$data=$permission->getPID("投票管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$this->smarty->display("admin/vote.html");
	}
	private function showResult(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneSubject=$this->model->getOneVote();
			$AllItems=$this->model->getItemById();
			//Tools::dump($AllItems);
			//一个投票主题的总票数
			$sum=null;
			foreach ($AllItems as $value){
				//echo gettype($value->amount);
				$sum+=$value->amount;
			}
			//echo $sum;
			//每一个投票项占的百分比
			foreach ($AllItems as $value){
				$value->percent=round($value->amount/$sum*100,2);
			}
			//把bootstrap里进度条的类名称封装到数组中
			$class=array("progress-bar-success","progress-bar-info","progress-bar-warning","progress-bar-danger");
			$this->smarty->assign("class",$class);
			$this->smarty->assign("sum",$sum);
			$this->smarty->assign("data",$AllItems);
			$this->smarty->assign("oneSubject",$oneSubject);
			//Tools::dump($oneSubject);
		}else{
			header("Location:home.php");
		}
		$this->smarty->assign("showResult",true);
		$this->smarty->display("home/showResult.html");
	}
	private function update(){
		$this->model->id=$_GET['id'];
		$oneVote=$this->model->getOneVote();
		$url=null;
		if($_GET['type']=='subject'){
			//echo "subject";
			$url="?a=vote&action=showSubject";
		}elseif($_GET['type']=='item'){
			//echo "item";
			$url="?a=vote&action=showItem&id=".$oneVote->pid;
		}
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->id=$_POST['id'];
			$this->model->title=$_POST['title'];
			$this->model->description=$_POST['description'];
			if($this->model->updateVote()){
				Tools::Redirect("修改成功", $url);
			}elseif ($this->model->updateVote()==0){
			    Tools::Redirect("没有修改", $url);
			}else{
				Tools::Redirect("修改失败", $url,2);
			}
		}
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			//Tools::dump($oneVote);
			if($_GET['type']=='item'){
				//投票项的pid等于主题的id
				$this->model->id=$oneVote->pid;
				//Tools::dump($this->model->id);
				$subject=$this->model->getOneVote();
				$this->smarty->assign("subject",$subject);
			}
			$this->smarty->assign("oneVote",$oneVote);

		}
		$this->smarty->assign("update",true);
	}
	/**
	 * 根据上传的是主题还是项目<br>
	 * 相应的进行跳转
	 *   */
	private function delete(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$url=null;
			if($_GET['type']=='subject'){
				//echo "subject";
				$url="?a=vote&action=showSubject";
				$items=$this->model->getItemById();
				//Tools::dump($items);
				if($items){
					Tools::Redirect("先删除主题下的投票项", $url);
				}
			}elseif($_GET['type']=='item'){
				//echo "item";
				$url="?a=vote&action=showItem&id=".$oneVote->pid;
			}
			if($this->model->deleteVote()){
				//Tools::Redirect("删除成功",$url);
				header("Location:".$url);
			}else{
				Tools::Redirect("删除失败",$url);
			}
		}
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			$url=null;
			if($_GET['type']=='subject'){
				$url="?a=vote&action=showSubject";
				$ids=explode(",", $this->model->multiId);
				//Tools::dump($ids);
				foreach ($ids as $key=>$value){
					//echo $value;
					$this->model->id=$value;
					$items=$this->model->getItemById();
					if($items){
						Tools::Redirect("第".($key+1)."不为空，不能删除","?a=vote&action=showSubject");
						//exit("第".($key+1)."不为空，不能删除<br>");
					}
				}
			}else{
				$url="?a=vote&action=showItem&id=".$_GET['id'];
			}
			if($this->model->deleteAllVote()){
				Tools::Redirect("多删成功",$url);
			}else{
				Tools::Redirect("多删失败", $url,2,1);
			}
		}
	}
	private function showItem(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			//先根据id获取投票主题;
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$this->smarty->assign("oneVote",$oneVote);
			//Tools::dump($oneVote);
			parent::page($this->model->getItemByIdTotal());
			$data=$this->model->getItemById();
			foreach ($data as $value){
				//echo $value->state="hello";
				switch ($value->state){
					case 0:
						$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=vote&action=state&type=item&flag=show&id=".$value->id."'>显示</a>";
						break;
					case 1:
						$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=vote&action=state&type=item&flag=hide&id=".$value->id."'>隐藏</a>	";
						break;
				}
			}
			$this->smarty->assign('data',$data);
		}
		$this->smarty->assign("showItem",true);
	}
	private function addItem(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$this->smarty->assign("oneVote",$oneVote);
			//Tools::dump($oneVote);
			$this->model->id=$oneVote->id;
			if(isset($_POST['send'])){
				$this->model->title=$_POST['title'];
				$this->model->description=$_POST['description'];
				if($this->model->addItem()){
					////
					Tools::Redirect("添加投票项成功", "?a=vote&action=showItem&id=".$_GET['id']);
				}else{
					Tools::Redirect("添加投票项失败", "?a=vote&action=addItem&id=".$_GET['id'],2);
				}
			}
		}
		$this->smarty->assign("addItem",true);
	}
	private function state(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$switch=null;
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}
			$url="?action=showSubject";
			if($_GET['type']=='item'){
				$url="?a=vote&action=showItem&id=".$oneVote->pid;
			}
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", $url);
			}else{
				Tools::Redirect($switch."失败",$url,2);
			}
		}
	}
	private function showSubject(){
		parent::page($this->model->getAllSubjectTotal());
		//Tools::dump($this->model->getAllSubject());
		$data=$this->model->getAllSubject();
		foreach ($data as $value){
			//echo $value->state="hello";
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=vote&action=state&flag=show&id=".$value->id."'>显示</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=vote&action=state&flag=hide&id=".$value->id."'>隐藏</a>	";
					break;
			}
		}
		$this->smarty->assign("data",$data);
		$this->smarty->assign("showSubject",true);
	}
	private function addSubject(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->title=$_POST['title'];
			$this->model->description=$_POST['description'];
			if($this->model->addSubject()){
				Tools::Redirect("添加投票主题成功", "?action=showSubject");
			}else{
				Tools::getBack("添加投票主题失败");
			}
		}
		$this->smarty->assign("addSubject",true);
	}
}
?>