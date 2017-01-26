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
        
        //试卷
        $examination=new examinationModel();
        $userLeaderboard=$examination->getUserLeaderboard();
        $this->assign("newExam",$userLeaderboard);
        //测试
        $quiz=new quizModel();
        $this->assign("allCourse",$quiz->hotCourse());
        
        //导航
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort desc limit 9");
        $this->smarty->assign("frontNav",$frontNav);
        //热门商品
        $product=new productModel();
		$HotProducts=$product->getHotProducts();	
		$this->assign("productRecommend",$product->getHottedProducts());
		$this->assign("allProducts",$HotProducts);
        $this->view("home/home.html");
    }
}
?>