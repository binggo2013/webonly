<?php
class settingAction extends Action{
	public function __construct(){
		parent::__construct();
	}
	public function main(){
		switch ($_GET['action']){
			case "config":
				$this->config();
				break;
			case "backup":
			    $this->backup();
			    break;
		}
	}
	private function setConfig(){
		if(isset($_POST['send'])){
			//Tools::dump($_POST);
			$data=null;
			$data.="<?php";
			$data.="\n";
			//define("SLIDER_NUM",3);
			//$data.='define(SLIDER_NUM,.''.$_POST['num'].')';
			$data.='define("SLIDER_NUM",'.$_POST['slidernum'].');';
			$data.="\n";
			$data.='define("SITE_NAME","'.$_POST['sitename'].'");';
			$data.="\n";
			$data.='define("KEY_WORDS","'.$_POST['keywords'].'");';
			$data.="\n";
			$data.='define("DESCRIPTION","'.$_POST['description'].'");';
			$data.="\n";
			$data.='define("DB_HOST","'.$_POST['host'].'");';
			$data.="\n";
			$data.='define("DB_USER","'.$_POST['user'].'");';
			$data.="\n";
			$data.='define("DB_PWD","'.$_POST['pwd'].'");';
			$data.="\n";
			$data.='define("DB_NAME","'.$_POST['dbname'].'");';
			$data.="\n";
			$data.="?>";
			//把数据写入外部的文件；
			//file_put_contents("../../configs/config.php", $data);
			if(file_put_contents("application/configs/config.php", $data)){
				Tools::Redirect("修改配置成功", "?a=admin&action=welcome");
				//$("#myModal").modal("show");
				//header("Location:setting.php");
			}else{
				Tools::Redirect("修改配置失败", $_SERVER['HTTP_REFERER']);
				//header("Location:setting.php");
			}
		}
	}
	private function config(){
		$this->setConfig();
		$this->smarty->assign("config",true);
		$this->smarty->display("admin/setting.html");
	}
	private function backup($host='localhost',$user='root',$pass='',$name='kongcms',$tables = '*'){
	        $link = mysql_connect($host,$user,$pass);
	        mysql_select_db($name,$link);
	        //get all of the tables
	        if($tables == '*'){
	            $tables = array();
	            $result = mysql_query('SHOW TABLES');
	            while($row = mysql_fetch_row($result))
	            {
	                $tables[] = $row[0];
	            }
	        }else{
	            $tables = is_array($tables) ? $tables : explode(',',$tables);
	        }

	        //cycle through
	        foreach($tables as $table) {
	            $result = mysql_query('SELECT * FROM '.$table);
	            $num_fields = mysql_num_fields($result);

	            $return.= 'DROP TABLE '.$table.';';
	            $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
	            $return.= "\n\n".$row2[1].";\n\n";
	            for ($i = 0; $i < $num_fields; $i++){
	                while($row = mysql_fetch_row($result))
	                {
				$return.= 'INSERT INTO '.$table.' VALUES(';
	    				    for($j=0; $j<$num_fields; $j++)
	    				    {
	    				    $row[$j] = addslashes($row[$j]);
	    				        $row[$j] = ereg_replace("\n","\\n",$row[$j]);
	    				            if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
	    				            if ($j<($num_fields-1)) { $return.= ','; }
	        }
	        $return.= ");\n";
	    }
	    }
	    $return.="\n\n\n";
	    }
	    //save file
	    $handle = fopen('application/database/backup/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	    fwrite($handle,$return);
	    fclose($handle);
        $this->smarty->assign("export","数据库备份成功");
	    $this->smarty->display("admin/setting.html");
	}
}
?>