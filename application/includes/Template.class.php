<?php
/**
 * 重写Smarty
 * getInstance()实现单例
 *  */
class Template extends Smarty{
	static private $instance;
	static public function getInstance(){
		//如果$instance不是保存的自身的实例对象的话
		//就把自身实例对象保存进去
		if(!self::$instance instanceof self){
			self::$instance=new self();
		}
		return self::$instance;
	}
	public function __construct(){
		parent::__construct();
		$this->setConfig();
	}
	private function setConfig(){
		$this->template_dir=ROOT_PATH."application/views";
		$this->compile_dir=ROOT_PATH."application/run";
	}

}
?>