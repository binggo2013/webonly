<?php
class installAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "step1":
				$this->step1();
				break;
			case "step2":
				$this->step2();
				break;
			case "step3":
				$this->step3();
				break;
			case "step4":
				$this->step4();
				break;
		}
		$this->smarty->display("home/install.html");
	}
	private function step1(){	
		//echo "step1";	
		$this->smarty->assign("step1",true);			
	}
	private function step2(){
		$mysqli=new mysqli("localhost",'root','');	
		$mysqli->query("set names utf8");	
		//Tools::dump($_GET);
		if($_GET['action']=='step2'){
			//导入文件，存在数组中
			$sqlFile=file("application/database/kongcms.sql");
			//Tools::dump($sqlFile);
			$sqlStr='';
			foreach ($sqlFile as $key=>$value){
				$value=trim($value);
				//echo $value."<br>";
				if($value!=''){
					if(!($value[0]=='-')){
						$sqlStr.=$value;
					}
				}
			}
			//echo $sqlStr;
			//echo "<hr>";
			/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
			//去掉  /*!./；
			$pattern="/\/\*.*?\*\/;/";			
			$newStr=preg_replace($pattern, "",$sqlStr);
			//echo $newStr;
			$newStr=rtrim($newStr,";");
			$sqls=explode(";", $newStr);
			//Tools::dump($sqls);
			$feedback='';
			 foreach ($sqls as $k=>$v){			 	
			 	//echo $v."<hr>";
				 if($mysqli->query($v)){
					$feedback.="执行".$k."成功...<br>";
				}
			}
		}
		$this->smarty->assign("feedback",$feedback);
		$this->smarty->assign("step2",true);
	}
	private function step3(){
		$mysqli=new mysqli("localhost",'root','');
		$mysqli->select_db("kongcms");
		$mysqli->query("set names utf8");				
		//Tools::dump($mysqli);
		if(isset($_POST['send'])){
			$sql="update     admin 
				  set        username='".$_POST['admin_user']."',
				             pwd='".md5($_POST['admin_pwd'])."',
					         last_ip='".$_SERVER['REMOTE_ADDR']."',
					         last_time=now(),
					         login_num=1,
					         reg_time=now()
				  where      username='admin'";
			/* $sql="insert into admin(
									username,
									pwd,
									last_ip,
									last_time,
									login_num,
									level_id,
									reg_time
					)values(
							'".$_POST['admin_user']."',
							'".md5($_POST['admin_pwd'])."',
							'".$_SERVER['REMOTE_ADDR']."',
							now(),
							1,
							3,
							now()
					)"; */
			if($mysqli->query($sql)){				
				Tools::Redirect("后台管理员添加成功","?a=install&action=step4");
			}else{
				Tools::Redirect("后台管理员添加失败","?a=install&action=step3");
			}
		}
		$this->smarty->assign("step3",true);
	}
	private function step4(){
		rename("application/database/install.php", "application/database/install.lock");
		$this->smarty->assign("step4",true);
	}	
}
?>