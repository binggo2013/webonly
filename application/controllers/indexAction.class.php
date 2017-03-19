<?php
class indexAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){	    
		//Tools::dump($_SESSION);
		switch ($_GET['action']){
			case "admin_login":
				$this->admin_login();
				break;
			case "logout":
				$this->logout();
				break;
			case "setAdmin_login":
				$this->setAdmin_login();
				break;
			case "welcome":
				$this->welcome();
				break;
		}
		if(Tools::isSession("username")){
			header("Location:index.php?a=index&action=admin_login");
			exit();
		}
		$this->smarty->display("admin/index.html");
	}
	private function welcome(){
	    $article=new articleModel();
	    $articleNum=$article->getArticleNum();
	    $user=new userModel();
	    $dict=new dictModel();
	    $feedback=new feedbackModel();
	    $entryNum=$dict->getAllEntryTotal2();
	    //echo ($articleNum);
	    $userNum=$user->getAllUserTotal();
	    $examination=new examinationModel();
	    $examNum=$examination->getExamNum();
	    $this->assign("aaa",$dict->getAllEntryTotal2());
	    $this->assign("rrr",$dict->getAllReportWordsTotal2());
	    //Tools::dump($feedback->getAllNewFeedbackTotal());
	    $this->assign("fff",$feedback->getAllNewFeedbackTotal());
	    $this->assign("examNum",$examNum);
	    $this->assign("userNum",$userNum);
	    $this->assign("articleNum",$articleNum);
		$this->display("admin/welcome.html");
		exit();
	}
	private function logout(){
		if($_GET['action']=='logout'){
			Tools::destroySession("username");
			Tools::destroySession("oneAdmin");
			header("Location:index.php?a=admin&action=admin_login");
		}
	}
	private function admin_login(){
		$this->smarty->display("admin/admin_login.html");
		exit();
	}
	public function setAdmin_login(){	    
		if($_GET['username']&&$_GET['pwd']){
		    $admin=new adminModel();
			$admin->username=$_GET['username'];
			$admin->pwd=md5($_GET['pwd']);
			//获取当前ip地址
			$admin->last_ip=$_SERVER['REMOTE_ADDR'];
			$oneAdmin=$admin->getOneByNamePWD();			
			if($oneAdmin){
				//把登录的用户存在session中
				$_SESSION['oneAdmin']=$oneAdmin;
				$_SESSION['username']=$_GET['username'];
				$admin->updateLogin();
				exit("ok");
			}else{
				exit("failed");
			} 
		}
	}
}
?>