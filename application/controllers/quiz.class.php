<?php
class quiz extends Controller{
    public function take($data=array()){
        $this->showNav();
        $oneCourse=$this->model->getOne("course", "where id=".$data['cid']);
        $this->assign("oneCourse",$oneCourse[0]);
        $choices=$this->model->getAll("choice","where course_id=".$data['cid']." order by Rand() limit 0,25");
        $judges=$this->model->getAll("judge","where course_id=".$data['cid']." order by Rand() limit 0,25");
        //$this->dump($oneCourse);
        $this->assign("show",true);
        $this->assign("choices",$choices);
        $this->assign("judges",$judges);
        $this->view("home/quiz.html");
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
            //$this->dump($oneCourse);
            //$user=new userModel();
            //Tools::dump($_SESSION);
            //$user->id=$_SESSION['oneUser']->id;
            //$oneUser=$user->getOneUserByID();
            //Tools::dump($oneUser);
            //$this->smarty->assign("oneUser",$oneUser);
            //$user->updateCountdown();
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
                        $str.="<dd style='margin-bottom:3px;' class='alert alert-danger'><b style='color:red'>提示:</b>".$oneChoice->tips."</dd>";
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
                        $str2.="<dd style='margin-bottom:3px;' class='alert alert-danger'><b style='color:red'>提示:</b>".$oneJudge->tips."</dd>";
                    }else{
                        $str2.="<dd class='wrong'>您未答此题</dd>";
                    }
                    $str2.= "<dd>A.正确,";
                    $str2.= "B.错误</dd></div>";
                }
            }
            //
            $userLeaderboard=$this->model->getAll("examination","order by createdTime desc limit 0,5");
            //$allCourse=$course->getFrontCourse();
            $allCourse=$this->model->getAll("course","where state=1 order by id desc");
            $arr=array();
            foreach ($allCourse as $key=>$value){
                $hotExam=$this->model->getAll("examination","where cid=".$value->id." order by createdTime desc limit 5");
                foreach ($hotExam as $k=>$v){
                    //$user->id=$v->uid;
                    //$oneUser=$user->getOneUserByID();
                    $oneUser=$this->model->getOne("user", "where id=".$v->uid);
                    $v->uid=$oneUser->username;
                }
                $arr[$value->name]=$hotExam;
            }
            //Tools::dump($arr);
            $this->assign("arr",$arr);
            $this->model->uid=$_POST['uid'];
            $this->model->cid=$_POST['cid'];
            $this->model->total=$_POST['choiceNum']+$_POST['judgeNum'];
            $this->model->ticked=count($_POST['judge'])+count($_POST['choice']);
            $this->model->rightNum=$resultNum+$resultNum2;
            //$this->model->score=$resultNum*10+$resultNum2*10;
            //$this->model->score=$resultNum+$resultNum2;
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
}
?>