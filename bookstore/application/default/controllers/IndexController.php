<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['controller']));
	}
	
	public function indexAction(){
		$this->_view->render('index/index');
	}
	public function noticeAction(){
		$this->_view->render('index/notice');
	}
	
}