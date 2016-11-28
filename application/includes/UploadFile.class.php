<?php
/**
 * 上传类：五版;
 * 1.统一的抛错；
 *
 *  [pic] => Array
        (
            [name] => 1GQQ41545.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php7E.tmp
            [error] => 0
            [size] => 77105
        )
kongxiangrui@gmail.com
 *  */
class UploadFile {
	/**
	 * 是否开启随机文件名
	 * @var boolean  */
	private $isRandom;
	private $originalName;
	private $tmpName;
	private $errorNum;
	private $size;
	private $newName;
	private $type;
	private $filePath;
	private $allowType=array("gif",'jpg','png');
	private $allowSize=1000000100;
	private $errorMsg;
	public function __construct($_fieldName,$_filePath="uploads/",$_isRandom=true){
		$this->filePath=$_filePath;
		//echo $this->filePath;
		$this->isRandom=$_isRandom;
		$this->getFileInfo($_fieldName);
		//echo $this->originalName;
		$this->setNewName();
		//echo $this->errorMsg;
	}
	public function getErrorMsg(){
		return $this->errorMsg;
	}
	public function getNewName(){
		return $this->newName;
	}
	private function throwError($_errorNum){
			$str=null;
			switch($_errorNum){
				case 1:
					$str="上传文件超过了php.ini里的最大值";
					break;
				case 2:
					$str="上传文件超过了表单MAX_FILE_SIZE设置的最大值";
					break;
				case 3:
					$str="部分文件被上传";
					break;
				case 4:
					$str="没有文件被上传";
					break;
				case 5:
					$str="文件大小为0";
					break;
				case 6:
					$str="找不到临时文件";
					break;
				case 7:
					$str="文件写入失败";
					break;
					///////8,9是自定义错误号///////////////////
				case 8:
					$str="上传文件类型不正确";
					break;
				case 9:
					$str="上传文件超过了允许的大小";
					break;
				case 10:
					$str="未设置上传目录";
					break;
				default:
					$str="未知的错误";
			}
			return $str;
	}
	/**
	 * 设置新文件名；
	 *   */
	private function setNewName(){
		if($this->isRandom){
			$this->newName=date("YmdHis").rand(100,999).".".$this->type;
		}else{
			$this->newName=$this->originalName;
		}
	}
	/**
	 * 外部可调用的设置允许的类型<br>
	 * 外部的值可以覆盖默认值
	 * @param array $_allowType  */
	public function setAllowType($_allowType=array()){
		$this->allowType=$_allowType;
	}
	private function checkFileSize(){
		if($this->size>$this->allowSize){
			return false;
		}
		return true;
	}
	public function setAllowSize($_data){
		$this->allowSize=$_data;
	}
	/**
	 * 检测文件类型；
	 * @return boolean  */
	private function checkFileType(){
		if(!in_array($this->type,$this->allowType)){
			return false;
		}
		return true;
	}
	/**
	 * 检测路径
	 * @return boolean  */
	private function checkFilePath(){
		if(empty($this->filePath)){
			return false;
		}
		if(!file_exists($this->filePath)){
			mkdir($this->filePath);
		}
		//路径中有/就去掉/再添加/，如果没有/就添加/
		$this->filePath=rtrim($this->filePath,"/")."/";
		return true;
	}
	/**
	 * 预检测
	 *   */
	private function preCheck(){
		if($this->errorNum){
			$this->errorMsg=$this->throwError($this->errorNum);
			return false;
		}
		if(!$this->checkFilePath()){
			$this->errorMsg=$this->throwError(10);
			return false;
		}
		if(!$this->checkFileSize()){
			$this->errorMsg=$this->throwError(9);
			return false;
		}
		if(!$this->checkFileType()){
			$this->errorMsg=$this->throwError(8);
			return false;
		}
		return true;
	}
	/**
	 * 把上传文件的信息保存到类的属性中;
	 * @param string $_fieldName  */
	private function getFileInfo($_fieldName){
		$this->originalName=$_FILES[$_fieldName]['name'];
		//获取上传文件的扩展名；
		$arr=explode(".", $this->originalName);
		$this->type=$arr[count($arr)-1];
		$this->tmpName=$_FILES[$_fieldName]['tmp_name'];
		$this->errorNum=$_FILES[$_fieldName]['error'];
		$this->size=$_FILES[$_fieldName]['size'];
	}
	public function upload($_fieldName){
		//预检测通过才能进行上传
		if($this->preCheck()){
			//exit();
			if(move_uploaded_file($_FILES[$_fieldName]['tmp_name'], $this->filePath.$this->newName)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
}