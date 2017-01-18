<?php
/*文章-方法*/
class articleAction extends Action{
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
        $p="2";     //假设文章为1
        if (!in_array($p,$allPermission)){
            //如果不具有权限，就显示权限不足页面
            $this->smarty->display("admin/denied.html");
            exit();     //终止
        }
        //权限检测end

        switch ($_GET['action']){
            case "add":
                $this->add();break;
            case "show":
                $this->show();break;
            case "delete":
                $this->delete();break;
            case "update":
                $this->update();break;
            case "state":
                $this->state();break;
        }
        $this->smarty->display("admin/article.html");
    }
    /*添加文章*/
    private function add(){
        //var_dump($_POST);
        $this->nav();           //调用nav方法
        $transfer=new Transfer(array("fieldName"=>"thumbnail","path"=>"public/uploads/article"));     //实例化，新建上传类文件，并赋路径
        if (isset($_POST['send'])){
            if($_POST['nid']==null){
                Tools::Redirect("添加失败,文章栏目不能为空","?a=article&action=add",0);
                return false;
            }
            if ($transfer->upload()){
                $array=array(                       //将数据库中数据名称导入数组
                    'title'=>$_POST['title'],
                    'author'=>$_POST['author'],
                    'tag'=>$_POST['tag'],
                    'thumbnail'=>$transfer->getNewFile(),
                    'lead'=>$_POST['lead'],
                    'source'=>$_POST['source'],
                    'content'=>$_POST['content'],
                    'state'=>1,
                    'createTime'=>date('Y-m-d H:i:s'),
                    "attr"=>implode(",",$_POST['attr']),
                    "nid"=>$_POST['nid']
                );
                if ($this->model->addArticle($array)){
                    Tools::Redirect("添加成功","?a=article&action=show");
                }else{
                    Tools::Redirect("添加失败","?a=article&action=add",0);
                }
            }else{
                Tools::Redirect($transfer->getErrorMsg(),"?a=article&action=add",0);
            }
        }
        $this->smarty->assign("add",true);
    }
    /*导航*/
    /*$nid未修改时显示栏目用途*/
    private function nav($nid=0){           //置一初始值0，是防止添加时受影响
        $nav=new navModel();        //新建并引入navModel()类
        //var_dump($nav->getAllMainNav($limit=null));
        $allMainNav=$nav->getAllMainNav($limit=null);       //获取数据库中主导航
        $str=null;
        foreach ($allMainNav as $key=>$value){      //通过循环将数据库中主导航的name，引入optgroup中
            //var_dump($value->name);
            $str.="<optgroup label='".$value->name."'>";
            //var_dump($nav->getSubNav($value->id));
            $subNav=$nav->getSubNav($value->id);             //将主导航id传给数据库中子导航的pid，获取主导航下的所有子导航
            foreach ($subNav as $k=>$v){            //通过循环将数据库中子导航的id和name，引入option中

                /*编辑修改,运用参数start*/
                if ($nid==$v->id){          //如果子id等于主id时
                    $selected="selected='selected'";    //则为选中状态
                }else{
                    $selected="";
                }
                /*编辑修改end*/            /*修改时，判断后，将$selected插入option*/
                $str.="<option value='".$v->id." '".$selected.">".$v->name."</option>";

            }
            $str.="</optgroup>";
            //var_dump($value);
        }
        $this->smarty->assign("nav",$str);          //赋到静态页面中
    }
    /*显示所有的文章*/
    private function show(){
        /*多项删除*/
        //var_dump(isset($_POST['delete']));
        if (isset($_POST['delete'])){
            //var_dump($_POST['getAll']);
            $ids=implode(",",$_POST['getAll']);
            //var_dump($imp);
            if ($this->model->deleteAllArticle($ids)){
                Tools::Redirect("删除成功","?a=article&action=show");
            }else{
                Tools::Redirect("删除失败","?a=article&action=show",0);
            }
        }

        //var_dump($this->model->getAllArticleTotal());
        //var_dump($$this->model->getAllArticle());
        $total=$this->model->getAllArticleTotal();              //获得数据库总记录数
        $page=new Page($total);

        /*整理页面栏目显示，便于用户查看，文章的nid就是子栏目的id*/
        $nav=new navModel();            //修改页面中的栏目，便于用户查看
        $allArticle=$this->model->getAllArticle($page->limit);              //获得数据库所有数据
        /*通过循环，将文章的nid传入navModel中获取相应的子导航名称*/
        foreach ($allArticle as $key=>$value){
            $oneNav=$nav->getOneNav($value->nid)[0];
            $value->nid=$oneNav->name;

            /*处理属性*/
            $attrStr=null;
            foreach (explode(",",$value->attr) as $k=>$v){
                switch ($v){
                    case "1":$attrStr.="头条,";break;
                    case "2":$attrStr.="推荐,";break;
                    case "3":$attrStr.="热门,";break;
                }
            }
            //echo rtrim($attrStr,",")."<br>";
            $value->attr=rtrim($attrStr,",");

            //文章状态整理,重新赋值显示
            switch ($value->state){
                case 1:$value->state="<span style='color:green'>[显示]</span> / 
                    <a href='?a=article&action=state&flag=hide&id=".$value->id."'>[隐藏]</a>";break;
                case 0:$value->state="<span style='color:red'>[隐藏]</span> / 
                    <a href='?a=article&action=state&flag=show&id=".$value->id."'>[显示]</a>";break;
            }
        }


        $this->smarty->assign("data",$allArticle);
        $this->smarty->assign("page",$page->display(array(0,1,2,3,4)));
        $this->smarty->assign("show",true);
    }
    //设置文章状态
    private function state(){
        //var_dump($_GET);
        if ($_GET['id']){
            if ($_GET['flag']=="show"){
                $v=1;
            }else{
                $v=0;
            }
            $array=array(
                "state"=>$v
            );
            if ($this->model->setArticleState($array,$_GET['id'])){
                Tools::Redirect("文章状态切换成功","?a=article&action=show");
            }else{
                Tools::Redirect("文章状态切换失败","?a=article&action=show",0);
            }
        }
    }

    /*删除*/
    private function delete(){
        //var_dump($_POST);
        //var_dump($this->model->deleteArticle($_GET['id']));
        if ($this->model->deleteArticle($_GET['id'])){
            Tools::Redirect("删除成功","?a=article&action=show");
        }else{
            Tools::Redirect("删除失败","?a=article&action=show",0);
        }
    }
    /*编辑修改*/
    private function update(){
        /*修改步骤：
        1.按钮获得控制器位置和方法位置及要修改的id
        2.从数据库中获取对应id的数据，并通过assign赋到静态页面中
        3.有上传图片时，新建上传类并赋路径和字段名
        4.点击提交按钮后，判断图片是否上传成功，成功后获取新文件名，未成功返回原文件名
        5.将所有修改的数据整合到数组中，并再次上传到数据库
        6.成功验证*/
        //上传文件类
        $transfer=new Transfer(array("fieldName"=>"thumbnail",'path'=>'public/uploads/article'));

       if (isset($_POST['send'])){
           if($_POST['nid']==null){
               Tools::Redirect("修改失败,文章栏目不能为空",$_SERVER["HTTP_REFERER"],0);
               return false;
           }
            //var_dump($_POST);
           //先判断文件是否再次上传成功
           if ($transfer->upload()){
               $thumbnail=$transfer->getNewFile();//将新文件名赋给$thumbnail
           }else{
               $thumbnail=$_POST['thumbnail2'];
           }

           /*创建数组，将修改后的值赋到数组中*/
           $array=array(
               'title'=>$_POST['title'],
               'tag'=>$_POST['tag'],
               'thumbnail'=>$thumbnail,
               'lead'=>$_POST['lead'],
               'author'=>$_POST['author'],
               'source'=>$_POST['source'],
               'content'=>$_POST['content'],
               "attr"=>implode(",",$_POST['attr']),
               "nid"=>$_POST['nid']
           );
           if ($this->model->updateArticle($array,$_GET['id'])){
               Tools::Redirect("修改成功","?a=article&action=show");
           }else if ($this->model->updateArticle($array,$_GET['id'])==0){
               Tools::Redirect("未有任何变动","?a=article&action=show");
           }else{
               Tools::Redirect("修改失败",$_SERVER["HTTP_REFERER"],0);
           }


        }
        //var_dump($_GET['id']);
        if ($_GET['id']){
            $updateArticle=$this->model->getOneArticle($_GET['id'])[0];
            //var_dump($updateArticle);

            /*修改栏目*/
            $this->nav($updateArticle->nid);

            //利用$oneAd->type返回值，获取数据库广告类型，并在静态页面显示
            //echo $oneAd->type;    返回1/2/3/4
            $v="checked='checked'";
            foreach (explode(",",$updateArticle->attr) as $key=>$value)
            switch ($value){
                case "1":$this->smarty->assign("attr1",$v);break;
                case "2":$this->smarty->assign("attr2",$v);break;
                case "3":$this->smarty->assign("attr3",$v);break;
                case "4":$this->smarty->assign("attr4",$v);break;
            }

            $this->smarty->assign("oneArticle",$updateArticle);
            //var_dump($updateArticle);
        }
        //var_dump($_GET);
        //var_dump($this->model->updateArticle($_GET['id'])[0]);

        $this->smarty->assign("update",true);
    }
    /*显示文章所在页面方法*/
    public function detail(){
        if ($_GET["id"]){
            $oneArticle=$this->model->getOneArticle($_GET['id'])[0];
            $this->smarty->assign("oneArticle",$oneArticle);
            /*更新用户访问量*/
            $array=array(
                "pageview"=>++$oneArticle->pageview     //每次阅读数据库，阅读量pageview自动加1
            );
            $this->model->updatePageView($array,$_GET["id"]);
            //var_dump($oneArticle);
        }
        $this->smarty->display("home/detail.html");
    }
}