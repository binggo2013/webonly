<?php
class adAction extends Action{
    /**
     * 方法初始化*/
    public function main(){
        /*检测判断是否登录，未登录直接跳转*/
        if (Tools::checkLogin("admin")){
            //echo "未登录";
            header("location:?a=user&m=login");             //未登录跳转login.html
        }
        //登入后，权限检测登入用户权限是否足够start
        //权限的id等于等级的PID
        //登入后，求出user的level_id时level的id;user/level/permission相关联
        //var_dump($_SESSION['admin']);
        $level=new levelModel();
        //根据等级名称获取一条等级数据
        $oneLevel=$level->getOneLevelByName($_SESSION['admin']->level_id)[0];
        //获取对应等级的权限
        //var_dump(explode(",",$oneLevel->pid));
        $allPermission=explode(",",$oneLevel->pid);
        $p="5";     //假设广告为5
        if (!in_array($p,$allPermission)){
            //如果不具有权限，就显示权限不足页面
            $this->smarty->display("admin/denied.html");
            exit();     //终止
        }
        //权限检测end


        $permissionStr=null;
        $permission=new permissionModel();
        $allPermission=$permission->getAllPermission();     //获取所有权限
        foreach($allPermission as $key=>$value){
            $permissionStr.=$value->id.",";
        }
        //echo rtrim($permissionStr,",");



        switch ($_GET['action']){       //地址栏传入action时
            case "add":         //并且action=add时
                $this->add();break;         //就调用这个方法
            case "show":
                $this->show();break;
            case "delete":
                $this->delete();break;
            case "update":
            $this->update();break;
            case "state":
            $this->state();break;
        }
        $this->smarty->display("admin/ad.html");
    }
    /**
     * 添加广告  */
    private function add(){
            /* 新建上传类，并赋给路径 */
            $transfer=new Transfer(array("fieldName"=>"thumbnail",'path'=>'public/uploads/ad'));
            if (isset($_POST['send'])){

                if($_POST['type']==null){
                    Tools::Redirect("添加失败,广告类型不能为空","?a=ad&action=add",0);
                    return false;
                }
                /* 判断上传是否成功 */
                if ($transfer->upload()){
                    //echo "ok";
                        $array=array(
                            "title"=>$_POST['title'],
                            "link"=>$_POST['link'],
                            "description"=>$_POST['description'],
                            "type"=>$_POST['type'],
                            "thumbnail"=>$transfer->getNewFile(),
                            "state"=>1,
                            "date"=>date("Y-m-d H:i:s")
                        );
                        
                        if ($this->model->addAd($array)){
                            Tools::Redirect("添加成功", "?a=ad&action=show");
                        }else {
                            Tools::Redirect("添加失败", "?a=ad&action=add",0);
                        } 
                }else {
                    //echo $transfer->getErrorMsg();
                    Tools::Redirect($transfer->getErrorMsg(),"?a=ad&action=add",0);
                }
            }
        $this->smarty->assign('add',true);
    }
    /**
     * 显示广告  */
    private function show(){
        /**
         * 多选，所选id全部删除  */
        if (isset($_POST['delete'])) {
            //var_dump($_POST['getAll']);         //返回array
            //print_r($_POST['getAll']);          //Array ( [0] => 127 [1] => 126 [2] => 125 [3] => 124 [4] => 121 ) 
            //echo "<br>";
            $ids=implode(",", $_POST['getAll']);
            //echo $ids;                                    //返回127,126,125,124,121
            //delete fo=rom user where id in();
            //var_dump($this->model->deleteAll($ids));      //返回int 1
            if ($this->model->deleteAll($ids)){
                //echo "ok";
                Tools::Redirect("删除成功", $_SERVER["HTTP_REFERER"]);
            }else {
                echo "failse";
            }
        }
        /**
         * 广告类型进行分类显示
         * @var unknown  */
        $value="selected=selected";     //将selected赋到静态页面
        if (empty($_GET['kind'])){
            $kind="1,2,3,4";            //传入adModel的$kind
            $this->smarty->assign("all",$value);
        }else {
            $kind=$_GET['kind'];
            switch ($kind){
                case 1:$this->smarty->assign("banner", $value);break;
                case 2:$this->smarty->assign("slider", $value);break;
                case 3:$this->smarty->assign("fullcolumn", $value);break;
                case 4:$this->smarty->assign("sidebar", $value);break;
            }
        }
        //echo $kind;
        //echo $this->model->getAdTotal();
        //实例化分页类
        $page=new Page($this->model->getAdTotal($kind));    //$kind分类赋到sql语句
        //limit传入总数据中
        $data=$this->model->getAllAd($kind,$page->limit);       //$kind广告类型进行分类显示
        
        //显示整理,重新赋值显示，便于用户查看
        foreach ($data as $key=>$value){
            //var_dump($v->type);
            //广告类型整理显示
            switch ($value->type){
                case 1:$value->type="banner广告";break;
                case 2:$value->type="slider广告";break;
                case 3:$value->type="fullcolumn广告";break;
                case 4:$value->type="sidebar广告";break;
            }
            //广告状态整理,重新赋值显示
            switch ($value->state){
                case 1:$value->state="<span style='color:green'>[显示]</span>
                    <a href='?a=ad&action=state&flag=hide&id=".$value->id."'>[隐藏]</a>";break;
                case 0:$value->state="<span style='color:red'>[隐藏]</span>
                    <a href='?a=ad&action=state&flag=show&id=".$value->id."'>[显示]</a>";break;
            }
        }
        
        //var_dump($data);
        //总数据赋给静态页面
        $this->smarty->assign("data", $data);
        //分页赋给静态页面
        $this->smarty->assign("page", $page->display());
        //把变量show设置为true
        $this->smarty->assign('show', true);
    }

    /**
     * 设置改变广告状态  */
    private function state(){
        //通过明码地址栏传值，进行判断
        if ($_GET['id']){
            if ($_GET['flag']=='show'){         //flag状态，明码地址栏
                $v=1;
            }else if ($_GET['flag']=='hide'){
                $v=0;
            }
    
            $array=array(
                "state"=>$v
            );
    
            if ($this->model->setState($array,$_GET['id'])){
                Tools::Redirect("状态修改成功", $_SERVER['HTTP_REFERER']);
            }else {
                Tools::Redirect("状态修改失败", $_SERVER['HTTP_REFERER'],0);
            }
        }
    }
    /**
     * 删除广告  */
    private function delete(){
        //var_dump($_GET);
        if ($_GET['id']){
            if ($this->model->deleteAd($_GET['id'])){
                Tools::Redirect("删除成功", "?a=ad&action=show");       //$_SERVER['HTTP_REFERER']
            }else {
                Tools::Redirect("删除失败","?a=ad&action=show" ,0);                        //$_SERVER['HTTP_REFERER']
            }
        }
    }
    /**
     * 修改
     * 修改对应单条广告  */
    private function update(){
        //上传文件类
        $transfer=new Transfer(array("fieldName"=>"thumbnail",'path'=>'public/uploads/ad'));
        //将修改过的数据提交到数据库
        if (isset($_POST['send'])){
            //判断文件是否上传成功,
            if ($transfer->upload()){   //如果图片有修改，则将新图片名赋给下面array中的$thumbnail
                $thumbnail=$transfer->getNewFile();               
            }else {     //如果图片未有修改，则将原图片赋给下面的$thumbnail2
                $thumbnail=$_POST['thumbnail2'];
            }
            
            $array=array(
                "title"=>$_POST['title'],
                "link"=>$_POST['link'],
                "description"=>$_POST['description'],
                "type"=>$_POST['type'],
                "thumbnail"=>$thumbnail     //$thumbnail新图片名
            );
            
            //判断文件是否修改成功
            if ($this->model->updateAd($array,$_GET['id'])){
                Tools::Redirect("修改成功", "?a=ad&action=show");
            }else if ($this->model->updateAd($array,$_GET['id'])==0){
                Tools::Redirect("没有任何修改","?a=ad&action=show" );         //$_SERVER['HTTP_REFERER']
            }else {
                Tools::Redirect("修改失败","?a=ad&action=update" ,0);         //$_SERVER['HTTP_REFERER']
            }
            
            
        }
        //var_dump($_POST);
        //var_dump($_GET);
        if($_GET['id']){
            //在数据库中获取对应id的数据,并保存在$oneAd
            $oneAd=$this->model->getOneAd($_GET['id'])[0];
            
            //利用$oneAd->type返回值，获取数据库广告类型，并在静态页面显示
            //echo $oneAd->type;    返回1/2/3/4
            $value="checked=checked";
            switch ($oneAd->type){
                case 1:$this->smarty->assign("banner", $value);break;
                case 2:$this->smarty->assign("slider", $value);break;
                case 3:$this->smarty->assign("fullcolumn", $value);break;
                case 4:$this->smarty->assign("sidebar", $value);break;
            }
            
            //var_dump($oneAd);
            //将对应id的数据赋给静态页面
            $this->smarty->assign("oneAd", $oneAd);
        }
        $this->smarty->assign("update", true);      //为true时，允许显示
    }
    
    
}
?>