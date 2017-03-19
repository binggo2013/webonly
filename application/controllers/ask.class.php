<?php
class ask extends Controller{
    private function course($num=0){
        $str=null;
        $allCourse=$this->model->getAll("course");
        foreach ($allCourse as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->assign("course",$str);
    }
    public function detail($data=array()){
        if($data['id']){
            $oneAsk=$this->model->getOne("ask","where id=".$data['id']);
            //$this->dump($oneAsk[0]);
            $this->assign("oneAsk",$oneAsk[0]);
        }
        $this->assign('detail',true);
        $this->view("home/ask.html");
    }
    /*@todo  */
    public function addResponse($data=array()){
        if(isset($_POST['send'])){
            $this->dump($_POST);
            /* $array=array(
                'cid'=>$_POST['cid'],
                'content'=>$_POST['respond'],
                'uid'=>$_POST['uid'],
                'pid'=>$_POST['id'],
                'date'=>date("Y-m-d H:i:s")
            );
            if($this->model->add("ask",$array)){
                //$this->redirect("回复成功","/home/index");
                //$this->redirect("回复成功","/ask/detail/id=".$_POST['id']);
                //header("location:?".$_SERVER['HTTP_REFERER']);
            }else{
                exit("回复失败！");
            } */
        }
        $this->assign("respond",true);
        $this->view("home/ask.html");
    }
    public function respond($data=array()){
        if(isset($_POST['send'])){
            $this->dump($_POST);
            $array=array(
             'cid'=>$_POST['cid'],
             'content'=>$_POST['respond'],
             'uid'=>$_POST['uid'],
             'pid'=>$_POST['id'],
             'cid'=>$_POST['cid'],
             'date'=>date("Y-m-d H:i:s")
             );
            if($this->model->add("ask",$array)){
                $this->redirect("回复成功","/home/index");
            }else{
                $this->redirect("回复失败","/home/index",0);
            }
        }
        $askLeaderboard=$this->model->getAll("ask","where pid=0 order by answerNum desc limit 0,7");
		$this->assign("askLeaderboard",$askLeaderboard);
        $this->assign("id",$data['id']);
        $oneTopic=$this->model->getOne("ask","where id=".$data['id']);
        $this->assign("oneTopic",$oneTopic[0]);
        $this->assign("pid",$oneTopic[0]->id);
        $this->assign("cid",$oneTopic[0]->cid);
        $this->assign("respond",true);
        $this->view("home/ask.html");
    }
    public function addTopic(){
        if(isset($_POST['send'])){
            //$this->dump($_POST);
            $array=array(
                'topic'=>$_POST['respond'],
                'uid'=>$_POST['uid'],
                'date'=>date('Y-m-d H:i:s'),
                'pid'=>0,
                'cid'=>$_POST['cid']
            );
            if($this->model->add("ask",$array)){
                $this->redirect("添加提问成功","/home/index");
            }else{
                $this->redirect("添加提问失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("showTopic",true);
        $this->view("home/ask.html");
    }
    public function showTopic(){
		$askLeaderboard=$this->model->getAll("ask","where pid=0 order by answerNum desc limit 0,7");
		$this->assign("askLeaderboard",$askLeaderboard);
        $this->course();
        $this->assign("showTopic",true);
        $this->view("home/ask.html");
    }
}
?>