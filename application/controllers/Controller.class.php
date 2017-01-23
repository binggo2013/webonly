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
    protected static function checkLogin($_data){
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
		}else if(is_numeric($_data)){
			echo "<pre>";
			echo ($_data);
			echo "</pre>";
		}else{
			echo "dump的参数传递错误";
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
	 * @param number $_flag:1是成功，2是失败;
	 * @param number $_t  */
    protected  function redirect($_msg,$_url,$_flag=1,$_t=1){
        if($_flag==1){
            $_color="green";
        }else if($_flag==2){
            $_color="red";
        }
        echo "<div class='redirect modal-content'>
                <div class='modal-header'><span class='modal-title' style='color:".$_color."'>".$_msg."</span></div>
                <div class='modal-body' style='padding-bottom:0'>
                    <dl>
                        <dd id='msg' info=".$_t." url=".$_url.">
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
}
?>