<?php
class Action{
	protected $smarty=null;
	protected $model=null;
	protected function __construct(){
		//实例化smarty，保存在smarty属性中
		$this->smarty=Template::getInstance();
		$this->model=Factory::setModel();
	}
	protected function page($_total){
		$page=new Page($_total,5);
		$this->model->limit=$page->limit;
		$this->smarty->assign("num",$page->listRowsBegin());
		$this->smarty->assign("page",$page->display());
	}
	public function run(){
		$method=isset($_GET['m'])?$_GET['m']:"main";
		method_exists($this, $method)?eval('$this->'.$method."();"):$this->main();
	}
}
?>