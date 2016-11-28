<?php
class cartAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
			case "updateProduct":
			    $this->updateProduct();
			    break;
			case "delete":
			    $this->delete();
			    break;
			case "detail":
			    $this->detail();
			    break;
			case "cart":
			    $this->cart();
			    break;
			case "removeProduct":
			    $this->removeProduct();
			    break;
			case "placeOrder":
			    $this->placeOrder();
			    break;
			case "update":
			    $this->update();
			    break;

		}
		$this->smarty->display("home/product_list.html");
	}
	public function show(){
	    $this->showNav();
        $allProducts=$this->model->getAllProducts();
        $this->smarty->assign("allProducts",$allProducts);
        $this->smarty->assign("show",true);
        $this->smarty->display("home/product_list.html");
	}
	public function adminShow(){
	    parent::page($this->model->getAllProductTotal(),5);
	    $allProducts=$this->model->getAllProducts();
	    $this->smarty->assign("allProducts",$allProducts);
	    $this->smarty->assign("show",true);
        $this->smarty->display("admin/product.html");
	}
	private function updateProduct(){
	    //Tools::dump($_POST);
	    if(isset($_POST['send'])){
            $file=null;
            if(is_uploaded_file($_FILES['pix']['tmp_name'])){
                //echo "has";
                $upload=new UploadFile("pix","public/uploads/product/");
                if($upload->upload("pix")){
                    $file=$upload->getNewName();
                }else{
                    //Tools::getBack($upload->getErrorMsg(),1);
                }
            }else{
                //echo "none";
                $file=$_POST['pix2'];
            }
            $this->model->id=$_POST['id'];
            $this->model->name=$_POST['name'];
            $this->model->price=$_POST['price'];
            $this->model->inventory=$_POST['inventory'];
            $this->model->description=$_POST['description'];
            $this->model->pix=$file;
            if($this->model->updateProduct()){
                Tools::Redirect("修改商品成功", "?a=product&m=adminShow",1,1);
            }else{
                Tools::Redirect("修改广告失败", "?a=product&m=adminShow",2,1);
            }
	    }
	    if($_GET["id"]){
	        $this->model->id=$_GET["id"];
	        $oneProduct=$this->model->getOneProduct();
	        $this->smarty->assign("oneProduct",$oneProduct);
	    }
	    $this->smarty->assign("update",true);
	}
	private function showNav(){
	    $nav=new navModel();
	    $frontNav=$nav->getFrontNav();
	    $this->smarty->assign("frontNav",$frontNav);
	    //Tools::dump($frontNav);
	}
	private function detail(){	    
	    $product=new productModel();
	    $this->smarty->assign("productRecommend",$product->getAttrArticle("recommend"));
	    $this->showNav();
	    $product=new productModel();
	    if(isset($_GET['id'])){
	        $product->id=$_GET["id"];
	        $oneProduct=$product->getOneProduct();
	        $this->smarty->assign("oneProduct",$oneProduct);
	    }	    
	    $this->smarty->assign("detail",true);
	}
	private function cart(){
	    $product=new productModel();
	    if(Tools::isSession("oneUser")){
	        Tools::Redirect("只有注册会员才可以购买","?",2,1);
	        return false;
	    }
	    if(isset($_POST['send'])){
	        $product->id=$_POST["id"];
	        $oneProduct=$product->getOneProduct();
	        $oneProduct->num=1;
	        if(isset($_SESSION['cart'][$oneProduct->id])){
	            //id号是cart下的一件商品；
	            $_SESSION['cart'][$oneProduct->id]->num++;
	        }else{
	            //以商品的id为键名保存的对象
	            $_SESSION['cart'][$oneProduct->id]=$oneProduct;
	        }
	    }
	    $cart=$_SESSION['cart'];
	    $this->smarty->assign("cart",$cart);
	    $sum=0;
	    foreach ($cart as $k=>$v){
	        $sum+=($v->price*$v->num);
	    }
	    $this->smarty->assign("sum",$sum);
	    $_SESSION['sum']=$sum;
	    //Tools::dump($_POST);
	    //Tools::dump($_SESSION);
	}
	public function add(){
	    if(isset($_POST['send'])){
	        if(is_uploaded_file($_FILES['pix']['tmp_name'])){
	            $upload=new UploadFile("pix","public/uploads/product/");
	            if($upload->upload("pix")){
	                $pix=$upload->getNewName();
	            }else{
	                Tools::getBack($upload->getErrorMsg());
	            }
	        }else{
	            $pix="product.gif";
	        }
	        $this->model->name=$_POST['name'];
	        $this->model->price=$_POST['price'];
	        $this->model->inventory=$_POST['inventory'];
	        $this->model->pix=$pix;
	        $this->model->description=$_POST['description'];
	        if($this->model->addProduct()){
	            Tools::Redirect("添加商品成功", "?a=product&m=adminShow");
	        }else{
	            Tools::getBack("添加商品失败");
	        }
	    }
	    $this->smarty->assign("add",true);
	    $this->smarty->display("admin/product.html");
	}
	private function removeProduct(){
	    if($_GET['num']=='removeOne'){
	        unset($_SESSION['cart'][$_GET['id']]);
	        //header("Location:?a=product&m=cart");
	        if(count($_SESSION['cart'])==0){
	            header("Location:?");
	        }else{
	            header("Location:?a=product&m=cart");
	        }
	    }else if($_GET['num']=='removeAll'){
	        unset($_SESSION['cart']);
	        header("Location:?");
	        //Tools::dump($_SESSION['cart']);
	    }
	}
	private function update(){
	    if($_GET['type']=='plus'){
	        $_SESSION['cart'][$_GET['id']]->num++;
	        //不能超过库存
	        if($_SESSION['cart'][$_GET['id']]->num>=$_SESSION['cart'][$_GET['id']]->inventory){
	            $_SESSION['cart'][$_GET['id']]->num=$_SESSION['cart'][$_GET['id']]->inventory;
	        }
	    }else if($_GET['type']=='minus'){
	        $_SESSION['cart'][$_GET['id']]->num--;
	        //不能小于0;
	        if($_SESSION['cart'][$_GET['id']]->num<=0){
	            $_SESSION['cart'][$_GET['id']]->num=0;
	        }
	    }
	    header('Location:?a=cart&action=cart');
	}
	private function placeOrder(){
	    $product=new productModel();
        if($_GET['action']=="placeOrder"){
            $pList='';
            foreach ($_SESSION['cart'] as $key=>$value){
                $pList.=$value->id.",";
            }
            $pList=rtrim($pList,",");
            $orderId="order".date("Ymdhis").rand(100,999);
            $product->orderId=$orderId;
            $product->pid=$pList;
            $product->totalNum=$_SESSION['sum'];
            $product->uid=$_SESSION['oneUserName']->id;
            $result=$product->placeOrder();
            if($result){
                Tools::destroySession("cart");
                Tools::destroySession("sum");
                //unset($_SESSION['cart']);
                //echo "提交订单成功";
                Tools::Redirect("提交订单成功", "?");
            }else{
                //echo "提交订单失败";
                Tools::Redirect("提交订单失败", "?");
            }
        }
	}
	public function addJudge(){
	    if(isset($_POST['send'])){
	        $this->model->question=$_POST["question"];
	        $this->model->answer=$_POST["answer"];
	        $this->model->operater="jane doe";
	        if($this->model->addJudge()){
	            Tools::Redirect("试题添加成功","?a=quiz&m=add");
	        }else{
	            echo "failed";
	        }
	    }
	    $this->smarty->assign("addJudge",true);
	    $this->smarty->display("admin/quiz.html");
	}
	/**
	 * 根据上传的是主题还是项目<br>
	 * 相应的进行跳转
	 *   */
	private function delete(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteProduct()){
				//Tools::Redirect("删除成功","?a=product&m=adminShow");
			    Tools::Redirect("ok","?a=product&m=adminShow");
				//header("Location:?a=product&m=adminShow");
			}else{
				Tools::Redirect("failed","?a=product&m=adminShow");
			}
		}
	}
	private function deleteAll(){
		//Tools::dump($_POST);
		if(isset($_POST['send'])){
			$multiId=implode(",", $_POST['selectAll']);
			//echo $multiId;
			$this->model->multiId=$multiId;
			$url=null;
			if($_GET['type']=='subject'){
				$url="?a=vote&action=showSubject";
				$ids=explode(",", $this->model->multiId);
				//Tools::dump($ids);
				foreach ($ids as $key=>$value){
					//echo $value;
					$this->model->id=$value;
					$items=$this->model->getItemById();
					if($items){
						Tools::Redirect("第".($key+1)."不为空，不能删除","?a=vote&action=showSubject");
						//exit("第".($key+1)."不为空，不能删除<br>");
					}
				}
			}else{
				$url="?a=vote&action=showItem&id=".$_GET['id'];
			}
			if($this->model->deleteAllVote()){
				Tools::Redirect("多删成功",$url);
			}else{
				Tools::Redirect("多删失败", $url,2,1);
			}
		}
	}
	private function showItem(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			//先根据id获取投票主题;
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$this->smarty->assign("oneVote",$oneVote);
			//Tools::dump($oneVote);
			parent::page($this->model->getItemByIdTotal());
			$data=$this->model->getItemById();
			foreach ($data as $value){
				//echo $value->state="hello";
				switch ($value->state){
					case 0:
						$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=vote&action=state&type=item&flag=show&id=".$value->id."'>显示</a>";
						break;
					case 1:
						$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=vote&action=state&type=item&flag=hide&id=".$value->id."'>隐藏</a>	";
						break;
				}
			}
			$this->smarty->assign('data',$data);
		}
		$this->smarty->assign("showItem",true);
	}
	private function addItem(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$this->smarty->assign("oneVote",$oneVote);
			//Tools::dump($oneVote);
			$this->model->id=$oneVote->id;
			if(isset($_POST['send'])){
				$this->model->title=$_POST['title'];
				$this->model->description=$_POST['description'];
				if($this->model->addItem()){
					////
					Tools::Redirect("添加投票项成功", "?a=vote&action=showItem&id=".$_GET['id']);
				}else{
					Tools::Redirect("添加投票项失败", "?a=vote&action=addItem&id=".$_GET['id'],2);
				}
			}
		}
		$this->smarty->assign("addItem",true);
	}
	private function state(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			$oneVote=$this->model->getOneVote();
			$switch=null;
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}
			$url="?action=showSubject";
			if($_GET['type']=='item'){
				$url="?a=vote&action=showItem&id=".$oneVote->pid;
			}
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", $url);
			}else{
				Tools::Redirect($switch."失败",$url,2);
			}
		}
	}
	private function showSubject(){
		parent::page($this->model->getAllSubjectTotal());
		//Tools::dump($this->model->getAllSubject());
		$data=$this->model->getAllSubject();
		foreach ($data as $value){
			//echo $value->state="hello";
			switch ($value->state){
				case 0:
					$value->state="<span style='color:red;'>[否]</span>
							<a href='?a=vote&action=state&flag=show&id=".$value->id."'>显示</a>";
					break;
				case 1:
					$value->state="<span style='color:green;'>[是]</span>
							<a href='?a=vote&action=state&flag=hide&id=".$value->id."'>隐藏</a>	";
					break;
			}
		}
		$this->smarty->assign("data",$data);
		$this->smarty->assign("showSubject",true);
	}
	private function addSubject(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$this->model->title=$_POST['title'];
			$this->model->description=$_POST['description'];
			if($this->model->addSubject()){
				Tools::Redirect("添加投票主题成功", "?action=showSubject");
			}else{
				Tools::getBack("添加投票主题失败");
			}
		}
		$this->smarty->assign("addSubject",true);
	}
}
?>