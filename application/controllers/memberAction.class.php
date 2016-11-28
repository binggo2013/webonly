<?php
class memberAction extends Action{
	public function __construct(){
	   	parent::__construct();		
	}
	public function main(){	    
	    switch ($_GET['action']){
	        case "show":
	            $this->show();
	            break;
	        case "showScore":
	            $this->showScore();
	            break;		        
	        default:
	           header("Location:?");
	    }	    
		$this->smarty->display('home/member.html');
	}	
	private function showScore(){
	    $this->smarty->assign("showScore",true);
	}
	private function show(){	    
	    $user=new userModel();	    
	    $upload=new UploadFile("pic","public/uploads/member");
	    if(isset($_POST['send'])){	        
	         $user->id=$_POST['id'];
	         $user->email=$_POST['email'];
	         if($_POST['pwd']==$_POST['newpwd']){
	             $user->pwd=$_POST['newpwd'];
	         }else{
	             $user->pwd=md5($_POST['newpwd']);
	         }
	         if(is_uploaded_file($_FILES['pic']['tmp_name'])){
	             if($upload->upload("pic")){
	                 $user->icon=$upload->getNewName();
	             }	             
	         }else {
	             $user->icon=$_POST['newpic'];
	             //echo "没有上传".$_POST['newpic'];
	         }
	         //Tools::dump($_POST);
	        if($user->updateUser()){
	            //echo "ok";
	            Tools::Redirect("会员资料修改成功",$_SERVER['HTTP_REFERER']);
	        }else if($user->updateUser()==0){
	            Tools::Redirect("会员资料没有修改",$_SERVER['HTTP_REFERER']);
	            //echo "not changed";
	        }else{
	            Tools::Redirect("会员资料修改失败",$_SERVER['HTTP_REFERER'],2);
	        }
	    }
	    $comment=new commentModel();	    
	    $article=new articleModel();
	    $product=new productModel();
	    $ask=new askModel();
	    $quiz=new quizModel();
	    if($_GET['id']){
	        $user->id=$_GET['id'];
	        $oneUser=$user->getOneUserByID();	        
	        $this->smarty->assign("oneUser",$oneUser);
	        /////////////////////////////////
	        $comment->uid=$_GET['id'];
	        $allComments=$comment->getAllCommentsByUID();	        
	        foreach ($allComments as $key=>$value){
	            $article->id=$value->aid;
	            $oneArticle=$article->getOneArticle();
	            $value->title=$oneArticle->title;
	        }
	        $product->uid=$_GET['id'];
	        $allOrders=$product->getAllOrdersByUID();	        
	        foreach ($allOrders as $value){
	            $pids=explode(",", $value->pid);
	            $str=null;
	            foreach ($pids as $v){
	                $product->id=$v;
	                //Tools::dump($v);
	                $oneProduct=$product->getOneProduct();
	                //Tools::dump($oneProduct);
	                $str.=$oneProduct->name.",";
	            }
	            $str=rtrim($str,",");
	            //Tools::dump($str);
	            $value->pid=$str;
	            switch ($value->payed){
	                case 0:
	                    $value->payed="<span style='color:red;'>[未付]</span>";
	                    break;
	                case 1:
	                    $value->payed="<span style='color:green;'>[已付]</span>";
	            }
	            switch ($value->sent){
	                case 0:
	                    $value->sent="<span style='color:red;'>[未发货]</span>";
	                    break;
	                case 1:
	                    $value->sent="<span style='color:green;'>[已发货]</span>";
	            }
	        }
	        $ask->aid=$_GET['id'];
	        //$allAsks=$ask->getAllAskByAID();
	        //Tools::dump($allAsks);
	        //$this->smarty->assign("allAsks",$allAsks);
	        $this->smarty->assign("allOrders",$allOrders);	       
	        $this->smarty->assign("allComments",$allComments);	 
	        $quiz->uid=$_GET["id"];
	        $allScores=$quiz->getAllScoresByUID();
	        $course=new courseModel();
	        foreach ($allScores as $key=>$value){
	            $course->id=$value->cid;
	            $oneCourse=$course->getOneCourse();
	            $value->cid=$oneCourse->name;
	        }
	        $this->smarty->assign("allScores",$allScores);
	    }
	    $this->smarty->assign("show",true);
	}
}
?>