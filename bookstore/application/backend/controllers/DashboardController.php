<?php
class DashboardController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['controller']));
	}

	public function indexAction(){
		$this->_view->setTitle('Index');
		// echo '<pre>';
		// print_r($_SESSION);
		// echo '</pre>';
		$this->_view->pageTitle = 'Dashboard';
		$this->_view->numberRecordGroup    = $this->_model->countRecord('group');
		$this->_view->numberRecordUser     = $this->_model->countRecord('user');
		$this->_view->numberRecordCategory = $this->_model->countRecord('category');
		$this->_view->numberRecordBook     = $this->_model->countRecord('book');
		
		$this->_view->render($this->_arrParam['controller'].DS.'index');
	}
	
	public function loginAction(){
		echo '<h3>' . __METHOD__ . '</h3>';
		$this->_view->setTitle('Login');
		$this->_view->appendCSS(array('user/css/abc.css'));
		$this->_view->appendJS(array('user/js/test.js'));
		$this->_view->render('user/login', true);
	}
	
	public function logoutAction(){
		echo '<h3>' . __METHOD__ . '</h3>';
		$this->_view->setTitle('Logout');
		$this->_view->appendJS(array('user/js/test.js'));
		$this->_view->render('user/logout', true);
	}
}