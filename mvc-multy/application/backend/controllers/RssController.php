<?php
class RssController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function indexAction(){
		$this->_view->items = $this->_model->listItems($this->_arrParam);
		$this->_view->render('rss/index');
	}
	public function changeStatusAction(){
		$this->_model->changeStatus($this->_arrParam);
		
		URL::redirect(URL::createLink($this->_arrParam['module'],$this->_arrParam['controller'], 'index'));
		//header('location: index.php?module=backend&controller=rss&action=index');
	}
	public function deleteAction(){
		$this->_model->deleteItem($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'],$this->_arrParam['controller'], 'index'));
	}
	public function formAction(){
		$data = null;
		$task = 'add';
		if(isset( $this->_arrParam['id'])){
			$data = $this->_model->getItem($this->_arrParam);
			$task ='edit';
		}

		if(!empty( $this->_arrParam['form'])){
			$data = $this->_arrParam['form'];
			echo '<pre>';
			print_r($data);
			echo '</pre>';
			$validate = new Validate($data);
			$validate->addRule('link', 'url')
					->addRule('status', 'status')
					->addRule('ordering', 'int', ['min' => 1, 'max' => 100]);
			$validate->run();
			$data = $validate->getResult();
			if($validate->isValid()){
				$this->_model->saveItems($data, ['task' => $task]);
				header('location: index.php?module=backend&controller=rss&action=index');
			}else{
				$this->_view->errors = $validate->showErrors();
			}		
		}
		$this->_view->data = $data;
		$this->_view->render('rss/form');
	}
	
}