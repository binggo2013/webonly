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
class M_Transfer{
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
    private $feedback=null;
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
    public function getFeedBack(){
        return $this->feedback;
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
    private function setNewName($_i){
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
        if($this->isRandom){
            $this->newName=date('YmdHis').rand(100,999).".".$this->type;
        }else{
            $this->newName=$this->orginalName[$_i];
        }
    }
    /**
     * 处理上传文件信息
     *   */
    private function uploadedFileInfo(){
        //处理中文文件名;
        $this->orginalName=$_FILES[$this->fieldName]['name'];
        //处理中文文件名;
        //$this->orginalName=iconv("utf-8","gb2312",$_FILES[$this->fieldName]['name']);
        //$arr=explode(".", $this->orginalName);
        //$this->type=$arr[count($arr)-1];
        $this->tmpName=$_FILES[$this->fieldName]['tmp_name'];
        $this->size=$_FILES[$this->fieldName]['size'];
        //内置的错误号;0没有错误，1-7各种错误;
        $this->errorNum=$_FILES[$this->fieldName]['error'];
        //var_dump($this->errorNum);
    }
    public function getErrorMsg(){
        return $this->errorMsg;
    }
    /**
     * 获取上传成功的文件名;
     * @return string  */
    public function getNewFile(){
        return $this->newName;
    }
    /**
     * 上传方法
     * @method upload:上传
     * @param string $_fieldName:input的name值  */
    public function upload(){
        $this->uploadedFileInfo($this->fieldName);
        //var_dump($this->orginalName);
        //var_dump($_FILES);
        //循环验证和上传
        for($i=0;$i<count($this->orginalName);$i++){
            ///////////////////////////////
            //echo $i;
            //循环着验证错误信息
            if($this->errorNum[$i]){
                $this->errorMsg=$this->throwError($this->errorNum[$i]);
                return false;
            }
            $arr=explode(".", $this->orginalName[$i]);
            $this->type=strtolower($arr[count($arr)-1]);
            //echo $this->type;
            //验证类型，正确的上传，错误的忽略；
            if(!in_array($this->type, $this->allowType)){
                $this->errorMsg.=$this->orginalName[$i].$this->throwError(8)."<br>";
                continue;
            }
            //验证大小
            if($this->size[$i]>$this->maxSize){
                $this->errorMsg.=$this->orginalName[$i].$this->throwError(9)."<br>";
                continue;
            }
            $this->setNewName($i);
            //echo $this->newName."<br>";
            if(!move_uploaded_file($this->tmpName[$i], $this->path.$this->newName)){
                continue;
            }else{
                $this->feedback.=$this->newName."<br>";
            }
            //////////////
        }
    }
}
?>