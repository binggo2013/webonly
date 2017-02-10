<?php
class Controller{
    protected $smarty=null;
    protected $model=null;
    public function __construct(){
        //实例化smarty，保存在smarty属性中
        $this->smarty=Template::getInstance();
        $this->model=Model::getinstance();
        $this->setURL();
    }
    /*检测登录状态*/
    protected function checkLogin($_data){
        if (!isset($_SESSION[$_data])){
            return true;
        }
        return false;
    }
    protected function dump($_data){
		if(is_string($_data)){
			echo "<pre>";
			echo ($_data);
			echo "</pre>";
		}elseif(is_array($_data)){
			echo "<pre>";
			print_r($_data);
			echo "</pre>";
		}elseif(is_object($_data)){
			echo "<pre>";
			var_dump($_data);
			echo "</pre>";
		}else if(is_numeric($_data)||is_int($_data)||is_integer($_data)){
			echo "<pre>";
			echo ($_data);
			echo "</pre>";
		}else{
			var_dump($_data."未知的dump数据类型");
		}
	}
    protected function setURL(){
        $PHP_SELF=$_SERVER['PHP_SELF'];
        $url='http://'.$_SERVER['HTTP_HOST'].substr($PHP_SELF,0,strrpos($PHP_SELF,'/')+1);
        $this->assign('ROOT',$url);
        
    }
    protected function assign($key,$value){
        $this->smarty->assign($key,$value);
    }
    protected function view($template){
        $this->smarty->display($template);
    }
    protected function feedback($_msg){
        echo "<div class='feedback modal-content' style='width:420px;height:180px;position:absolute;left:0;right:0;margin:auto;top:0;bottom:0;z-index:9999'>
                <div class='modal-header'>操作反馈</div>
                <div class='modal-body' style=''>
                    <h2 style='margin:0;padding:0;' class='text-danger'>".$_msg."</h2>
                </div>
                <div class='modal-footer' style='margin-top:0;padding-top:10px;padding-bottom:10px;'>请仔细阅读反馈信息</div>
             </div>";
    }
    /**
	 * 重定向方法
	 * @param string $_msg要传递的信息
	 * @param string $_url要跳转的URL
	 * @param number $_flag:1是成功，0是失败;
	 * @param number $_t  */
    protected  function redirect($_msg,$_url,$_flag=1,$_t=1){
        if($_flag==1){
            $_color="green";
        }else if($_flag==0){
            $_color="red";
        }
        echo "<div class='redirect modal-content'>
                <div class='modal-header'><span class='modal-title' style='color:".$_color."'>".$_msg."</span></div>
                <div class='modal-body' style='padding-bottom:0'>
                    <dl>
                        <dd id='msg' info=".$_t." url=".$_url." flag=".$_flag.">
                            <div class='progress'>
                      <div class='progress-bar progress-bar-striped active' style='width:1%'>
                                </div>
                            </div>
                        </dd>
                        <dd id='countdown'>1%</dd>
                    </dl>
                </div>
                <div class='modal-footer'>页面跳转中，请稍后。</div>
             </div>";
        //exit();
    }
    protected function page($_total,$_listRows=5){
        $page=new Page($_total,$_listRows);
        $this->model->limit=$page->limit;
        $this->smarty->assign("page",$page->display(array(0,1,2,3,4)));
    }
    /**
     * 修剪字符串，如果有剩余字符就显示省略号。
     * @param string $_str
     * @param number $_length
     * @param string $_suffix
     * @param number $_start
     * @return string  */
    protected function subString($_str,$_length,$_suffix="...",$_start=0){
        //mb_substr();修剪多字节的字符串;
        $num=mb_strlen($_str);
        //判断修剪字符的启示值与字符长度的关系;
        if($_start<($num-1)){
            if($num<$_length){
                return mb_substr($_str, $_start,$_length,"utf8");
            }else{
                return mb_substr($_str, $_start,$_length,"utf8").$_suffix;
            }
        }elseif($_start==($num-1)){
            echo "";
        }else{
            return "<span style='color:red'>开始的索引值大于字符串的长度</span>";
        }
    }
    /**
     * 对内容过滤 <br>
     * 相应的过滤为数组、对象、字符串;
     * @param mixed $_data
     * @return mixed  */
    protected function filter($_data){
        if(is_array($_data)){
            foreach ($_data as $key=>$value){
                $str[$key]=htmlspecialchars($value);
            }
        }elseif(is_object($_data)){
            foreach ($_data as $key=>$value){
                $str->$key=htmlspecialchars($value);
            }
        }elseif(is_string($_data)){
            $str=htmlspecialchars($_data);
        }
        return $str;
    }
    /**
     * 反过滤
     * @return mixed  */
    protected function deFilter($_data){
        if(is_array($_data)){
            foreach ($_data as $key=>$value){
                $str[$key]=htmlspecialchars_decode($value);
            }
        }elseif(is_object($_data)){
            foreach ($_data as $key=>$value){
                $str->$key=htmlspecialchars_decode($value);
            }
        }elseif(is_string($_data)){
            $str=htmlspecialchars_decode($_data);
        }
        return $str;
    }
    /**
     * 判断最小值最大值
     * @param string $_data
     * @param number $_length
     * @param string $_flag
     * @return boolean  */
    protected function range($_data,$_length,$_flag){
        if($_flag=='min'){
            if(mb_strlen(trim($_data),"utf8")<$_length){
                return true;
            }
        }elseif($_flag=='max'){
            if(mb_strlen(trim($_data),"utf8")>$_length){
                return true;
            }
        }
        return false;
    }
    protected function setState($data=array(),$table,$template,$fieldName='state'){
        //$this->dump($data);
        if(isset($data['id'])){
            $oneNav=$this->model->getOne($table, "where id=".$data['id']);
            $switch=null;
            if($data['flag']=='hide'){
                $switch=0;
            }elseif($data['flag']=='show'){
                $switch=1;
            }
            $array=array(
                $fieldName=>$switch
            );
            if($this->model->update($table, $array,"where id=".$data['id'])){
                $this->redirect("成功",$_SERVER['HTTP_REFERER']);
            }else{
                $this->redirect("失败","",0);
            }
        }
        $this->view($template);
    }
}
?>