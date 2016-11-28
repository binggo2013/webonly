<?php
class learningAction extends Action{    
    public function __construct(){
        parent::__construct();
    }
    public function main(){
		switch ($_GET['action']){
		    case "updateCourse":
		        $this->updateCourse();
		        break;
		    case "showCourse":
		        $this->showCourse();
		        break;
		    case "deleteCourse":
		        $this->deleteCourse();
		        break;
		    case "addCourse":
		        $this->addCourse();
		        break;
		    case "add":
		        $this->addchoice();
		        break;
		    case "showChoice":
		        $this->showChoice();
		        break;
		    case "showExam":
		         $this->showExam();
		         break;
		    case "updateChoice":
		        $this->updateChoice();
		        break;
		    case "deleteChoice":
		        $this->deleteChoice();
		        break;
		    case "detailChoice":
		        $this->detailChoice();
		        break;
		    case "addJudge":
		        $this->addJudge();
		        break;
		    case "showJudge":
		         $this->showJudge();
		         break;
		    case "updateJudge":
		         $this->updateJudge();
		         break;
		    case "deleteJudge":
		         $this->deleteJudge();
		       break;
		    case "deleteExam":
		        $this->deleteExam();
		        break;
		    case "detailJudge":
		        $this->detailJudge();
		        break;
		    case "state":
		        $this->state();
		        break;
		    case "deleteAllChoice":
		        $this->deleteAllChoice();
		        break;
		    case "deleteAllExam":
		        $this->deleteAllExam();
		        break;
		   case "deleteAllJudge":
		        $this->deleteAllJudge();
		        break;
		   case "search":
		       $this->search();
		       break;
		}
		$this->smarty->display("admin/learning.html");
    }
    private function search(){
        //Tools::dump($_POST);
        $course=new courseModel();
        $this->model->course_id=$_POST['kind'];
        $this->model->question=$_POST['search'];
        if($_POST['type']=='choice'){            
            $data=$this->model->getSearchChoice();
            $this->smarty->assign("choice",true);
        }else if($_POST['type']=='judge'){            
            $data=$this->model->getSearchJudge();      
            $this->smarty->assign("judge",true);
        }
        foreach ($data as $key=>$value){
            $course->id=$value->course_id;
            $oneCourse=$course->getOneCourse();
            $value->course_id=$oneCourse->name;
        }
        $this->smarty->assign("data",$data);
        $this->smarty->assign("back",$_SERVER['HTTP_REFERER']);
        $this->smarty->assign("searchResult",true);
    }
    private function deleteExam(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            if($this->model->deleteOneExam()){
                Tools::Redirect("试题删除成功",$_SERVER['HTTP_REFERER']);
                //Tools::Redirect("ok",$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Redirect("failed",$_SERVER['HTTP_REFERER'],2);
            }
        }
    }
    private function deleteAllExam(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllExam()){
                Tools::Redirect("删除成功", "?a=learning&action=showExam",1,1);
            }else{
                Tools::Redirect("删除失败", $_SERVER['HTTP_REFERER'],2,1);
            }
        }
    }
    private function showExam(){
        //Tools::dump($this->model->getAllExams());
        $course=new courseModel();
        $AllCourse=$course->getAllCourse();
        $courseStr=null;
        foreach ($AllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $this->model->kind=$courseStr;
        }else{
            $this->model->kind=$_GET['kind'];
        }
        $this->course($_GET['kind']);
        parent::page($this->model->getAllExamsTotal());        
        $user=new userModel();
        $allExams=$this->model->getAllExams();
        foreach ($allExams as $key=>$value){
            $user->id=$value->uid;
            $oneUser=$user->getOneUserByID();
            $value->uid=$oneUser->username;
            $course->id=$value->cid;            
            $oneCourse=$course->getOneCourse();
            $value->cid=$oneCourse->name;
        }        
        $this->smarty->assign('allExams',$allExams);
        $this->smarty->assign("showExam",true);
    }
    private function deleteAllJudge(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllJudge()){
                Tools::Redirect("删除成功", "?a=learning&action=showJudge",1,1);
            }else{
                Tools::Redirect("删除失败", $_SERVER['HTTP_REFERER'],2,1);
            }
        }
    }
    private function deleteAllChoice(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            $this->model->multiId=$multiId;
            if($this->model->deleteAllChoice()){
                Tools::Redirect("删除成功", "?a=learning&action=showChoice",1,1);
            }else{
                Tools::Redirect("删除失败", $_SERVER['HTTP_REFERER'],2,1);
            }
        }
    }
    /**
     * 显示隐藏
     *   */
    private function state(){
        $course=new courseModel();
        //Tools::dump($_GET);
        if($_GET['id']){
            $course->id=$_GET['id'];
            $switch=null;
            if($_GET['flag']=='hide'){
                $switch="hide";
            }elseif($_GET['flag']=='show'){
                $switch="show";
            }
            if($course->setState($switch)){
                Tools::Redirect($switch."成功", "?a=learning&action=showCourse");
            }else{
                Tools::Redirect($switch."失败", "?a=learning&action=showCourse",2);
            }
        }
    }
    private function showJudge(){
        $course=new courseModel();
        $AllCourse=$course->getAllCourse();
        $courseStr=null;
        foreach ($AllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $this->model->kind=$courseStr;
        }else{
            $this->model->kind=$_GET['kind'];
        }
        parent::page($this->model->getAllJudgesTotal(),5);
        $this->course($_GET['kind']);
        $allJudges=$this->model->getAllJudges();
        foreach ($allJudges as $k=>$v){
            $course->id=$v->course_id;
            $oneCourse=$course->getOneCourse();
            //echo $oneCourse->name."<br>";
            $v->courseName=$oneCourse->name;
        }
        $this->smarty->assign("allJudges",$allJudges);
        $this->smarty->assign("showJudge",true);
    }
    private function showChoice(){
        $course=new courseModel();
        $AllCourse=$course->getAllCourse();
        $courseStr=null;
        foreach ($AllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $this->model->kind=$courseStr;
        }else{
            $this->model->kind=$_GET['kind'];
        }
        parent::page($this->model->getAllChoicesTotal(),5);
        $allChoices=$this->model->getAllChoices();
        foreach ($allChoices as $k=>$v){
            $course->id=$v->course_id;
            $oneCourse=$course->getOneCourse();
            //echo $oneCourse->name."<br>";
            $v->courseName=$oneCourse->name;
        }
        //Tools::dump($allChoices);
        $this->course($_GET['kind']);
        $this->smarty->assign("allChoices",$allChoices);
        $this->smarty->assign("show",true);
    }
    private function course($num=0){
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
    private function addJudge(){
        if(isset($_POST['send'])){
            $this->model->course_id=$_POST["course"];
            $this->model->question=$_POST["question"];
            $this->model->answer=$_POST["answer"];
            $this->model->tips=$_POST["tips"];
             if($this->model->addJudge()){
                Tools::Redirect("试题添加成功","?a=learning&action=showJudge");
            }else{
                Tools::Redirect("试题添加失败","?a=learning&action=addJudge");
            }
        }
        $this->course();
        $this->smarty->assign("addJudge",true);
    }
    private  function addchoice(){
        if(isset($_POST['send'])){
            $this->model->course_id=$_POST["course"];
            $this->model->question=$_POST["question"];
            $this->model->a=$_POST["choice_a"];
            $this->model->b=$_POST["choice_b"];
            $this->model->c=$_POST["choice_c"];
            $this->model->d=$_POST["choice_d"];
            $this->model->answer=$_POST["answer"];
            $this->model->tips=$_POST["tips"];
            $this->model->operater="jane doe";
            if($this->model->addChoice()){
                Tools::Redirect("选择题添加成功","?a=learning&action=showChoice");
            }else{
                Tools::Redirect("选择题添加失败","?a=learning&action=addchoice");
            }
        }
        $this->course();
        $this->smarty->assign("add",true);
    }
    private function deleteChoice(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            if($this->model->deleteOneChoice()){
                Tools::Redirect("试题删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Redirect("试题删除失败",$_SERVER['HTTP_REFERER']);
            }
        }
    }
    private function deleteJudge(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            if($this->model->deleteOneJudge()){
                //Tools::Redirect("试题删除成功",$_SERVER['HTTP_REFERER']);
                Tools::Redirect("ok",$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Redirect("failed",$_SERVER['HTTP_REFERER'],2);
            }
        }
    }
    private function deleteCourse(){
        $course=new courseModel();
        if($_GET['id']){
            $course->id=$_GET['id'];
            if($course->deleteCourse()){
                Tools::Redirect("课程删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                Tools::Redirect("课程删除失败",$_SERVER['HTTP_REFERER']);
            }
        }
    }
    private function addCourse(){
        $course=new courseModel();
        if(isset($_POST['send'])){
            $course->name=$_POST['name'];
            $course->description=$_POST['description'];
            if($course->addCourse()){
                Tools::Redirect("课程添加成功","?a=learning&action=showCourse");
            }else{
                exit(33);
                Tools::Redirect("课程添加失败",$_SERVER['HTTP_REFERER']);
            }
        }
        $this->smarty->assign("addCourse",true);
    }
    private function updateCourse(){
        $course=new courseModel();
        if(isset($_POST['send'])){
            $course->id=$_POST['id'];
            $course->name=$_POST["name"];
            $course->description=$_POST["description"];
            if($course->updateCourse()){
                Tools::Redirect("课程修改成功","?a=learning&action=showCourse");
            }elseif ($course->updateCourse()==0){
                Tools::Redirect("没有修改课程","?a=learning&action=showCourse");
            }else{
                Tools::Redirect("课程修改失败",$_SERVER['HTTP_REFERER']);
            }
        }
        if($_GET['id']){
            $course->id=$_GET['id'];
            $oneCourse=$course->getOneCourse();
            $this->smarty->assign("oneCourse",$oneCourse);
        }
        $this->smarty->assign("updateCourse",true);
    }
    private function showCourse(){
        $course=new courseModel();
        $page=new Page($course->getAllCourseTotal(),5);
        $course->limit=$page->limit;
        $allCourse=$course->getAllCourse();
        foreach ($allCourse as $key=>$value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[否]</span>
							<a href='?a=learning&action=state&flag=show&id=".$value->id."'>显示</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[是]</span>
							<a href='?a=learning&action=state&flag=hide&id=".$value->id."'>隐藏</a>	";
            }
        }
        $this->course();
        //Tools::dump($allCourse);
        $this->smarty->assign("num",$page->listRowsBegin());
        $this->smarty->assign("page",$page->display());
        $this->smarty->assign("data",$allCourse);
        $this->smarty->assign("showCourse",true);
    }
    private function detailJudge(){               
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneJudge=$this->model->getOneJudge();            
            $this->course($oneJudge->course_id);            
            switch ($oneJudge->answer){
                case "1":
                    $one="checked=checked";
                    break;
                case "0":
                    $two="checked=checked";
                    break;
            }            
            $this->smarty->assign("one",$one);
            $this->smarty->assign("two",$two);            
            $this->smarty->assign("oneJudge",$oneJudge);           
        }
        $this->smarty->assign("back",$_SERVER['HTTP_REFERER']);        
        $this->smarty->assign("detailJudge",true);          
    }
    private function detailChoice(){
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneChoice=$this->model->getOneChoice();
            $this->smarty->assign("oneChoice",$oneChoice);
            $this->course($oneChoice->course_id);
        }
        $this->smarty->assign("back",$_SERVER['HTTP_REFERER']);
        $this->smarty->assign("detailChoice",true);
    }
    private function updateJudge(){
        if(isset($_POST['send'])){
            $this->model->id=$_POST['id'];
            $this->model->question=$_POST['question'];
            $this->model->answer=$_POST['answer'];
            $this->model->tips=$_POST['tips'];
            $this->model->course_id=$_POST['course'];
            if($this->model->updateJudge()){
                Tools::Redirect("试题更新成功","?a=learning&action=showJudge");
            }else{
                Tools::Redirect("试题更新失败",$_SERVER['HTTP_REFERER']);
            }
        }
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneJudge=$this->model->getOneJudge();
            $this->course($oneJudge->course_id);
            switch ($oneJudge->answer){
                case "1":
                    $one="checked=checked";
                    break;
                case "0":
                    $two="checked=checked";
                    break;
            }
            $this->smarty->assign("one",$one);
            $this->smarty->assign("two",$two);
            $this->smarty->assign("oneJudge",$oneJudge);
        }
        $this->smarty->assign("updateJudge",true);
    }
    private function updateChoice(){
        if(isset($_POST['send'])){
            //Tools::dump($_POST);
            //exit();
            $this->model->id=$_POST['id'];
            $this->model->question=$_POST['question'];
            $this->model->a=$_POST['choice_a'];
            $this->model->b=$_POST['choice_b'];
            $this->model->c=$_POST['choice_c'];
            $this->model->d=$_POST['choice_d'];
            $this->model->answer=$_POST['answer'];
            $this->model->tips=$_POST['tips'];
            $this->model->operater=$_POST['operater'];
            $this->model->course_id=$_POST['course'];
            if($this->model->updateChoice()){
                 Tools::Redirect("试题更新成功","?a=learning&action=showChoice");
            }else{
                Tools::Redirect("试题更新失败",$_SERVER['HTTP_REFERER']);
            }
        }
        if($_GET['id']){
            $this->model->id=$_GET['id'];
            $oneChoice=$this->model->getOneChoice();
            switch ($oneChoice->answer){
                case "A":                    
                    $this->smarty->assign("A","checked=checked");
                    break;
                case "B":
                    $this->smarty->assign("B","checked=checked");
                    break;
                case 'C':
                    $this->smarty->assign("C","checked=checked");
                    break;
                case 'D':
                    $this->smarty->assign("D","checked=checked");
                    break;
            }
            $this->smarty->assign("oneChoice",$oneChoice);
            $this->course($oneChoice->course_id);            
        }
        $this->smarty->assign("updateChoice",true);
    }
}
?>