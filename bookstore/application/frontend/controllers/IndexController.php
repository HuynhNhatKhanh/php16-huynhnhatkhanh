<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
	}

	public function indexAction(){
	}
	
	public function loginAction(){
		$this->_templateObj->setFolderTemplate('frontend/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['action']));
		$this->_view->render($this->_arrParam['controller'].DS.'login');
	}
	
	
}