<?php
class paperAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
		}
		$this->smarty->display("home/quiz.html");
	}
	public function show(){
	    $this->showNav();
	    $quiz=new quizModel();
	    //Tools::dump($quiz->showCourse());
	    $this->smarty->assign("allCourse",$quiz->showCourse());
	    $this->smarty->assign("show",true);
        $this->smarty->display("home/paper.html");
	}
	private function showNav(){
	    $nav=new navModel();
	    $frontNav=$nav->getFrontNav();
	    $this->smarty->assign("frontNav",$frontNav);
	    //Tools::dump($frontNav);
	}
	public function add(){
	    $this->course();
	    $this->smarty->assign("add",true);
	    $this->smarty->display("admin/quiz.html");
	}
	public function addJudge(){
	    if(isset($_POST['send'])){
	        $this->model->question=$_POST["question"];
	        $this->model->answer=$_POST["answer"];
	        $this->model->operater="jane doe";
	        if($this->model->addJudge()){
	            Tools::Redirect("试题添加成功","?a=quiz&m=add");
	        }else{
	            echo "failed";
	        }
	    }
	    $this->smarty->assign("addJudge",true);
	    $this->smarty->display("admin/quiz.html");
	}
	public function course($num=0){
	    $str=null;
	    $course=new courseModel();
	    foreach ($course->getAllCourse() as $key=>$value){
	        if($num==$value->id){
	            $selected="selected='selected'";
	        }else{
	            $selected='';
	        }
	        $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
	    }
	    $this->smarty->assign("course",$str);
	}
	public function choice(){
	    Tools::dump($_POST);
	    if(isset($_POST['send'])){
	        //Tools::dump($_POST);
	        $this->model->course_id=$_POST["course"];
	        $this->model->question=$_POST["question"];
	        $this->model->a=$_POST["choice_a"];
	        $this->model->b=$_POST["choice_b"];
	        $this->model->c=$_POST["choice_c"];
	        $this->model->d=$_POST["choice_d"];
	        $this->model->answer=$_POST["answer"];
	        $this->model->operater="jane doe";
	        if($this->model->addChoice()){
	            Tools::Redirect("试题添加成功","?a=quiz&m=show");
	        }else{
	            echo "failed";
	        }
	    }
	    $this->smarty->display("admin/quiz.html");
	}
	public function result(){
	    Tools::dump($_POST);
	    $num=0;
	    $str.="";
	    $resultNum=0;
	    //echo $_POST['choiceNum'];
	    while($i<$_POST['choiceNum']){
	        $i++;
	        $num++;
	        //echo $_POST['choice'.($i)]
	        $this->model->id=$_POST['choice'.($i)];
	        //echo $this->model->id."<br>";
	         $oneChoice=$this->model->getOneChoice();
	         //Tools::dump($_POST['choice'][$i]);
	         //echo $_POST['choice'][$_POST['choice'.($i)]]."<br>";
	         if($oneChoice->answer==$_POST['choice'][$_POST['choice'.($i)]]){
	            $str.="<dt>".$num.".".$oneChoice->question;
	            $str.="<span class='glyphicon glyphicon-ok right'></span>";
	            $str.="</dt>";
	            $resultNum++;
	        }else{
	            $str.="<dt>".$num.".".$oneChoice->question;
	            $str.="<span class='glyphicon glyphicon-remove wrong'></span>";
	            $str.="</dt>";
	            if($_POST['choice'][$_POST['choice'.($i)]]!=''){
	                $str.="<dd><span class='wrong'>正确答案是：".$oneChoice->answer."</span>，";
	                $str.="<span class='wrong'>您选择的是：".$_POST['choice'][$_POST['choice'.($i)]]."。<span></dd>";
	            }else{
	                $str.="<dd class='wrong'>您未答此题</dd>";
	            }
	        }
	        $str.= "<dd>A.".$oneChoice->a."</dd>";
	        $str.= "<dd>B.".$oneChoice->b."</dd>";
	        $str.="<dd>C.".$oneChoice->c."</dd>";
	        $str.="<dd>D.".$oneChoice->d."</dd>";
	    }
        ////////judge/////////////////
	   $num2=0;
	   $str2.="";
	   $resultNum2=0;
	   //echo $_POST['choiceNum'];
	   while($j<$_POST['judgeNum']){
	       $j++;
	       $num2++;
	       //echo $_POST['choice'.($i)]
	       $this->model->id=$_POST['judge'.($j)];
	       //echo $this->model->id."<br>";
	       $oneJudge=$this->model->getOneJudge();
	       //Tools::dump($_POST['choice'][$i]);
	       //echo $_POST['choice'][$_POST['choice'.($i)]]."<br>";
	       if($oneJudge->answer==$_POST['judge'][$_POST['judge'.($j)]]){
	           $str2.="<dt>".$num2.".".$oneJudge->question;
	           $str2.="<span class='glyphicon glyphicon-ok right'></span>";
	           $str2.="</dt>";
	           $resultNum2++;
	       }else{
	           $str2.="<dt>".$num2.".".$oneJudge->question;
	           $str2.="<span class='glyphicon glyphicon-remove wrong'></span>";
	           $str2.="</dt>";
	           if($_POST['judge'][$_POST['judge'.($j)]]!=''){
	               switch($oneJudge->answer){
	                   case '1':
	                       $answer="正确";
	                       break;
	                   case "0":
	                       $answer="错误";
	               }
	               switch($_POST['judge'][$_POST['judge'.($j)]]){
	                   case '1':
	                       $answer2="正确";
	                       break;
	                   case "0":
	                       $answer2="错误";
	               }
	               $str2.="<dd><span class='wrong'>正确答案是：".$answer."</span>，";
	               $str2.="<span class='wrong'>您选择的是：".$answer2."。<span></dd>";
	           }else{
	               $str2.="<dd class='wrong'>您未答此题</dd>";
	           }
	           $str2.= "<dd>A.正确,";
	           $str2.= "B.错误</dd>";
	       }
	   }
       $this->model->total=$_POST['choiceNum']+$_POST['judgeNum'];
       $this->model->ticked=count($_POST['judge'])+count($_POST['choice']);
       $this->model->rightNum=$resultNum+$resultNum2;
       $this->model->score=$resultNum*10+$resultNum2*10;
	   $this->model->createExam();
	   $this->smarty->assign("total",($_POST['choiceNum']+$_POST['judgeNum']));
	   $this->smarty->assign("ticked",(count($_POST['judge'])+count($_POST['choice'])));
	   $this->smarty->assign("choiceOutput",$str);
	   $this->smarty->assign("judgeOutput",$str2);
	   $this->smarty->assign("resultNum",$resultNum);
	   $this->smarty->assign("resultNum2",$resultNum2);
	   $this->smarty->assign("result",true);
	   $this->smarty->display("home/quiz.html");

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
			    Tools::Redirect("删除广告成功",$_SERVER['HTTP_REFERER'],1,1);
				//header("Location:".$url);
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