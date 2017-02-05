<?php
class mall extends Controller{
    public function showCategory(){
        $this->page($this->model->getAllTotal('category'));
        $data=$this->model->getAll('category',"order by id desc",$this->model->limit);
        $this->assign("data",$data);
        $this->assign("showCategory",true);
        $this->view("admin/mall.html");
    }
    public function addProduct(){
        if(isset($_POST['send'])){
            if(is_uploaded_file($_FILES['pix']['tmp_name'])){
                $transfer=new Transfer(array("fieldName"=>"pix","path"=>"public/uploads/mall"));;
                if($transfer->upload()){
                    $pix=$transfer->getNewFile();
                }else{
                    $this->redirect($transfer->getErrorMsg(),"",0);
                }
            }else{
                $pix="default.jpg";
            }
            $array=array(
                'name'=>$_POST['name'],
                'author'=>$_POST['author'],
                'price'=>$_POST['price'],
                'inventory'=>$_POST['inventory'],
                'pix'=>$pix,
                'cid'=>$_POST['cid'],
                'attr'=>implode(",", $_POST['attr']),
                'state'=>1,
                'description'=>$_POST['description'],
                'addTime'=>date('Y-m-d H:i:s')
            );
            if($this->model->add('product',$array)){
                $this->redirect("添加商品成功", "/mall/showProduct");
            }else{
                $this->redirect("添加商品失败", $_SERVER['HTTP-REFERER'],0);
            }
        }
        $this->category();
        $this->assign("addProduct",true);
        $this->view("admin/mall.html");
    }
    public function updateCategory($data=array()){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description']
            );
            if($this->model->update('category',$array,"where id=".$data['id'])){
                $this->redirect("修改成功", "/mall/showCategory");
            }elseif ($this->model->update('category',$array,"where id=".$_POST['id'])==0){
                $this->redirect("没有修改分类", "/mall/showCategory");
            }else{
                $this->redirect("修改失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        if($data['id']){
            $oneCategory=$this->model->getOne("category","where id=".$data['id']);
            $this->assign("oneCategory",$oneCategory[0]);
        }
        $this->assign("updateCategory",true);
        $this->view("admin/mall.html");
    }
    public function deleteCategory($data=array()){
        if($data['id']){
            if($this->model->delete("category","where id=".$data['id'])){
                $this->redirect("删除分类成功",$_SERVER['HTTP_REFERER'],1);
            }else{
                $this->redirect("删除失败", $_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("showCategory",true);
        $this->view("admin/mall.html");
    }
    public function addCategory(){
        if(isset($_POST['send'])){
            $array=array(
                'name'=>$_POST['name'],
                'description'=>$_POST['description'],
                'date'=>date('Y-m-d H:i:s')
            );
            if($this->model->add("category",$array)){
                $this->redirect("添加成功","/mall/showCategory");
            }else{
                $this->redirect("添加失败",$_SERVER['HTTP_REFERER'],0);
            }
        }
        $this->assign("addCategory",true);
        $this->view("admin/mall.html");
    }
    private function category($num=0){
        $str=null;
        $allCategory=$this->model->getAll("category");
        foreach ($allCategory as $key=>$value){
            if($num==$value->id){
                $selected="selected='selected'";
            }else{
                $selected='';
            }
            $str.="<option value='".$value->id."' ".$selected.">".$value->name."</option>";
        }
        $this->assign("category",$str);
    }
    public function updateProduct($data=array()){
        //Tools::dump($_POST);
        if(isset($_POST['send'])){
            $oneProduct=$this->model->getOne("product","where id=".$data['id']);
            $transfer=new Transfer(array("fieldName"=>"pix","path"=>"public/uploads/mall"));
            if(is_uploaded_file($_FILES['pix']['tmp_name'])){
                if($transfer->upload()){
                    $file=$transfer->getNewFile();
                }else{
                    $this->redirect($transfer->getErrorMsg(), "",0);
                }
            }else{
                $file=$oneProduct[0]->pix;
            }
            $arrstr=implode(",", $_POST['attr']);
            $array=array(
                'cid'=>$_POST['cid'],
                'name'=>$_POST['name'],
                'price'=>$_POST['price'],
                'author'=>$_POST['author'],
                'inventory'=>$_POST['inventory'],
                'description'=>$_POST['description'],
                'attr'=>$arrstr,
                'pix'=>$file
            );
            if($this->model->update("product",$array,"where id=".$data['id'])){
                $this->redirect("修改商品成功", "/mall/showProduct",1,1);
            }else{
                $this->redirect("修改商品失败", "",0);
            }
        }
        if($data["id"]){
            $oneProduct=$this->model->getOne("product","where id=".$data['id']);
            $this->assign("oneProduct",$oneProduct[0]);
            $this->category($oneProduct[0]->cid);
            $arrAttr=explode(",", $oneProduct[0]->attr);
            foreach ($arrAttr as $value){
                switch ($value){
                    case "1":
                        $this->assign("headline","checked='checked'");
                        break;
                    case "2":
                        $this->assign("recommend","checked='checked'");
                        break;
                    case "focus":
                        $this->assign("focus","checked='checked'");
                        break;
                    case "topic":
                        $this->assign("topic","checked='checked'");
                        break;
                    case "pickup":
                        $this->assign("pickup","checked='checked'");
                        break;
                }
            }
        }
        $this->assign("updateProduct",true);
        $this->view("admin/mall.html");
    }
    private function showNav(){
        $frontNav=$this->model->getAll("nav","where pid=0 and state=1 order by sort asc limit 9");
        //$this->dump($frontNav);
        $this->assign("frontNav",$frontNav);
    }
    public function addCart(){
        if(isset($_POST['send'])){
            $oneProduct=$this->model->getOne("product","where id=".$_POST['id']);
            $oneProduct[0]->num=$_POST['amount'];
            if(isset($_SESSION['cart'][$oneProduct[0]->id])){
                //id号是cart下的一件商品；
                $_SESSION['cart'][$oneProduct[0]->id]->num++;
            }else{
                //以商品的id为键名保存的对象
                $_SESSION['cart'][$oneProduct[0]->id]=$oneProduct[0];
            }
        }
        $this->assign("addCart",true);
        $this->view("home/cart.html");
        $this->redirect("添加了商品", "/mall/showCart");
    }
    public function showCart(){
        $this->showNav();
        $cart=$_SESSION['cart'];
        //$this->dump($_SESSION);
        $this->assign("cart",$cart);
        $sum=0;
        foreach ($cart as $k=>$v){
            $sum+=($v->price*$v->num);
        }
        $this->assign("sum",$sum);
        $_SESSION['sum']=$sum;
        $this->assign("showCart",true);
        $this->view("home/cart.html");
    }
    public function productDetail($data=array()){
        $this->assign("productRecommend",$this->model->getAll("product","where attr like '%1%' and state=1 order by id desc limit 6"));
        $this->showNav();
        if(isset($data['id'])){
            $oneProduct=$this->model->getOne("product","where id=".$data['id']);
            $this->assign("oneProduct",$oneProduct[0]);
        }
        $this->assign("productDetail",true);
        $this->view("home/cart.html");
    }
    public function deleteProduct($data=array()){
        if($data['id']){
            $result=$this->model->delete("product","where id=".$data['id']);
            if($result){
                $this->redirect("删除成功", "/mall/showProduct");
            }else{
                $this->redirect("删除失败", "/mall/showProduct",0);
            }
        }
        $this->assign("showProduct",true);
        $this->view("admin/mall.html");
    }
    public function showProduct(){
        $allCategory=$this->model->getAll("category");
        $categoryStr=null;
        foreach ($allCategory as $value){
            $categoryStr.=$value->id.",";
        }
        $categoryStr=rtrim($categoryStr,",");
        //echo $levelStr;
        if(empty($_GET['kind'])){
            $kind=$categoryStr;
        }else{
            $kind=$_GET['kind'];
        }
        //$kind=1;
        $this->category($_GET['kind']);
        $this->page($this->model->getAllTotal("product","where cid in(".$kind.")"));
        $allProducts=$this->model->getAll("product","where cid in(".$kind.") order by id desc",$this->model->limit);
        foreach ($allProducts as $key=>$value){
            $oneCategory=$this->model->getOne("category","where id=".$value->cid);
            $value->cid=$oneCategory[0]->name;
            $attrArr=explode(",", $value->attr);
            $attrStr=null;
            foreach ($attrArr as $v){
                switch ($v){
                    case "1":
                        $attrStr.="头条,";
                        break;
                    case "2":
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
							<a href='/mall/state/flag/show/id/".$value->id."'>显示</a>";
                    break;
                case 1:
                    $value->state="<span style='color:green;'>[是]</span>
							<a href='/mall/state/flag/hide/id/".$value->id."'>隐藏</a>	";
                    break;
            }
            $attrStr=rtrim($attrStr,",");
            $value->attr=$attrStr;
        }
        $this->assign("allProducts",$allProducts);
        $this->assign("showProduct",true);
        $this->view("admin/mall.html");
    }
    public function state($data=array()){
        $this->setState($data,"product","admin/mall.html");
    }
}
?>