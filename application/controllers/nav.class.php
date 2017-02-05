<?php
class nav extends Controller{
    public function showMainNav(){
        $this->page($this->model->getAllTotal("nav","where pid=0"));
        $data=$this->model->getAll("nav","where pid=0 order by sort asc ",$this->model->limit);
        foreach ($data as $value){
            //echo $value->state="hello";
            switch ($value->state){
                case 0:
                    $value->state="<span style='color:red;'>[否]</span>
							<a href='/nav/state/type/showMainNav/flag/show/id/".$value->id."'>显示</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[是]</span>
							<a href='/nav/state/type/showMainNav/flag/hide/id/".$value->id."'>隐藏</a>	";
                    break;
            }
        }
        $this->assign("data",$data);
        $this->assign("showMainNav",true);
        if($_POST['send']=="排序"){
            if(isset($_POST['sort'])){
                foreach ($_POST['sort'] as $key=>$value){
                    $_sql.="update nav set sort=".$value." where id=".$key.";";
                }
                if($this->model->exec($_sql)){
                    $this->redirect("排序成功", $_SERVER['HTTP_REFERER']);
                }else{
                    $this->redirect("排序成功", $_SERVER['HTTP_REFERER']);
                }
            }
            //$this->view("admin/nav.html");
        }
        $this->view("admin/nav.html");
    }
    public function showSubNav($data=array()){
        //Tools::dump($_GET);
        if($data['id']){
            $oneNav=$this->model->getOne("nav","where id=".$data['id']);
            $this->assign("oneNav",$oneNav[0]);
            $this->page($this->model->getAllTotal("nav","where pid=".$data['id']));
            $data=$this->model->getAll("nav","where pid=".$data['id']." order by sort desc ",$this->model->limit);
            foreach ($data as $value){
                //echo $value->state="hello";
                switch ($value->state){
                    case 0:
                        $value->state="<span style='color:red;'>[否]</span>
							<a href='/nav/state/type/SubNav/flag/show/id/".$value->id."'>显示</a>";
                        break;
                    case 1:
                        $value->state="<span style='color:green;'>[是]</span>
							<a href='/nav/state/type/SubNav/flag/hide/id/".$value->id."'>隐藏</a>	";
                        break;
                }
            }
            //Tools::dump($AllSubNav);
            $this->assign("data",$data);
        }else{
            header("Location:".$_SERVER['HTTP_REFERER']);
        }
        $this->assign("showSubNav",true);
        $this->view("admin/nav.html");
    }
    public function update($data=array()){
        if(isset($_POST['send'])){
            $oneNav=$this->model->getOne("nav", "where id=".$data['id']);
            if($data['type']=='MainNav'){
                $url="/nav/showMainNav";
            }else if($data['type']=='SubNav'){
                $url="/nav/showSubNav/id/".$oneNav[0]->pid;
            }
            $array=array(
                'name'=>$_POST['name'],
                'url'=>$_POST['url'],
                'hasChild'=>$_POST['hasChild'],
                'description'=>$_POST['description']
            );
            if($this->model->update("nav",$array,"where id=".$data['id'])){
                $this->redirect("修改成功", $url);
            }elseif ($this->model->update("nav",$array,"where id=".$data['id'])==0){
                $this->redirect("没有修改", $url);
            }else{
                $this->redirect("修改失败",$url,0);
            }
        }
        //Tools::dump($_GET);
        if(isset($data['id'])){
            $oneNav=$this->model->getOne("nav", "where id=".$data['id']);
            switch ($oneNav[0]->hasChild){
                case 1:
                    $this->assign("yes","checked='checked'");
                    break;
                case 0:
                    $this->assign("no","checked='checked'");
                    break;
            }
            $this->assign("oneNav",$oneNav[0]);
        }
        $this->assign("update",true);
        $this->view("admin/nav.html");
    }
    public function state($data=array()){
        //$this->dump($data);
        if(isset($data['id'])){
            $oneNav=$this->model->getOne("nav", "where id=".$data['id']);
            $switch=null;
            if($data['flag']=='hide'){
                $switch=0;
            }elseif($data['flag']=='show'){
                $switch=1;
            }
            $url="/nav/showMainNav";
            if($data['type']=='SubNav'){
                $url="/nav/showSubNav/id/".$oneNav[0]->pid;
            }
            $array=array(
                'state'=>$switch
            );
            if($this->model->update("nav", $array,"where id=".$data['id'])){
                $this->redirect("成功", $url);
            }else{
                $this->redirect("失败",$url,0);
            }
        }
        $this->view("admin/nav.html");
    }
}
?>