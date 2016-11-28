<?php
class orderAction extends Action{
	public function __construct(){
		parent::__construct();

	}
	public function main(){
		switch ($_GET['action']){
			case "show":
				$this->show();
				break;
			case "state":
				$this->state();
				break;
			case "sent":
				$this->sent();
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
		}
		$this->smarty->display("admin/order.html");
	}
	private function deleteAll(){
	    //Tools::dump($_POST);
	    if(isset($_POST['send'])){
	        $multiId=implode(",", $_POST['selectAll']);
	        //echo $multiId;
	        $this->model->multiId=$multiId;
	        if($this->model->deleteAllOrder()){
	            Tools::Redirect("删除成功", $_SERVER['HTTP_REFERER'],1,1);
	        }else{
	            Tools::Redirect("删除失败", $_SERVER['HTTP_REFERER'],2,1);
	        }
	    }
	}
	private function detail(){
	    $user=new userModel();
	    if(isset($_GET['id'])){
	        $this->model->id=$_GET['id'];
	        $oneOrder=$this->model->getOneOrder();
	        switch ($oneOrder->payed){
	            case 0:
	                $oneOrder->payed="<span style='color:red;'>[未付]</span>";
	                break;
	            case 1:
	                $oneOrder->payed="<span style='color:green;'>[已付]</span>";
	        }
	        switch ($oneOrder->sent){
	            case 0:
	                $oneOrder->sent="<span style='color:red;'>[未发货]</span>";
	                break;
	            case 1:
	                $oneOrder->sent="<span style='color:green;'>[已发货]</span>";
	        }
	        $user->id=$oneOrder->uid;
	        $oneUser=$user->getOneUserByID();
	        $oneOrder->username=$oneUser->username;
	        $this->smarty->assign("oneOrder",$oneOrder);	        
	    }
	    $this->smarty->assign("back",$_SERVER['HTTP_REFERER']);
	    $this->smarty->assign("detail",true);	    
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
	            Tools::Redirect($switch."失败", $_SERVER['HTTP_REFERER']);
	        }
	    }
	}
	private function sent(){
	    //Tools::dump($_GET);
	    if(isset($_GET['id'])){
	        $this->model->id=$_GET['id'];
	        $switch=null;
	        if($_GET['flag']=='hide'){
	            $switch="hide";
	        }elseif($_GET['flag']=='show'){
	            $switch="show";
	        }
	        if($this->model->setSent($switch)){
	            Tools::Redirect($switch."成功", "?a=order&action=show");
	        }else{
	            Tools::Redirect($switch."失败", "?a=order&action=show",2);
	        }
	    }
	}
	private function show(){
	    parent::page($this->model->getAllOrdersTotal(),5);
        $allOrders=$this->model->getAllOrders();
        $product=new productModel();
        foreach ($allOrders as $value){
            $pids=explode(",", $value->pid);
            $str=null;
            foreach ($pids as $v){
                $product->id=$v;
                //Tools::dump($v);
                $oneProduct=$product->getOneProduct();                
                //Tools::dump($oneProduct);
                $str.=$oneProduct->name.",";                
            }
            $str=rtrim($str,",");
            //Tools::dump($str);
            $value->pid=$str;
            switch ($value->payed){
                case 0:
                    $value->payed="<span style='color:red;'>[未付]</span>
							<a href='?a=order&action=state&flag=show&id=".$value->id."'>已付</a>";
                    break;
                case 1:
                    $value->payed="<span style='color:green;'>[已付]</span>
							<a href='?a=order&action=state&flag=hide&id=".$value->id."'>未付</a>";
            }
            switch ($value->sent){
                case 0:
                    $value->sent="<span style='color:red;'>[未发货]</span>
							<a href='?a=order&action=sent&flag=show&id=".$value->id."'>已发货</a>";
                    break;
                case 1:
                    $value->sent="<span style='color:green;'>[已发货]</span>
							<a href='?a=order&action=sent&flag=hide&id=".$value->id."'>未发货</a>";
            }
        }
        $this->smarty->assign("data",$allOrders);
        $this->smarty->assign("show",true);
	}
	public function adminShow(){
	    parent::page($this->model->getAllProductTotal(),5);
	    $allProducts=$this->model->getAllProducts();
	    $this->smarty->assign("allProducts",$allProducts);
	    $this->smarty->assign("show",true);
        $this->smarty->display("admin/product.html");
	}
	private function delete(){
		//Tools::dump($_GET);
		if(isset($_GET['id'])){
			$this->model->id=$_GET['id'];
			if($this->model->deleteOrder()){
				Tools::Redirect("删除成功",$_SERVER["HTTP_REFERER"]);
				//header("Location:?a=product&m=adminShow");
			}else{
				Tools::Redirect("删除成功",$_SERVER["HTTP_REFERER"]);
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