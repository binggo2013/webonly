<?php
/**
 * 工具类
 * final类，不能被继承
 *  */
final class Tools{
	/**
	 * 重定向方法
	 * @param string $_msg要传递的信息
	 * @param string $_url要跳转的URL
	 * @param number $_flag:1是成功，2是失败;
	 * @param number $_t  */
    public static function Redirect($_msg,$_url,$_flag=1,$_t=1){
        if($_flag==1){
            $_color="green";
        }else if($_flag==2){
            $_color="red";
        }
        echo "<div class='redirect modal-content'>
                <div class='modal-header'><span class='modal-title' style='color:".$_color."'>".$_msg."</span></div>
                <div class='modal-body body'>
                    <dl>
                        <dd id='msg' info=".$_t." url=".$_url.">
                            <div class='progress'>
                      <div class='progress-bar progress-bar-striped active' style='width:1%'>
                                </div>
                            </div>
                        </dd>
                        <dd id='countdown'></dd>
                    </dl>
                </div>
                <div class='modal-footer'>页面跳转中，请稍后。</div>
             </div>";
    }

	/**
	 * 修剪字符串，如果有剩余字符就显示省略号。
	 * @param string $_str
	 * @param number $_length
	 * @param string $_suffix
	 * @param number $_start
	 * @return string  */
	static public function subString($_str,$_length,$_suffix="...",$_start=0){
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
	static public function filter($_data){
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
	static public function deFilter($_data){
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
	 * 检测数据是否为空<br>
	 * 修剪掉空格后的字符长度为0；
	 * @param string $_data
	 * @return boolean  */
	static public function isNull($_data){
		if(mb_strlen(trim($_data),"utf8")==0){
			return true;
		}
		return false;
	}
	/**
	 * 检测数据是否是数字或数字类型的字符串
	 * @param number string number $_data
	 * @return boolean  */
	static public function isNumber($_data){
		if(!is_numeric($_data)){
			return true;
		}
		return false;
	}
	/**
	 * 检测两条数据是否相等
	 * @param string $_firstData
	 * @param string $_secondData
	 * @return boolean  */
	static public function isEqual($_firstData,$_secondData){
		if(trim($_firstData)!=trim($_secondData)){
			return true;
		}
		return false;
	}
	/**
	 * 判断最小值最大值
	 * @param string $_data
	 * @param number $_length
	 * @param string $_flag
	 * @return boolean  */
	static public function range($_data,$_length,$_flag){
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
	/**
	 * 验证邮箱
	 * @param string $_data
	 * @return boolean  */
	static public function isEmail($_data){
		$pattern="/^[a-z0-9]([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,4}([\.][a-z]{2})?$/i";
		if(!preg_match($pattern, $_data)){
			return true;
		}
		return false;
	}
	/**
	 * 检测session值是否存在
	 * @param string $_data
	 * @return boolean  */
	static public function isSession($_data){
		if(!isset($_SESSION[$_data])){
			return true;
		}
		return false;
	}
	/**
	 * 销毁session
	 * @param string $_data
	 * @return boolean  */
	static public function destroySession($_data){
		unset($_SESSION[$_data]);
		return true;
	}
	static function dump($_data){
	    if(is_numeric($_data)){
	        echo $_data;
	    }else if(is_string($_data)){
			echo "<pre>";
			var_dump($_data);
			echo "</pre>";
		}elseif(is_array($_data)){
			echo "<pre>";
			print_r($_data);
			echo "</pre>";
		}elseif(is_object($_data)){
			echo "<pre>";
			var_dump($_data);
			echo "</pre>";
		}else{
			echo "dump的参数传递错误";
		}
	}
}
?>