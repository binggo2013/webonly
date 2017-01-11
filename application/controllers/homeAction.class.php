<?php
class homeAction extends Action{
	public function __construct(){	
	    parent::__construct();	    
	   if(file_exists("application/database/install.php")){
			//echo "未安装";
			header("Location:index.php?a=install&action=step1");
		}
		$quiz=new quizModel();
		//Tools::dump($quiz->showCourse());
		$this->smarty->assign("allCourse",$quiz->hotCourse());
	}
	public function login(){
		$user=new userModel();
		if($_POST['action']=="login"){
			$user->username=$_POST['username'];
			$user->pwd=md5($_POST['pwd']);
			$user->last_ip=$_SERVER['REMOTE_ADDR'];
			$oneUser=$user->getOneUserByNamePWD();
			if($oneUser){
				$user->updateLogin();				
				$_SESSION['oneUser']=$oneUser;		
				//exit("ok");
				echo '['.json_encode($oneUser).']';
			}else{
				exit("failed");
			}
		}
	}
	public function img(){
	    $captcha=new Captcha(90,34);
	    $captcha->setConfig(array('level'=>5,"isNoise"=>true,'simple'=>false));
	    $captcha->showCaptcha('public/fonts/ARIALNB.TTF');
	}
	public function logout(){		
			if(Tools::destroySession("oneUser")){
			    echo "ok";
				//Tools::destroySession("oneUser");				
			    //header('Location:index.php?a=home');
			}			
	}
	public function preCheck(){
		$user=new userModel();
		if($_POST['action']=="reg"){
			$user->username=$_POST['username'];
			$oneUser=$user->getOneUserByName();
			if($oneUser){
				exit("taken");
				return false;
			}
		}
		exit();
		return false;
	}
	public function reg(){
		//var_dump($_POST);
		$user=new userModel();
		//var_dump($user);
		if($_POST['action']=="reg"){
			$user->username=$_POST['username'];
			$user->pwd=md5($_POST['pwd']);
			$user->last_ip=$_SERVER['REMOTE_ADDR'];
			$user->icon='default.jpg';
			$user->email=$_POST['email'];
			//var_dump($user);
			if($user->addUser()){
				$_SESSION['oneUserName']=$_POST['username'];
				if($_SESSION['oneUserName']){
					$this->smarty->assign('logged',true);
				}else{
					$this->smarty->assign('logged',false);
				}
				exit("ok");
			}else{
				exit("failed");
			}
		}
	}
	public function main(){
		if($_SESSION['oneUserName']){
			$this->smarty->assign("logged",true);
			$user=new userModel();
			$user->id=$_SESSION['oneUserName']->id;
			$oneUser=$user->getOneUserByID();
			$this->smarty->assign("oneUser",$oneUser);
		}else{
			$this->smarty->assign("logged", false);
		}		
		switch ($_GET['action']){
			case "vote":
				$this->castVote();
				break;
			case "logout":
			    $this->logout();
			    break;
		}
		 $this->getUser();
		$this->showAD();
		$this->showVote();
		$this->showNav();
		$this->showArticle();
		$product=new productModel();
		$allProducts=$product->getHotProducts();		
		$course=new courseModel();		
		//$ask=new askModel();	
		//$askLeaderboard=$ask->askLeaderboard();	
		//$this->smarty->assign("askLeaderboard",$askLeaderboard);
		//Tools::dump($askLeaderboard);
		//$AllAsk=$ask->getAllAsks();
		$user=new userModel();
		$examination=new examinationModel();
		$userLeaderboard=$examination->getUserLeaderboard();
		//Tools::dump($userLeaderboard);
		$allCourse=$course->getFrontCourse();		
		//$arr=[];
// 		$arr=array();
// 		foreach ($allCourse as $key=>$value){		    
// 		    $examination->cid=$value->id;		    
// 		    $hotExam=$examination->getExamByCID();
// 		    foreach ($hotExam as $k=>$v){
// 		        $user->id=$v->uid;
// 		        $oneUser=$user->getOneUserByID();
// 		        $v->uid=$oneUser->username;
// 		    }		    
// 		    $arr[$value->name]=$hotExam;
// 		}	
        foreach($userLeaderboard as $key=>$value){
            $user->id=$value->uid;
            $course->id=$value->cid;
            $value->cid=$course->getOneCourse()->name;
            $oneUser=$user->getOneUserByID();
            $value->uid=$oneUser->username;
        }
		//Tools::dump($userLeaderboard);
 		$this->smarty->assign("newExam",$userLeaderboard);
		$this->smarty->assign("userLeaderboard",$userLeaderboard);
		//Tools::dump($AllAsk);
		/* foreach ($AllAsk as $key=>$value){
		    $user->id=$value->aid;
		    $oneUser=$user->getOneUserByID();
		    $course->id=$value->cid;
		    $oneCourse=$course->getOneCourse();
		    $value->courseName=$oneCourse->name;
		    $ask->id=$value->id;
		    $value->answerNum=$ask->getAllAnswersTotal();
		    $value->username=$oneUser->username;
		} */
		$download=new downloadModel();
		//Tools::dump($download->getDownloadNum());
		//Tools::dump($download->getDownloadNum());
		//$this->smarty->assign("downloadLeaderboard",$download->getDownloadNum());
		$this->smarty->assign("downloadLeaderboard",$download->getLatestDownload());
		//Tools::dump($AllAsk);
		/* $this->smarty->assign("AllAsk",$AllAsk); */
		$this->smarty->assign("AllAsk",false);
		$this->smarty->assign("allProducts",$allProducts);
		$product=new productModel();		
		$this->smarty->assign("productRecommend",$product->getAttrArticle("recommend"));
		$this->smarty->display("home/home.html");
	}
	private function getUser(){
		$user=new userModel();
		//Tools::dump($user->getLatestUser());
		$this->smarty->assign("showUpdate",false);
		$this->smarty->assign("LatestUser",$user->getLatestUser());
	}
	private function showArticle(){
		$article=new articleModel();
		$this->smarty->assign("headline",$article->getAttrArticle("headline"));
		$this->smarty->assign("focus",$article->getAttrArticle("focus"));
		$this->smarty->assign("topic",$article->getAttrArticle("topic"));
		//Tools::dump($article->getAttrArticle("pickup"));
		$this->smarty->assign("recommend",$article->getAttrArticle("recommend"));
		$this->smarty->assign("pickup",$article->getAttrArticle("pickup"));
	}
	private function showNav(){
		$nav=new navModel();
		$frontNav=$nav->getFrontNav();
// 		foreach ($frontNav as $key=>$value){
// 		    $nav->id=$value->id;
// 		    $aaa=$nav->getAllSubNavById();
// 		    if(!$aaa){
// 		        echo "mysql";
// 		    }
// 		   //Tools::dump($aaa); 
// 		}
		$this->smarty->assign("frontNav",$frontNav);
		//Tools::dump($frontNav);
	}
	/**
	 * 投票，返回给aJax使用
	 *   */
	private function castVote(){
		if($_COOKIE['vote_ip']==$_SERVER['REMOTE_ADDR']){
			if(time()-$_COOKIE['vote_time']<60*60*24){
				exit("repeat");
			}
		}
		//sleep(2);
		$vote=new voteModel();
		//var_dump($_GET);
		if(isset($_GET['id'])){
			$vote->id=$_GET['id'];
			if($vote->setCast()){
				setcookie("vote_ip",$_SERVER['REMOTE_ADDR']);
				setcookie("vote_time",time());
				echo 'ok';
			}else{
				echo "failed";
			}
		}
		exit();
	}
	private function showVote(){
		$vote=new voteModel();
		$this->smarty->assign("subject",$vote->getFrontVoteSubject());
		$this->smarty->assign("items",$vote->getFrontVoteItem());
	}
	private function showAD(){
		$ad=new adModel();
		$this->smarty->assign("banner",$ad->getFrontAd("banner"));
		$this->smarty->assign("slider",$ad->getFrontAd("slider"));
		$this->smarty->assign("fullcolumn",$ad->getFrontAd("fullcolumn"));
		$this->smarty->assign("sidebar",$ad->getFrontAd("sidebar"));
		//Tools::dump($fullcolumn);
	}
}
?>