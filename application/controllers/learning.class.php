<?php
class learning extends Controller{
    public function showCourse(){
        $this->page($this->model->getAllTotal("course"));
        $allCourse=$this->model->getAll("course","order by id desc",$this->model->limit);
        foreach ($allCourse as $key=>$value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[否]</span>
							<a href='/learning/state/flag/show/id/".$value->id."'>显示</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[是]</span>
							<a href='/learning/state/flag/hide/id/".$value->id."'>隐藏</a>	";
            }
        }
        $this->assign("data",$allCourse);
        $this->assign("showCourse",true);
        $this->view("admin/learning.html");
    }
    public function detailJudge($data=array()){
        if($data['id']){
            $oneJudge=$this->model->getOne("judge","where id=".$data['id']);
            //$this->dump($oneJudge);
            $this->course($oneJudge[0]->course_id);
            switch ($oneJudge[0]->answer){
                case "1":
                    $one="style='display:inline'";
                    $two="style='display:none'";
                    break;
                case "0":
                    $one="style='display:none'";
                    $two="style='display:inline'";
                    break;
            }
            $this->assign("one",$one);
            $this->assign("two",$two);
            $this->assign("oneJudge",$oneJudge[0]);
        }
        $this->assign("back",$_SERVER['HTTP_REFERER']);
        $this->assign("detailJudge",true);
        $this->view('admin/learning.html');
    }
    public function addJudge(){
        if(isset($_POST['send'])){
            //$this->dump($_POST);
            $this->model->course_id=$_POST["course"];
            $this->model->question=$_POST["question"];
            $this->model->answer=$_POST["answer"];
            $this->model->tips=$_POST["tips"];
            $array=array(
                'course_id'=>$_POST["course"],
                'question'=>$_POST["question"],
                'answer'=>$_POST["answer"],
                'tips'=>$_POST["tips"],
                'addtime'=>date('Y-m-d H:i:s')
            );
            if($this->model->add('judge',$array)){
                $this->redirect("试题添加成功","/learning/showJudge");
            }else{
                $this->redirect("试题添加失败","",0);
            }
        }
        $this->course();
        $this->assign("addJudge",true);
        $this->view("admin/learning.html");
    }
    public function updateJudge($data=array()){
        if(isset($_POST['send'])){
            $array=array(
                'question'=>$_POST['question'],
                'answer'=>$_POST['answer'],
                'tips'=>$_POST['tips'],
                'course_id'=>$_POST['course']
            );
            if($this->model->update('judge',$array,"where id=".$data['id'])){
                $this->redirect("试题修改成功","/learning/showJudge");
            }else if($this->model->update('judge',$array,"where id=".$data['id'])==0){
                $this->redirect("没有修改试题","/learning/showJudge");
            }else{
                $this->redirect("试题修改失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($data['id']){
            $oneJudge=$this->model->getOne("judge","where id=".$data['id']);
            $this->course($oneJudge[0]->course_id);
            switch ($oneJudge[0]->answer){
                case "1":
                    $one="checked=checked";
                    break;
                case "0":
                    $two="checked=checked";
                    break;
            }
            $this->assign("one",$one);
            $this->assign("two",$two);
            $this->assign("oneJudge",$oneJudge[0]);
        }
        $this->assign("updateJudge",true);
        $this->view("admin/learning.html");
    }
    public function search(){
        if($_POST['type']=='choice'){
            $data=$this->model->getAll("choice","where course_id=".$_POST['kind']." and question like '%".$_POST['search']."%'");
            $this->assign("choice",true);
        }else if($_POST['type']=='judge'){
            $data=$this->model->getAll("judge","where course_id=".$_POST['kind']." and question like '%".$_POST['search']."%'");
            $this->assign("judge",true);
        }
        foreach ($data as $key=>$value){
            $oneCourse=$this->model->getOne("course","where id=".$value->course_id);
            $value->course_id=$oneCourse[0]->name;
        }
        $this->assign("data",$data);
        $this->assign("back",$_SERVER['HTTP_REFERER']);
        $this->assign("searchResult",true);
        $this->view("admin/learning.html");
    }
    public function showExam(){
        $AllCourse=$this->model->getAll("course");
        $courseStr=null;
        foreach ($AllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $kind=$courseStr;
        }else{
            $kind=$_GET['kind'];
        }
        $this->course($_GET['kind']);
        $this->page($this->model->getAllTotal('examination',"where cid in(".$kind.")"));
        $user=new userModel();
        $allExams=$this->model->getAll("examination","where cid in(".$kind.") order by id desc ",$this->model->limit);
        foreach ($allExams as $key=>$value){
            $oneUser=$this->model->getOne("user", "where id=".$value->uid);
            $value->uid=$oneUser[0]->username;
            $oneCourse=$this->model->getOne("course","where id=".$value->cid);
            $value->cid=$oneCourse[0]->name;
        }
        $this->assign('allExams',$allExams);
        $this->assign("showExam",true);
        $this->view("admin/learning.html");
    }
    public function deleteExam($data=array()){
        if($data['id']){
            if($this->model->delete("examination","where id=".$data['id'])){
                $this->redirect("试题删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("试题删除失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("showExam",true);
        $this->view("admin/learning.html");
    }
    public function showJudge(){
        $allCourse=$this->model->getAll("course");
        $courseStr=null;
        foreach ($allCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $kind=$courseStr;
        }else{
            $kind=$_GET['kind'];
        }
        $this->page($this->model->getAllTotal("judge","where course_id in(".$kind.")"),4);
        $this->course($_GET['kind']);
        $allJudges=$this->model->getAll("judge","where course_id in(".$kind.") order by id desc ",$this->model->limit);
        foreach ($allJudges as $k=>$v){
            $oneCourse=$this->model->getOne("course", "where id=".$v->course_id);
            $v->courseName=$oneCourse[0]->name;
        }
        $this->assign("allJudges",$allJudges);
        $this->assign("showJudge",true);
        $this->view("admin/learning.html");
    }
    public function updateChoice($data=array()){
        //$this->dump($_POST);
        if(isset($_POST['send'])){
            $array=array(
                'question'=>$_POST['question'],
                'a'=>$_POST['choice_a'],
                'b'=>$_POST['choice_b'],
                'c'=>$_POST['choice_c'],
                'd'=>$_POST['choice_d'],
                'answer'=>$_POST['answer'],
                'tips'=>$_POST['tips'],
                'operater'=>$_POST['operater'],
                'course_id'=>$_POST['course']
            );
            if($this->model->update("choice",$array,"where id=".$data['id'])){
                $this->redirect("试题修改成功","/learning/showChoice");
            }else if($this->model->update("choice",$array,"where id=".$data['id'])==0){
                $this->redirect("没有修改","/learning/showChoice");
            }else{
                $this->redirect("试题修改失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($data['id']){
            $oneChoice=$this->model->getOne("choice","where id=".$data['id']);
            switch ($oneChoice[0]->answer){
                case "A":
                    $this->assign("A","checked=checked");
                    break;
                case "B":
                    $this->assign("B","checked=checked");
                    break;
                case 'C':
                    $this->assign("C","checked=checked");
                    break;
                case 'D':
                    $this->assign("D","checked=checked");
                    break;
            }
            $this->assign("oneChoice",$oneChoice[0]);
            $this->course($oneChoice[0]->course_id);
        }
        $this->assign("updateChoice",true);
        $this->view("admin/learning.html");
    }
    public  function addChoice(){
        if(isset($_POST['send'])){
            $array=array(
                'course_id'=>$_POST["course"],
                'question'=>$_POST["question"],
                'a'=>$_POST["choice_a"],
                'b'=>$_POST["choice_b"],
                'c'=>$_POST["choice_c"],
                'd'=>$_POST["choice_d"],
                'answer'=>$_POST["answer"],
                'tips'=>$_POST["tips"],
                'operater'=>"jane doe",
                'addtime'=>date('Y-m-d H:i:s')
            );
            if($this->model->add("choice",$array)){
                $this->redirect("选择题添加成功","/learning/showChoice");
            }else{
                $this->redirect("选择题添加失败","/learning/addchoice",0);
            }
        }
        $this->course();
        $this->assign("addChoice",true);
        $this->view("admin/learning.html");
    }
    public function detailChoice($data=array()){
        if($data['id']){
            $oneChoice=$this->model->getOne("choice","where id=".$data['id']);
            $this->assign("oneChoice",$oneChoice[0]);
            //echo $oneChoice[0]->course_id;
            $this->course($oneChoice[0]->course_id);
        }
        $this->assign("back",$_SERVER['HTTP_REFERER']);
        $this->assign("detailChoice",true);
        $this->view("admin/learning.html");
    }
    public function showChoice($data=array()){
        //$this->dump($_GET);
        $alllCourse=$this->model->getAll("course");
        $courseStr=null;
        foreach ($alllCourse as $value){
            $courseStr.=$value->id.",";
        }
        $courseStr=rtrim($courseStr,",");
        //echo $courseStr;
        if(empty($_GET['kind'])){
            $kind=$courseStr;
        }else{
            $kind=$_GET['kind'];
        }
        $this->course($_GET['kind']);
        //$this->dump($kind);
        $this->page($this->model->getAllTotal("choice","where course_id in(".$kind.")"),4);
        $allChoices=$this->model->getAll('choice',"where course_id in(".$kind.") order by id desc ",$this->model->limit);
        foreach ($allChoices as $k=>$v){
            $oneCourse=$this->model->getOne("course","where id=".$v->course_id);
            //echo $oneCourse->name."<br>";
            $v->courseName=$oneCourse[0]->name;
        }
        //$this->dump($allChoices);
        $this->assign("allChoices",$allChoices);
        $this->assign("showChoice",true);
        $this->view("admin/learning.html");
    }
    private function course($num=0){
        $str=null;
        $alllCourse=$this->model->getAll("course");
        foreach ($alllCourse as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->assign("course",$str);
    }
    public function updateCourse($data=array()){
        $course=new courseModel();
        if(isset($_POST['send'])){
            $transfer=new Transfer(array("fieldName"=>"thumbnail","path"=>"public/uploads/course"));
            if($transfer->upload()){
                $file=$transfer->getNewFile();
            }else{
                $file=$_POST['thumbnail2'];
            }
            $array=array(
                'name'=>$_POST["name"],
                'description'=>$_POST["description"],
                'thumbnail'=>$file
            );
            if($this->model->update("course",$array,"where id=".$_POST['id'])){
                $this->redirect("课程修改成功","/learning/showCourse");
            }elseif ($course->updateCourse()==0){
                $this->redirect("没有修改课程","/learning/showCourse");
            }else{
                $this->redirect("课程修改失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($data['id']){
            $oneCourse=$this->model->getOne("course","where id=".$data['id']);
            $this->assign("oneCourse",$oneCourse[0]);
        }
        $this->assign("updateCourse",true);
        $this->view("admin/learning.html");
    }
    public function deleteCourse($data=array()){
        if($data['id']){
            $result=$this->model->delete("course", "where id=".$data['id']);
            if($result){
                $this->redirect("删除成功", "/learning/showCourse");
            }else{
                $this->redirect("删除失败", "/learning/showCourse",0);
            }
        }
        $this->assign("addCourse",true);
        $this->view("admin/learning.html");
    }
    public function addCourse(){
        if(isset($_POST['send'])){
            $transfer=new Transfer(array("fieldName"=>"thumbnail","path"=>"public/uploads/course"));
            if($transfer->upload()){
                $file=$transfer->getNewFile();
            }else{
                $file="default.jpg";
            }
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'thumbnail'=>$file,
                'state'=>1,
                'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->add("course",$array)){
                $this->redirect("课程添加成功","/learning/showCourse");
            }else{
                $this->redirect("课程添加失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("addCourse",true);
        $this->view("admin/learning.html");
    }
    public function state($data=array()){
        $this->setState($data,"course", "admin/learning.html");
    }
        
}
?>