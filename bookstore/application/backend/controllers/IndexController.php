<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
	}

	public function indexAction(){
		$this->_view->setTitle('Index');
		$this->_view->pageTitle = 'Dashboard';
		$this->_view->render('dashboard/index');
	}
	
	public function loginAction(){
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['action']));
		$this->_view->render($this->_arrParam['controller'].DS.'login');
	}
	
	
}