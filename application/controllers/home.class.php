<?php
class home extends Controller{
    public function index($data = array()){
        //问答
        $this->assign("AllAsk",false);
        $this->assign("askLeaderboard",false);
        //下载
        $download=new downloadModel();
        $this->assign("downloadLeaderboard",$download->getLatestDownload());
        //文章
        $article=new articleModel();
        //var_dump($article->getArticleByAttr(1,"limit 1")[0]);1为属性
        $this->assign("headline",$article->getArticleByAttr(1,"limit 1")); 
        //var_dump($article->getArticleByAttr(1,"limit 1"));
        $this->assign("recommend",$article->getArticleByAttr("2","limit 1"));
        //商品推荐
        
        //考试成绩列表
        $userLeaderboard=$this->model->getAll("examination","order by createdTime desc limit 0,5");
        //$this->dump($userLeaderboard);
        foreach ($userLeaderboard as $key=>$value){
            $oneUser=$this->model->getOne("user","where id=".$value->uid);
            $value->uid=$oneUser[0]->username;
            $oneCourse=$this->model->getOne("course","where id=".$value->cid);
            $value->cid=$oneCourse[0]->name;
        }
        $this->assign("newExam",$userLeaderboard);
        //测试
        $this->assign("allCourse",$this->model->getAll("course","where state=1 order by Rand() limit 3"));
        
        //导航
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        $this->assign("frontNav",$frontNav);
        //热门商品
		$HotProducts=$this->model->getAll("product","where state=1 order by Rand() limit 3");
		$this->assign("productRecommend",$this->model->getAll("product","where attr like '%1%' and state=1 order by id desc limit 6"));
		$this->assign("allProducts",$HotProducts);
        $this->view("home/home.html");
    }
}
?>