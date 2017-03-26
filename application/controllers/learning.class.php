<?php
class learning extends Controller{
    public function take($data=array()){
        $this->showNav();
        $oneCourse=$this->model->getOne("course", "where id=".$data['cid']);
        $this->assign("oneCourse",$oneCourse[0]);
        //显示的题目数量
        $choices=$this->model->getAll("choice","where course_id=".$data['cid']." order by Rand() limit 0,50");
        $judges=$this->model->getAll("judge","where course_id=".$data['cid']." order by Rand() limit 0,50");
        //$this->dump($oneCourse);
        $this->assign("show",true);
        $this->assign("choices",$choices);
        $this->assign("judges",$judges);
        $this->view("home/quiz.html");
    }
    public function deleteChoice($data=array()){
        $result=$this->model->delete("choice","where id=".$data['id']);
        if($result){
            $this->redirect("删除成功", "/learning/showChoice");
        }else{
            $this->redirect("删除失败", "/learning/showChoice",0);
        }
        $this->assign("showChoice",true);
        $this->view("admin/learning.html");
    }
    private function showNav(){
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        //$this->dump($frontNav);
        $this->assign("frontNav",$frontNav);
    }
    public function result($data=array()){
        $this->showNav();
        if(isset($_POST['send'])){
            $oneCourse=$this->model->getOne("course", "where id=".$_POST['cid']);
            $this->assign("oneCourse",$oneCourse[0]);
            $num=0;
            $str.="";
            $resultNum=0;
            //echo $_POST['choiceNum'];
            while($i<$_POST['choiceNum']){
                $i++;
                $num++;
                $oneChoice=$this->model->getOne("choice","where id=".$_POST['choice'.($i)]);
                if($oneChoice[0]->answer==$_POST['choice'][$_POST['choice'.($i)]]){
                    $str.="<div class='item'><dt>".$num.".".$oneChoice[0]->question;
                    $str.="<span class='glyphicon glyphicon-ok right'></span>";
                    $str.="</dt>";
                    $resultNum++;
                }else{
                    $str.="<div class='item'><dt>".$num.".".$oneChoice[0]->question;
                    $str.="<span class='glyphicon glyphicon-remove wrong'></span>";
                    $str.="</dt>";
                    if($_POST['choice'][$_POST['choice'.($i)]]!=''){
                        $str.="<dd class='failed'><b style='color:green;'>正确答案是：".$oneChoice[0]->answer."</b>，";
                        $str.="<span class='wrong'>您选择的是：".$_POST['choice'][$_POST['choice'.($i)]]."。<span></dd>";
                        $str.="<dd style='margin-bottom:3px;' class='alert alert-danger'><b style='color:red'>提示:</b>".$oneChoice[0]->tips."</dd>";
                    }else{
                        $str.="<dd class='wrong'>您未答此题</dd>";
                    }
                }
                $str.= "<dd>A.".$oneChoice[0]->a."</dd>";
                $str.= "<dd>B.".$oneChoice[0]->b."</dd>";
                $str.="<dd>C.".$oneChoice[0]->c."</dd>";
                $str.="<dd>D.".$oneChoice[0]->d."</dd></div>";
            }
            ////////judge/////////////////
            $num2=0;
            $str2.="";
            $resultNum2=0;
            //echo $_POST['choiceNum'];
            //echo $_POST['judgeNum'];
            while($j<$_POST['judgeNum']){
                $j++;
                $num2++;
                $oneJudge=$this->model->getOne("judge","where id=".$_POST['judge'.($j)]);
                if($oneJudge[0]->answer==$_POST['judge'][$_POST['judge'.($j)]]){
                    $str2.="<div class='item'><dt>".$num2.".".$oneJudge[0]->question;
                    $str2.="<span class='glyphicon glyphicon-ok right'></span>";
                    $str2.="</dt></div>";
                    $resultNum2++;
                }else{
                    $str2.="<div class='item'><dt>".$num2.".".$oneJudge[0]->question;
                    $str2.="<span class='glyphicon glyphicon-remove wrong'></span>";
                    $str2.="</dt>";
                    if($_POST['judge'][$_POST['judge'.($j)]]!=''){
                        switch($oneJudge[0]->answer){
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
                        $str2.="<dd style='margin-bottom:3px;' class='alert alert-danger'><b style='color:red'>提示:</b>".$oneJudge[0]->tips."</dd>";
                    }else{
                        $str2.="<dd class='wrong'>您未答此题</dd>";
                    }
                    $str2.= "<dd>A.正确,";
                    $str2.= "B.错误</dd></div>";
                }
            }
            //echo $_POST['cid'];
            $userLeaderboard=$this->model->getAll("examination","where cid=".$_POST['cid']." order by createdTime desc limit 0,10");
            //$allCourse=$course->getFrontCourse();
            //$this->dump($userLeaderboard);
            $this->assign("course_name", $oneCourse[0]->name);
            /* $allCourse=$this->model->getAll("course","where state=1 order by id desc"); */
            
            $arr=array();
            foreach ($userLeaderboard as $key=>$value){
                $oneUser=$this->model->getOne("user","where id=".$value->uid);
                $value->name=$oneUser[0]->username;
            }
            //Tools::dump($arr);
            $this->assign("arr",$userLeaderboard);
            $this->model->uid=$_POST['uid'];
            $this->model->cid=$_POST['cid'];
            $this->model->total=$_POST['choiceNum']+$_POST['judgeNum'];
            $this->model->ticked=count($_POST['judge'])+count($_POST['choice']);
            $this->model->rightNum=$resultNum+$resultNum2;
            //$this->model->score=$resultNum*10+$resultNum2*10;
            $this->model->score=number_format(($resultNum+$resultNum2)/($_POST['choiceNum']+$_POST['judgeNum'])*100,2);
            //$this->model->createExam();
            $array=array(
                "uid"=>$_POST['uid'],
                "cid"=>$_POST['cid'],
                "total"=>$_POST['choiceNum']+$_POST['judgeNum'],
                'ticked'=>count($_POST['judge'])+count($_POST['choice']),
                'rightNum'=>$resultNum+$resultNum2,
                'score'=>number_format(($resultNum+$resultNum2)/($_POST['choiceNum']+$_POST['judgeNum'])*100,2),
                'createdTime'=>date('Y-m-d H:i:s')
            );
            $this->model->add("examination", $array);
        }
        $this->assign("total",($_POST['choiceNum']+$_POST['judgeNum']));
        $this->assign("ticked",(count($_POST['judge'])+count($_POST['choice'])));
        $this->assign("choiceOutput",$str);
        $this->assign("judgeOutput",$str2);
        $this->assign("resultNum",$resultNum);
        $this->assign("resultNum2",$resultNum2);
        $this->assign("score",number_format(($resultNum+$resultNum2)/($_POST['choiceNum']+$_POST['judgeNum'])*100,2));
        $this->assign("result",true);
        $this->view("home/quiz.html");
    }
    public function deleteAll(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            if($this->model->delete("examination","where id in (".$multiId.")")){
                $this->redirect("多删成功","/learning/showExam");
            }else{
                $this->redirect("多删失败","",0);
            }
        }
        $this->assign("showExam",true);
        $this->view("admin/learning.html");
    }
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
    public function deleteJudge($data=array()){
        if($data['id']){
            if($this->model->delete("judge","where id=".$data['id'])){
                $this->redirect("判断题删除成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("判断题除失败",$_SERVER['HTTP_REFERER'],0);
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
            $v->question=strip_tags($v->question);
            $v->tips=strip_tags($v->tips);
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
        if($_POST['send']=='添加试题'){
            //var_dump($_POST);
            //$this->dump($_POST['send']);
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
            $v->question=strip_tags($v->question);
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