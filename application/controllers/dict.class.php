<?php
class dict extends Controller{
    public function show(){
        $this->view("home/dict.html");
    }
    public function reportAdmin(){
        $this->page($this->model->getAllTotal("reportWords"));
        $AllReportWords=$this->model->getAll("reportWords","order by id desc",$this->model->limit);
        foreach ($AllReportWords as $value){
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[未处理]</span>
							<a href='/dict/state/flag/show/id/".$value->id."'>处理</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[已处理]</span>
							<a href='/dict/state/flag/hide/id/".$value->id."'>未处理</a>	";
            }
        }
        $this->assign('AllReportWords',$AllReportWords);
        //Tools::dump($this->model->getAllReportWords());
        $this->assign("reportAdmin",true);
        $this->view("admin/dict.html");
    }
    public function deleteAll(){
        if(isset($_POST['send'])){
            $multiId=implode(",", $_POST['selectAll']);
            //echo $multiId;
            if($this->model->delete("reportWords","where id in (".$multiId.")")){
                $this->redirect("多删成功","/dict/reportAdmin");
            }else{
                $this->redirect("多删失败","/dict/reportAdmin",0);
            }
        }
        $this->assign("reportAdmin",true);
        $this->view("admin/dict.html");
    }
    private function catalogue($num=0){
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
        $this->assign("catalogue",$str);
    }
    public function add(){
        $this->catalogue();
        if($_POST['send']){
            $oneEntry=$this->model->getOne('dict',"where wordname='".$_POST['wordname']."'");
            if($oneEntry){
                $this->redirect("单词已经存在", "/dict/admin",0);
            }else{
                $array=array(
                    'wordname'=>$_POST['wordname'],
                    'phonetic'=>$_POST['phonetic'],
                    'pic'=>'default.jpg',
                    'paraphrase'=>$_POST['paraphrase'],
                    'example'=>$_POST['example'],
                    'catalogue'=>$_POST['catalogue'],
                    'provider'=>$_POST['provider'],
                    'vid'=>1,
                    'date'=>date("Y-m-d H:i:s")
                );
                if($this->model->add("dict",$array)){
                    $this->redirect("单词添加成功", "/dict/admin");
                }else{
                    $this->redirect("单词添加失败", "",0);
                }
            }
        }
        $this->assign("add",true);
        $this->view("admin/dict.html");
    }
    public function state($data=array()){
        $this->setState($data,"reportWords","admin/dict.html");
    }
    public function result(){
        $json=null;
        $json.=json_encode($this->model->getAll("dict","where wordname like '%".trim($_POST['keyword'])."%' limit 10"));
        //while($data=$this->model->getSearchResult()){
        //$json.=json_encode($data).",";
        //}
        echo rtrim($json,",");
        //Tools::dump($this->model->getSearchResult());
    }
    public function admin(){
        $this->page($this->model->getAllTotal("dict"));
        $this->assign('AllEntry',$this->model->getAll("dict","order by id desc",$this->model->limit));
        $this->assign("admin",true);
        $this->view("admin/dict.html");
    }
    public function report(){
        if($_POST['send']=='report'){
            $this->model->username=$_POST['username'];
            $this->model->contact=$_POST['contact'];
            $this->model->reportWord=$_POST['reportWord'];
            $array=array(
                'provider'=>$_POST['username'],
                'contact'=>$_POST['contact'],
                'reportWord'=>$_POST['reportWord'],
                'state'=>0,
                'reportTime'=>date("Y-m-d H:i:s")
            );
            if($this->model->add("reportWords",$array)){
                echo "ok";
            }else{
                echo "failed";
            }
        }
        //Tools::dump($_POST);
    }
    public function update($data=array()){
        if($data['id']){
            $oneEntry=$this->model->getOne("dict","where id=".$data['id']);
            $this->catalogue($oneEntry[0]->catalogue);
            $this->assign("oneEntry",$oneEntry[0]);
        }
        if($_POST['send']){
            $array=array(
                'wordname'=>$_POST['wordname'],
                'phonetic'=>$_POST['phonetic'],
                'pic'=>'default.jpg',
                'paraphrase'=>$_POST['paraphrase'],
                'example'=>$_POST['example'],
                'catalogue'=>$_POST['catalogue'],
                'provider'=>$_POST['provider']
            );
            if($this->model->update("dict",$array,"where id=".$_POST['id'])){
                $this->redirect("修改成功","/dict/admin");
            }else{
                $this->redirect("修改失败","/dict/admin",0);
            }
        }
        $this->assign("update",true);
        $this->view("admin/dict.html");
    }
    public function result2(){
        $json=null;
        echo json_encode($this->model->getAll("dict","where wordname='".trim($_POST['keyword'])."' limit 1"));
    }
}
?>