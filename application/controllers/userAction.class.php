<?php
class userAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
			case "delete":
				$this->delete();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
			case "state":
				$this->state();
				break;
			case "member":
				$this->member();
				break;
			case "member2":
				$this->member2();
				break;
			case "update":
				$this->update();
				break;			
		}
		$permission=new permissionModel();
		$data=$permission->getPID("前台会员管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->id)){
		    exit("权限不够");
		}
		$this->smarty->display('admin/user.html');
	}
	public function forget(){
	    $this->model->email=$_POST['email'];
	    $this->model->username=$_POST['username'];
	    $oneUser=$this->model->getOneUserByEmail();
	    if($oneUser){
	        echo "ok";
	    }else{
	        echo "failed";
	    }
	}
	public function reset(){
	    $this->model->username=$_GET['username'];
	    $this->model->pwd=md5($_GET['pwd']);
	    $oneUser=$this->model->resetPWD(); 
	    $getoneUser=$this->model->getOneUserByNamePWD();
	    if($oneUser){
	        $_SESSION['oneUser']=$getoneUser;		
			//exit("ok");
			echo '['.json_encode($getoneUser).']';
	    }else if($oneUser==0){
	        echo "same";
	    }else{
	        echo "failed";
	    }
	}
	public function tempUser(){
	    $_SESSION['oneUser']=$_POST['user'];
	    //Tools::dump($_POST);
	}	
	public function checkUserName(){
	    if($_POST['action']=="reg"){
	        $this->model->username=$_POST['username'];
	        $oneUser=$this->model->getOneUserByName();
	        if($oneUser){
	            echo "taken";
	        }else{
	            echo "available";
	        }
	    }else if($_POST['action']=="send"){
	        $this->model->username=$_POST['username'];
	        $oneUser=$this->model->getOneUserByName();
	        $this->model->pwd=md5($_POST['pwd']);
	        $this->model->last_ip=$_SERVER['REMOTE_ADDR'];
	        if($_FILES['reg_icon']['name']){
	            //$this->model->icon=$_FILES['reg_icon']['name'];
	            $upload=new UploadFile("reg_icon","public/uploads/member/");
	            if($upload->upload("reg_icon")){
	                $this->model->icon=$upload->getNewName();
	            }else{
	                Tools::getBack($upload->getErrorMsg());
	            }
	        }else{
	            $this->model->icon="default.jpg";
	        }
	        $this->model->email=$_POST['email'];
	        if($oneUser){
	            echo "taken";
	        }else{
	            if($this->model->addUser()){
	                $oneUser=$this->model->getLatestUser();
	                //Tools::dump($oneUser);
	                $_SESSION['oneUser']=$oneUser;
	                /* $_SESSION['oneUserName']['username']=$oneUser->username;
	                $_SESSION['oneUserName']['uid']=$oneUser->username;
	                $_SESSION['oneUserName']['icon']=$oneUser->icon;
	                $_SESSION['oneUserName']['id']=$oneUser->id; */
	                echo '['.json_encode($oneUser).']';
	                exit();
	            }else{
	                exit("failed");
	            }
	        }
	    }
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			//Tools::dump($_FILES);
			$this->model->id=$_POST['id'];
			$this->model->email=$_POST['email'];
			if($_POST['pwd']!=$_POST['pwd2']){
				$this->model->pwd=md5($_POST['pwd']);
			}else{
				$this->model->pwd=$_POST['pwd'];
			}
			$file=null;
			if(is_uploaded_file($_FILES['icon']['tmp_name'])){
				$upload=new UploadFile("icon",'public/uploads/member/');
				if($upload->upload("icon")){
					$file=$upload->getNewName();
				}
			}else{
				$file=$_POST['icon2'];
			}
			$this->model->icon=$file;
			if($this->model->updateUser()){
				Tools::Redirect("修改成功", "?a=user&action=member&id=".$_POST['id']);				
			}elseif ($this->model->updateUser()==0){
			    Tools::Redirect("没有修改", "?a=user&action=member&id=".$_POST['id']);
			}else{
			    Tools::Redirect("修改失败",$_SERVER['HTTP_REFERER']);
			}
		}
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneUser=$this->model->getOneUserByID();
			//Tools::dump($oneUser);
			$this->smarty->assign("oneUser",$oneUser);
		}
		$this->smarty->assign("update",true);
		$this->smarty->display('home/member.html');
		exit();
	}
	private function member2(){
		$comment=new commentModel();
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneUser=$this->model->getOneUserByID();
			$comment->uid=$oneUser->username;
			$page=new Page($comment->getAllCommentsByUIDTotal());
			$comment->limit=$page->limit;
			$allComments=$comment->getAllCommentsByUID();
			//Tools::dump($allComments);
			$this->smarty->assign('page',$page->display());
			$this->smarty->assign("allComments",$allComments);
			$this->smarty->assign("oneUser",$oneUser);
		}
		$this->smarty->assign("member",true);
		$this->smarty->display('home/newarrival.html');
		exit();
	}
	private function member(){
		$comment=new commentModel();
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneUser=$this->model->getOneUserByID();
			$comment->uid=$oneUser->username;
			$page=new Page($comment->getAllCommentsByUIDTotal());
			$comment->limit=$page->limit;
			$allComments=$comment->getAllCommentsByUID();
			//Tools::dump($allComments);
			$this->smarty->assign('page',$page->display());
			$this->smarty->assign("allComments",$allComments);
			$this->smarty->assign("oneUser",$oneUser);
		}
		$this->smarty->assign("member",true);
		$this->smarty->display('home/member.html');
		exit();
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
				Tools::Redirect($switch."成功", "?a=user&action=show");
			}else{
				Tools::Redirect($switch."失败", "?a=user&action=show",2);
			}
		}
	}
	//获取会员的成绩
	public function score(){
        $exam=new examinationModel();
        //Tools::dump($exam->getScore());
        $this->smarty->assign("score",$exam->getScore());
        $this->smarty->assign("showScore",true);
        $this->smarty->display("home/member.html");
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			if($this->model->deleteAllUser()){
				Tools::Redirect("删除成功", "?a=user&action=show",1,1);
			}else{
				Tools::Redirect("删除失败", "?a=user&action=show",2,1);
			}
		}
	}
	private function show(){
		//Tools::dump($this->model->getAllUser());
		$page=new Page($this->model->getAllUserTotal(),5);
		$this->model->limit=$page->limit;
		$this->smarty->assign("num",$page->listRowsBegin());
		$this->smarty->assign("page",$page->display());
		$data=$this->model->getAllUser();
		foreach ($data as $key=>$value){
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=user&action=state&flag=show&id=".$value->id."'>通过</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=user&action=state&flag=hide&id=".$value->id."'>否决</a>	";
			}
		}
		$this->smarty->assign('data',$data);
		$this->smarty->assign("show",true);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteUser()){
				//header("Location:?a=user&action=show");
			    Tools::Redirect("ok",$_SERVER['HTTP_REFERER'],1,1);
			}
		}
	}
}
?>