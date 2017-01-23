<?php
/**
 * 分页 第七版
 * 1.地址栏传page
 * 2.$page->limit代表的是limit 0,5,
 * 3.添加了display方法，统一输出
 * 4.属性都变为私有,__set(),__get()
 * 5.handlePage()处理页数的范围
 * 6.pageList()，当前页之前和之后的页
 * 7.为first()和end()添加省略号
 * 8.setConfig修改类的属性
 * 9.统一错误处理
 * 10.display的参数是数组，参数可以为空
 * @author Kong
 *  */
class Page{
    private $limit;//代表的是sql语句中 limit 0,5,
    private $listRows;//每页显示的数据的条数
    private $page;//当前页
    private $total;
    private $pageNum;
    private $num;
    private $errorMsg;//错误信息
    private $url;
    private $config=array("prev"=>"上一页",'next'=>"下一页");
    /**
     * 实例化时传入每页的条数
     * @param int $_listRows：每页显示的条数 
     * @param int $_total:总记录数
     * */
    public function __construct($_total,$_listRows=5,$_num=2){
        $this->num=$_num;
        $this->total=$_total;
        $this->listRows=$_listRows;
        /*总页数  */
        $this->pageNum=ceil($this->total/$this->listRows);
        /*处理页数  */
        $this->handlePage();
        $this->limit=" limit ".($this->page-1)*$this->listRows.",".$this->listRows;
        $this->url=$this->rewrite();
        //echo $this->url;
    }
    /**
     * 重写URL，处理有或者没有查询字符串的情况
     *   */
    private function rewrite(){
        $newurl=null;
        //获取URL路径信息
        $url=$_SERVER['REQUEST_URI'];
        //echo $url."<br>";
        //数组array('path'=>,'query'=>)
        $parseURL=parse_url($url);
        //var_dump(parse_url($url));
        //如果有查询字符串的话
        if(isset($parseURL['query'])){
            //action=show
            //把字符串解析到数组中
            parse_str($parseURL['query'],$query);
            //var_dump($query);
            //使用分页类之前，把查询字符串中的page删掉;
            unset($query['page']);
            //var_dump($query);
            //把查询字符串中的page删掉后，重新生成新的查询字符串
            $newurl=$parseURL['path']."?".http_build_query($query);
        }else{
            //没有查询字符串的情况
            $newurl=$parseURL['path']."?";
        }
        return $newurl;
    }
    /*处理页的范围  */
    private function handlePage(){
        $this->page=!empty($_GET['page'])?$_GET['page']:1;
        if($this->page>$this->pageNum){
            $this->page=$this->pageNum;
        }
        if($this->page<1){
            $this->page=1;
        }
    }
    /**
     * 返回错误信息
     * @return string:错误信息;
     *   */
    public function getErrorMsg(){
        return $this->errorMsg;
    }
    public function __set($_key,$_value){
        $this->$_key=$_value;
    }
    public function __get($_key){
        return $this->$_key;
    }
    /**
     * 设置分页类的属性
     * 
     * @param array $_config  */
    public function setConfig($_config){
        if($_config){
            /*变量是数组类型，并且不能为空  */
            if(is_array($_config)&&count($_config)!=0){
                foreach ($_config as $_key=>$_value){
                    /*判断$_config的下标是不是$this->config的下标  */
                    if(array_key_exists($_key, $this->config)){
                        //如果是的话，就把$_value赋给$this->config
                        $this->config[$_key]=$_value;
                    }else{
                        $this->errorMsg="下标不正确";
                    }
                }
            }else{
                $this->errorMsg="变量必须是数组类型，并且不能为空";
            }
        }else{
            $this->errorMsg="setConfig参数不得为空";
        }
    }
    private function present(){
        return "<li>".$this->page."/".$this->pageNum."</li>";
    }
    /**
     * 首页
     *   */
    private function first(){
        $str=null;
        if($this->page==1){
            $str="";
        }else if($this->page>$this->num+2){
            $str="<li><a href='".$this->url."&page=1'>1</a></li><li class='ellipsis'>...</li>";
        }else if($this->page>$this->num+1){
            $str="<li><a href='".$this->url."&page=1'>1</a></li>";
        }
        return $str;
    }
    /*末页  */
    private function end(){
        $str=null;
        if($this->page==$this->pageNum){
            $str=null;
        }else if($this->pageNum-$this->page>$this->num+1){
            $str="<li class='ellipsis'>...</li><li><a href='".$this->url."&page=".($this->pageNum)."'>".($this->pageNum)."</a></li>";
        }else if($this->pageNum-$this->page>$this->num){
            $str="<li><a href='".$this->url."&page=".($this->pageNum)."'>".($this->pageNum)."</a></li>";
        }
        return $str;
    }
    /*下一页 */
    private function next(){
        $str=null;
        if($this->page==$this->pageNum){
            $str="<li class='next'>".$this->config['next']."</li>";
        }else{
            $str="<li class='next'><a href='".$this->url."&page=".($this->page+1)."'>".$this->config['next']."</a></li>";
        }
        return $str;
    }
    /* 通过循环显示页数  */
    private function pageList(){
        $prev=null;
        $next=null;
        /*循环着产生当前页的前3页  */
        for($i=$this->num;$i>=1;$i--){
            /*如果向前循环产生页面时少于剩余的页数，就忽略continue;*/
            if($this->page-$i<1){
                continue;
            }else{
                $prev.="<li><a href='".$this->url."&page=".($this->page-$i)."'>".($this->page-$i)."</a></li>";
            }
        }
        /*当前页 */
        $present="<li class='present'>".$this->page."</li>";
        for($j=1;$j<=$this->num;$j++){
            if($this->page+$j<=$this->pageNum){
                $next.="<li><a href='".$this->url."&page=".($this->page+$j)."'>".($this->page+$j)."</a></li>";
            }else{
                break;
            }
        }
        return $prev.$present.$next;
    }
    /*上一页  */
    private function prev(){
        $str=null;
        if($this->page==1){
            $str="<li class='prev'>".$this->config['prev']."</li>";
        }else{
            $str="<li class='prev'><a href='".$this->url."&page=".($this->page-1)."'>".$this->config['prev']."</a></li>";
        }
        return $str;
    }
    /* 跳转页面  */
    private function jump(){
        $str=null;
        $str="<li style='width: 15%;'><input type='number' id='pageValue' style='width: 100%;'  min=1 max=".($this->pageNum)." value=".$this->page."></li>";
        return $str;
    }
    /**
     * 下拉选择 
     * 模仿pageList的循环;
     *  */
    private function select(){
        $str=null;
        $str="<li><select id='pageSelect'>";
        for($i=$this->num*2;$i>=1;$i--){
            if($this->page-$i<1){
                continue;
            }else{
                $str.="<option value=".($this->page-$i).">".($this->page-$i)."/".($this->pageNum)."</option>";
            }
        }
        for($j=0;$j<=$this->num*2;$j++){
            if($this->page+$j<=$this->pageNum){
                if($this->page==($this->page+$j)){
                    $str.="<option value=".($this->page+$j)." selected>".($this->page+$j)."/".($this->pageNum)."</option>";
                }else{
                    $str.="<option value=".($this->page+$j).">".($this->page+$j)."/".($this->pageNum)."</option>";
                }
            }else{
                break;
            }
        }
        $str.="</select></li>";
        return $str;
    }
    /**
     * 显示分页信息;
     * @param array $_data  */
    public function display($_data=array(0,1,2,3,4,5,6)){
        if(is_array($_data)&&count($_data)!=0){
            $str=null;
            $str="<ul>";
            $ui[0]=$this->prev();
            $ui[1]=$this->first();
            $ui[2]=$this->pageList();
            $ui[3]=$this->end();
            $ui[4]=$this->next();
            $ui[5]=$this->jump();
            $ui[6]=$this->select();
            $data=array(0,1,2,3,4,5,6);
            foreach ($_data as $key=>$value){
                if(in_array($value,$data)){
                    $str.=$ui[$value];
                }else{
                    $this->errorMsg="下标错误";
                }
            }
            $str.="</ul>";
        }else{
            $this->errorMsg="变量必须是数组类型，并且不能为空";
        }
        return $str;
    }
}
?>