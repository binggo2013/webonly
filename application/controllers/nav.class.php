<?php
class nav extends Controller{
    public function showMainNav(){
        $this->page($this->model->getAllTotal("nav","where pid=0"));
        $data=$this->model->getAll("nav","where pid=0 order by sort desc ",$this->model->limit);
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
                $url="/nav/showSubNav/id/".$oneNav->pid;
            }
            $array=array(
                'state'=>$switch
            );
            if($this->model->update("nav", $array,"where id=".$data['id'])){
                $this->redirect("成功", $url);
            }else{
                $this->feedback("失败");
            }
        }
        $this->view("admin/nav.html");
    }
}
?>