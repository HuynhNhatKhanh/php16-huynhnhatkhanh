<?php
class GroupController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['controller']));
	}
	
	public function indexAction(){
		
		$this->_view->pageTitle = ucfirst($this->_arrParam['controller'])." List : Manager";
		
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$this->_view->render($this->_arrParam['controller'].DS.'index');
	}
	
	public function changeStatusAction(){
		$this->_model->changeStatus($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function changeGroupAcpAction(){
		$this->_model->changeGroupAcp($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function deleteAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}

	public function formAction(){
		
		$this->_view->render($this->_arrParam['controller'].DS.'form');
	}
	
}