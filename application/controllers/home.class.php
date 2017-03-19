<?php
class home extends Controller{
    public function index($data = array()){
        //问答
        $AllAsk=$this->model->getAll("ask","where pid=0 order by id desc limit 0,3");
        //$this->dump($AllAsk);
        foreach ($AllAsk as $key=>$value){
            $oneUser=$this->model->getOne("user","where id=".$value->uid);
            $value->uid=$oneUser[0]->username;
            $value->topic=strip_tags($value->topic);
            $value->reponse_num=$this->model->getAllTotal("ask","where pid=".$value->id);
            //$this->assign(,$value->reponse_num);
        }
        $this->assign("AllAsk",$AllAsk);
        $askLeaderboard=$this->model->getAll("ask","where pid=0 order by id desc limit 0,7");
        foreach ($askLeaderboard as $k=>$v){
            $oneUser=$this->model->getOne("user","where id=".$v->uid);
            $v->topic=strip_tags($v->topic);
            $v->uid=$oneUser[0]->username;
        }
        $this->assign("askLeaderboard",$askLeaderboard);
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