<?php
class commentAction extends Action{
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
			case "adminShow":
				$this->adminShow();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
			case "state":
				$this->state();
				break;
			case "delete":
				$this->delete();
				break;			
		}
		$permission=new permissionModel();
		$data=$permission->getPID("评论管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
			exit("权限不够");
		}
		$this->smarty->display("admin/comment.html");
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteComment()){
				Tools::Redirect("ok",$_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("failed",$_SERVER['HTTP_REFERER'],2,1);
			}
		}
	}
	private function state(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$switch=null;
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", "?a=comment&action=adminShow");
			}else{
				Tools::Redirect($switch."失败", "?a=comment&action=adminShow",2);
			}
		}
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			if($this->model->deleteAllComment()){
				Tools::Redirect("删除成功", $_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("删除失败",$_SERVER['HTTP_REFERER'],2,1);
			}
		}
	}
	private function adminShow(){
		parent::page($this->model->getAdminAllCommentTotal(),5);
		$article=new articleModel();
		$user=new userModel();
		//Tools::dump($this->model->getAdminAllComment());
		$data=$this->model->getAdminAllComment();
		foreach ($data as $value){
			$article->id=$value->aid;
			$oneArticle=$article->getOneArticle();
			//Tools::dump($oneArticle);
			$value->title=$oneArticle->title;
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=comment&action=state&flag=show&id=".$value->id."'>通过</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=comment&action=state&flag=hide&id=".$value->id."'>否决</a>	";
			}
		  $user->id=$value->uid;
		  $oneUser=$user->getOneUserByID();
		  $value->username=$oneUser->username;		  
		}
		$this->smarty->assign("data",$data);
		$this->smarty->assign("show",true);
	}
	private function show(){
	    //echo "hello";
	    //Tools::dump($_SESSION);
	    $user=new userModel();
	    //Tools::dump($user);
	    //Tools::dump($_GET);
		if(isset($_GET['aid'])){
			$this->model->aid=$_GET['aid'];
			$page=new Ajax_Page($this->model->getAllCommentTotal(),10);
			$this->model->limit=$page->limit;
			$allComment=$this->model->getAllComment();
			foreach ($allComment as $key=>$value){
			         $user->id=$value->uid;
                     $oneUser=$user->getOneUserByID();
                     //Tools::dump($oneUser);
                     $value->username=$oneUser->username;
                     //echo $value->id;
			}
			//echo "hello";
            //Tools::dump($allComment);
			$temp=array();
			$temp[0]=$allComment;
			$temp[1]=$page->display(array(0,1,2,3,4));
			echo json_encode($temp);
			//echo "hello";
			//echo json_encode($allComment);
		}
		//Tools::dump($user);
		exit();
	}
	private function add(){
		//echo "ok";
		//Tools::dump($_SESSION);
	    $user=new userModel();
		if(isset($_GET['aid'])){
			//Tools::dump($_GET);
			$this->model->aid=$_GET['aid'];
			$this->model->uid=$_GET['uid'];
			$this->model->content=$_GET['content'];
			//Tools::dump($this->model);
			if($this->model->addComment()){
				$page=new Ajax_Page($this->model->getAllCommentTotal(),10);
				$this->model->limit=$page->limit;
				$allComment=$this->model->getAllComment();
				foreach ($allComment as $key=>$value){
				    $user->id=$value->uid;
				    $oneUser=$user->getOneUserByID();
				    //Tools::dump($oneUser);
				    $value->username=$oneUser->username;
				    //echo $value->id;
				}
				$temp=array();
				$temp[0]=$allComment;
				$temp[1]=$page->display(array(0,1,2));
				echo json_encode($temp);
				//echo "ok";
			}else{
				echo "failed";
			}
		}
		//Tools::dump($_GET);
		exit();
	}
}
?>