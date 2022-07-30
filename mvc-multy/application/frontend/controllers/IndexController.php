<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){

		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function indexAction(){
		$this->_view->items = $this->_model->listItems($this->_arrParam, ['task' => 'rss-items']);
		$this->_view->render('index/index');
	}
	
}