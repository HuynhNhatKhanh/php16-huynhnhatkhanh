<?php
class GroupController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction(){
		$this->_view->setTitle('Group');
		$this->_view->pageTitle = "Group List : Manager";
		
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$this->_view->render('group/index');
	}
	
	public function changeStatusAction(){
		$this->_model->changeStatus($this->_arrParam);
		URL::redirect(URL::createLink('backend', 'group', 'index'));
	}
	public function changeGroupAcpAction(){
		$this->_model->changeGroupAcp($this->_arrParam);
		URL::redirect(URL::createLink('backend', 'group', 'index'));
	}
	public function deleteAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect(URL::createLink('backend', 'group', 'index'));
	}

	public function formAction(){
		
		$this->_view->render('group/form');
	}
	
}