<?php
/**
 * 上传类:第五版
 * 1.upload：上传文件
 * 2.is_uploaded_file是否有文件上传
 * 3.move_uploaded_file上传是否成功
 * 4.setNewName:设置上传后新的文件名;
 * 5.检测目录
 * 6.检测类型
 * 7.检测大小
 * @author OracleOAEC
 *  */
class Transfer{
    private $errorMsg;
    private $orginalName;
    private $tmpName;
    private $newName;
    private $size;
    private $type;
    private $isRandom=true;
    private $path="uploads";
    private $allowType=array("png",'jpg','jpeg','gif');
    private $maxSize=1000000;
    private $errorNum;
    private $fieldName='pic';
    /**
     * @param boolean $isRandom:随机文件名
     * @param int $maxSize:允许的最大值
     * @param string $fieldName:input的name
     * @param array  $allowType:允许上传的文件类型;
     * @param array $_parameter:上传类构造方法的参数;  */
    public function __construct($_parameter=array()){
        //数组类型，包含类的所有属性
        //var_dump(get_class_vars(get_class($this)));
        foreach ($_parameter as $key=>$value){
            //echo $key."<br>";
            //var_dump(get_class_vars(get_class($this)));
            if(array_key_exists($key,get_class_vars(get_class($this)))){
                //echo "ok";
                $this->$key=$value;
            }else{
                exit($this->throwError(12));
            }
        }
    }
    /**
     * 统一错误处理：内置错误和自定义错误结合
     * 
     * @param int $_errorNum  */
    private function throwError($_errorNum){
        $str=null;
        switch($_errorNum){
            case 1:
                $str="上传文件超过php.ini的最大值";
                break;
            case 2:
                $str="上传文件超过了表单允许的最大值";
                break;
            case 3:
                $str="上传文件不完整";
                break;
            case 4:
                $str="没有文件上传";
                break;
            case 5:
                $str="上传文件的大小为0字节";
                break;
            case 6:
                $str="临时文件没有生成";
                break;
            case 7:
                $str="文件写入失败";
                break;
            case 8:
                $str="文件类型错误";
                break;
            case 9:
                $str="文件超过了允许的最大值".$this->maxSize;
                break;
            case 10:
                $str="上传文件目录错误";
                break;
            case 11:
                $str="上传目录创建失败";
                break;
            case 12:
                $str="类的属性名错误";
                break;
            default:
                $str="未知错误";
                break;
        }
        return $str;
    }
    private function setNewName(){
        if($this->isRandom){
            $this->newName=date('YmdHis').rand(100,999).".".$this->type;
        }else{
            $this->newName=$this->orginalName;
        }
    }
    /**
     * 处理上传文件信息
     *   */
    private function uploadedFileInfo(){
        //处理中文文件名;
        //$this->orginalName=$_FILES[$_fieldName]['name'];
        //处理中文文件名;
        $this->orginalName=iconv("utf-8","gb2312",$_FILES[$this->fieldName]['name']);
        $arr=explode(".", $this->orginalName);
        $this->type=$arr[count($arr)-1];
        $this->tmpName=$_FILES[$this->fieldName]['tmp_name'];
        $this->size=$_FILES[$this->fieldName]['size'];
        //内置的错误号;0没有错误，1-7各种错误;
        $this->errorNum=$_FILES[$this->fieldName]['error'];
        //echo ($this->orginalName);
    }
    public function getErrorMsg(){
        return $this->errorMsg;
    }
    /**检测文件类型;*/
    private function checkType(){
        //echo $this->type;
        if(!in_array(strtolower($this->type),$this->allowType)){
            $this->errorMsg=$this->throwError(8);
            return false;
        }
        return true;
    }
    /**
     * 获取上传成功的文件名;
     * @return string  */
    public function getNewFile(){
        return $this->newName;
    }
    /**检测文件大小;*/
    private function checkSize(){
        if($this->size>$this->maxSize){
            $this->errorMsg=$this->throwError(9);
            return false;
        }
        return true;
    }
    private function checkPath(){
        if(empty($this->path)){
            $this->errorMsg=$this->throwError(10);
            return false;
        }
        if(!file_exists($this->path)){
            //mkdir($this->path,0777);
            if(!mkdir($this->path,0777,true)){
                //echo "failed";
                $this->errorMsg=$this->throwError(11);
            }
        }
        $this->path=rtrim($this->path,"/")."/";
        return true;
    }
    /**
     * 预检测
     * 1.上传目录检测
     * 2.检测类型
     *   */
    private function preCheck(){
        if($this->errorNum){
            $this->errorMsg=$this->throwError($this->errorNum);
            return false;
        }
        if(!$this->checkType()){
            return false;
        }
        if(!$this->checkSize()){
            return false;
        }
        if(!$this->checkPath()){
            return false;
        }
        return true;
    }
    /**
     * 上传方法
     * @method upload:上传
     * @param string $_fieldName:input的name值  */
    public function upload(){
        $this->uploadedFileInfo();
        $this->setNewName();
        if(!$this->preCheck()){
            return false;
        }
        if(is_uploaded_file($_FILES[$this->fieldName]['tmp_name'])){
            if(move_uploaded_file($_FILES[$this->fieldName]['tmp_name'], $this->path.$this->newName)){
                return true;
            }else{
                $this->errorMsg="临时文件移动失败";
            }
        }else{
           $this->errorMsg="没有文件上传"; 
        }
    }
}
?>