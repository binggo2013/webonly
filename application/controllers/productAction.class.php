<?php
class productAction extends Action{
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
			case "deleteAll":
			    $this->deleteAll();
			    break;
			case "state":
			    $this->state();
			    break;
		}
		$this->smarty->display("admin/product.html");
	}
	private function deleteAll(){
	    if(isset($_POST['send'])){
	        $multiId=implode(",", $_POST['selectAll']);
	        //echo $multiId;
	        $this->model->multiId=$multiId;
	        if($this->model->deleteAllProduct()){
	            Tools::Redirect("删除成功", "?a=product&m=adminShow",1,1);
	        }else{
	            Tools::Redirect("删除失败", $_SERVER['HTTP-REFERER'],2,1);
	        }
	    }
	}
	public function show(){
	    $this->showNav();
        $allProducts=$this->model->getAllProducts(); 
        //Tools::dump($allProducts);
        $this->smarty->assign("allProducts",$allProducts);       
        $this->smarty->assign("show",true);
        $this->smarty->display("home/product_list.html");
	}
	public function adminShow(){
	    parent::page($this->model->getAllProductTotal(),5);
	    $allProducts=$this->model->getAllProducts();
	    $category=new categoryModel();
	    foreach ($allProducts as $key=>$value){
	        $category->id=$value->cid;
	        $oneCategory=$category->getOneCategory();
	        $value->cid=$oneCategory->name;
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
							<a href='?a=product&action=state&type=item&flag=show&id=".$value->id."'>显示</a>";
	                break;
	            case 1:
	                $value->state="<span style='color:green;'>[是]</span>
							<a href='?a=product&action=state&type=item&flag=hide&id=".$value->id."'>隐藏</a>	";
	                break;
	        }
	        $attrStr=rtrim($attrStr,",");
	        $value->attr=$attrStr;
	    }	    
	    $this->smarty->assign("allProducts",$allProducts);
	    $this->smarty->assign("show",true);
        $this->smarty->display("admin/product.html");
	}
	private function category($num=0){
	    $str=null;
	    $category=new categoryModel();
	    foreach ($category->getAllCategory() as $key=>$value){
	        if($num==$value->id){
	            $selected="selected='selected'";
	        }else{
	            $selected='';
	        }
	        $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
	    }
	    $this->smarty->assign("category",$str);
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
            $this->model->cid=$_POST['cid'];
            $this->model->name=$_POST['name'];
            $this->model->author=$_POST['author'];
            $this->model->price=$_POST['price'];
            $this->model->inventory=$_POST['inventory'];
            $this->model->description=$_POST['description'];
            $arrstr=implode(",", $_POST['attr']);
            $this->model->attr=$arrstr;
            $this->model->pix=$file;
            if($this->model->updateProduct()){
                Tools::Redirect("修改商品成功", "?a=product&m=adminShow",1,1);
            }else{
                Tools::Redirect("修改商品失败", "?a=product&m=adminShow",2,1);
            }
	    }
	    if($_GET["id"]){
	        $this->model->id=$_GET["id"];
	        $oneProduct=$this->model->getOneProduct();
	        $this->smarty->assign("oneProduct",$oneProduct);
	        $this->category($oneProduct->cid);
	        $arrAttr=explode(",", $oneProduct->attr);
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
	    $this->showNav();
	    if(isset($_GET['id'])){
            $this->model->id=$_GET["id"];
            $oneProduct=$this->model->getOneProduct();
            //设置默认的数量是1；
            $oneProduct->num=1;
            if(isset($_SESSION['cart'][$oneProduct->id])){
                //id号是cart下的一件商品；
                $_SESSION['cart'][$oneProduct->id]->num++;
            }else{
                //以商品的id为键名保存的对象
                $_SESSION['cart'][$oneProduct->id]=$oneProduct;
            }
            //Tools::dump($_SESSION);
            //把一件商品赋到前台；
            //Tools::dump($oneProduct);
            $this->smarty->assign("oneProduct",$oneProduct);
	    }
	    $this->smarty->assign("detail",true);
	}
	public function cart(){
	    $cart=$_SESSION['cart'];
	    $this->smarty->assign("cart",$cart);
	    /* echo "<pre>";
	     var_dump($_SESSION['cart']);
	    echo "</pre>"; */
	    $sum=0;
	    foreach ($cart as $k=>$v){
	        $sum+=($v->price*$v->num);
	    }
	    $this->smarty->assign("sum",$sum);
	    $_SESSION['sum']=$sum;
	    $this->smarty->display("home/product_list.html");
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
	        $this->model->author=$_POST['author'];
	        $this->model->price=$_POST['price'];
	        $this->model->inventory=$_POST['inventory'];
	        $this->model->cid=$_POST['cid'];
	        $this->model->attr=implode(",", $_POST['attr']);
	        $this->model->pix=$pix;
	        $this->model->description=$_POST['description'];
	        if($this->model->addProduct()){
	            Tools::Redirect("添加商品成功", "?a=product&m=adminShow");
	        }else{
	            Tools::Redirect("添加商品失败", $_SERVER['HTTP-REFERER'],2,1);
	        }
	    }
	    $this->category();
	    $this->smarty->assign("add",true);
	    $this->smarty->display("admin/product.html");
	}
	public function removeProduct(){
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
	public function update(){
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
	    header('Location:?a=product&m=cart');
	}
	public function placeOrder(){
        if($_GET['m']=="placeOrder"){
            $pList='';
            foreach ($_SESSION['cart'] as $key=>$value){
                $pList.=$value->name.",";
            }
            $pList=rtrim($pList,",");
            $orderId="order".date("Ymdhis").rand(100,999);
            $this->model->orderId=$orderId;
            $this->model->productName=$pList;
            $this->model->totalNum=$_SESSION['sum'];
            $result=$this->model->placeOrder();
            if($result){
                unset($_SESSION['cart']);
                //echo "提交订单成功";
                Tools::Redirect("提交订单成功", "?");
            }else{
                //echo "提交订单失败";
                Tools::Redirect("提交订单失败", "?");
            }
        }
	}	
	public function course($num=0){
	    $str=null;
	    $course=new courseModel();
	    foreach ($course->getAllCourse() as $key=>$value){
	        if($num==$value->id){
	            $selected="selected='selected'";
	        }else{
	            $selected='';
	        }
	        $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
	    }
	    $this->smarty->assign("course",$str);
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
	private function state(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];			
			$switch=null;
			if($_GET['flag']=='hide'){
				$switch="hide";
			}elseif($_GET['flag']=='show'){
				$switch="show";
			}			
			if($this->model->setState($switch)){
				Tools::Redirect($switch."成功", $_SERVER['HTTP_REFERER']);
			}else{
				Tools::Redirect($switch."失败",$_SERVER['HTTP_REFERER'],2,1);
			}
		}
	}	
}
?>