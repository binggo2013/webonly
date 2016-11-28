<?php
class articleAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "add":
				$this->add();
				break;
			case "show":
				$this->show();
				break;
			case "state":
				$this->state();
				break;
			case "deleteAll":
				$this->deleteAll();
				break;
			case "delete":
				$this->delete();
				break;
			case "detail":
				$this->detail();
				break;
			case "update":
				$this->update();
				break;
		}
		//Tools::dump($_SESSION);
		/* $permission=new permissionModel();
		$data=$permission->getPID("文章管理");
		if(!strstr($_SESSION['oneAdmin']->permission,$data->pid)){
			exit("权限不够");
		} */
		$this->smarty->display("admin/article.html");
	}
	private function update(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			//Tools::dump($_FILES);
			$thumbnail=null;
			if(is_uploaded_file($_FILES['thumbnail']['tmp_name'])){
				$upload=new UploadFile("thumbnail","public/uploads/article/");
				if($upload->upload("thumbnail")){
					$thumbnail=$upload->getNewName();
				}else{
					Tools::getBack($upload->getErrorMsg());
				}
			}else{
				$thumbnail=$_POST['thumbnail2'];
			}
			///////////////////////////////////////////
			$this->model->id=$_POST['id'];
			$this->model->title=$_POST['title'];
			$this->model->lead=$_POST['lead'];
			$this->model->content=$_POST['content'];
			$this->model->author=$_POST['author'];
			$this->model->source=$_POST['source'];
			$this->model->nid=$_POST['nid'];
			$this->model->tag=$_POST['tag'];
			$arrstr=implode(",", $_POST['attr']);
			$this->model->attr=$arrstr;
			$this->model->thumbnail=$thumbnail;
			//Tools::dump($this->model);
			//exit();
			if($this->model->updateOneArticle()){
				Tools::Redirect("更新成功", "?a=article&action=show");
			}else if($this->model->updateOneArticle()==0){
			    Tools::Redirect("没有修改文章", "?a=article&action=show");
			}else{
				Tools::getBack("更新失败");
			}
		}
		if(isset($_GET["id"])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			$oneArticle=$this->model->getOneArticle();
			$arrAttr=explode(",", $oneArticle->attr);
			foreach ($arrAttr as $value){
				switch ($value){
					case "headline":
						$this->smarty->assign("headline","checked='checked'");
						break;
					case "recommend":
						$this->smarty->assign("recommend","checked='checked'");
						break;
					case "focus":
						$this->smarty->assign("focus","checked='checked'");
						break;
					case "topic":
						$this->smarty->assign("topic","checked='checked'");
						break;
					case "pickup":
						$this->smarty->assign("pickup","checked='checked'");
						break;
				}
			}
			//Tools::dump($arrAttr);
			$this->nav($oneArticle->nid);
			$this->smarty->assign("oneArticle",$oneArticle);
			//Tools::dump($oneArticle);
		}
		$this->smarty->assign("update",true);
	}
	/**
	 * 根据文章的id显示单篇文章
	 *   */
	private function detail(){
	    /* if(Tools::isSession("oneUserName")){
            Tools::Redirect("只有注册会员才可以浏览","?",2,1);
	    } */
		$nav=new navModel();
		$product=new productModel();
		if(isset($_GET['id'])&&!empty($_GET['id'])){
			//Tools::dump($_GET);
			$this->model->id=$_GET['id'];
			$this->model->updateArticle();			
			$oneArticle=$this->model->getOneArticle();			
			$product->cid=$oneArticle->cid;
			//Tools::dump($product->cid);
			//Tools::dump($product->getAllProductsByCID());			
			$this->smarty->assign("oneArticle",$oneArticle);
			$nav->id=$oneArticle->nid;
			$subNav=$nav->getOneNav();
			$this->smarty->assign("subNav",$subNav);
			$nav->id=$subNav->pid;
			$mainNav=$nav->getOneNav();
			$this->smarty->assign("mainNav",$mainNav);
			$this->smarty->assign("recommend",$product->getAllProductsByCID());
			//Tools::dump($mainNav);
		}else{
			Tools::Redirect("","home.php");
		}		
		$this->smarty->display("home/demo.html");
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteArticle()){
				Tools::Redirect("ok",$_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("failed",$_SERVER['HTTP_REFERER'],2,1);
			}
		}
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			if($this->model->deleteAllArticle()){
				Tools::Redirect("多删成功", $_SERVER['HTTP_REFERER'],1,1);
			}else{
				Tools::Redirect("多删失败", $_SERVER['HTTP_REFERER'],2,1);
			}
		}
	}
	private function state(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", $_SERVER['HTTP_REFERER']);
			}else{
				//Tools::Redirect($switch."澶辫触",$_SERVER['HTTP_REFERER'],2);
			}
		}
	}
	private function show(){
		if(Tools::isSession("username")){
			header("Location:index.php?a=admin&action=admin_login");
		}
		$nav=new navModel();
		$AllSubNav=$nav->getAllSubNav();
		//Tools::dump($AllSubNav);
		$str=null;
		foreach ($AllSubNav as $kk=>$vv){
			$str.=$vv->id.",";
		}
		$str=rtrim($str,",");
		//echo $str;
		if(empty($_GET['nid'])){
			$this->model->nid=$str;
		}else{
			$this->model->nid=$_GET['nid'];
			$this->nav($_GET['nid']);
		}
		parent::page($this->model->getAllArticleTotal(),10);
		$data=$this->model->getAllArticle();
		foreach ($data as $key=>$value){
			$nav->id=$value->nid;
			//Tools::dump($nav->getOneNav());
			$value->nid=$nav->getOneNav()->name;
			$attrArr=explode(",", $value->attr);
			$attrStr=null;
			foreach ($attrArr as $v){
				switch ($v){
					case "headline":
						$attrStr.="头条,";
						break;
					case "recommend":
						$attrStr.="推荐,";
						break;
					case "focus":
						$attrStr.="焦点,";
						break;
					case "topic":
						$attrStr.="专题";
						break;
					case "pickup":
						$attrStr.="精选";
						break;
				}
			}
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=article&action=state&type=item&flag=show&id=".$value->id."'>显示</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=article&action=state&type=item&flag=hide&id=".$value->id."'>隐藏</a>	";
					break;
			}
			$attrStr=rtrim($attrStr,",");
			$value->attr=$attrStr;
		}
		$this->nav($_GET['nid']);
		$this->smarty->assign("data",$data);
		$this->smarty->assign("show",true);
	}
	private function add(){
		//Tools::dump($_POST);
		//exit();
		//Tools::dump($_FILES);
		$thumbnail=null;
		$this->nav();
		$this->mall();
		if(isset($_POST['send'])){
			if(empty($_POST['nid'])){
				Tools::getBack("必须选择一个栏目");
			}
			if(is_uploaded_file($_FILES['thumbnail']['tmp_name'])){
				$upload=new UploadFile("thumbnail","public/uploads/article/");
				if($upload->upload("thumbnail")){
					$thumbnail=$upload->getNewName();
				}else{
					Tools::getBack($upload->getErrorMsg());
				}
			}else{
				$thumbnail="default.jpg";
			}
			//echo $thumbnail;
			$this->model->title=$_POST['title'];
			$this->model->lead=$_POST['lead'];
			$this->model->content=$_POST['content'];
			$this->model->author=$_POST['author'];
			$this->model->tag=$_POST['tag'];
			$this->model->thumbnail=$thumbnail;
			$this->model->nid=$_POST['nid'];
			$this->model->cid=$_POST['cid'];
			$this->model->source=$_POST['source'];
			$this->model->pageview=1;
			//echo implode(",", $_POST['attr']);
			$this->model->attr=implode(",", $_POST['attr']);
			if($this->model->addArticle()){			    
				Tools::Redirect("添加文章成功", "?a=article&action=show");
			}else{
				Tools::getBack("添加文章失败");
			}
		}
		$this->smarty->assign("add",true);
	}
	private function nav($num=0){
		$nav=new navModel();
		//Tools::dump($nav->getAllMainNav());
		$str=null;
		foreach ($nav->getAllMainNav() as $value){
			$nav->id=$value->id;
			$subNav=$nav->getAllSubNavById();
			$str.="<optgroup label='".$value->name."'>";
			$selected=null;
			foreach ($subNav as $v){
				if($num==$v->id){
					$selected="selected='selected'";
				}else{
					$selected="";
				}
				$str.="<option value='".$v->id."' ".$selected.">".$v->name."</option>";
			}
			$str.="<optgroup>";
		}
		$this->smarty->assign("nav",$str);
	}
	private function mall($num=0){
	    $category=new categoryModel();
	    //Tools::dump($nav->getAllProducts());
	    $str=null;
	    foreach ($category->getAllCategory() as $value){
	        //Tools::dump($value);	        
	        $selected=null;	        
	        if($num==$value->id){
	           $selected="selected='selected'";
	        }else{
	           $selected="";
	       }
	       $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";  
	    }
	    $this->smarty->assign("category",$str);
	}
}
?>