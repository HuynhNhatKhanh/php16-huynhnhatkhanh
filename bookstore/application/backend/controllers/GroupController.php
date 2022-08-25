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
		//$this->_model->filterGroupAcp($this->_arrParam);
		
		// $totalItems					= $this->_model->countItem($this->_arrParam, null);
		
		// $configPagination = array(['totalItemsPerPage'	=> 5, 'pageRange' => 3]);
		// $this->setPagination($configPagination);
		// $this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->itemsCount = $this->_model->countItem($this->_arrParam);
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
	public function activeAction()
	{
		$this->_model->statusAction($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function inactiveAction()
	{
		$this->_model->statusAction($this->_arrParam);
		URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
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
			
			// $this->_model->saveItems($data, ['task' => $task]);
			// 	header('location: index.php?module=backend&controller=group&action=index');

			$validate = new Validate($data);
			$validate->addRule('name', 'string', ['min' => 1, 'max' => 100])
					->addRule('status', 'status')
					->addRule('group_acp', 'groupAcp');
			$validate->run();
			$data = $validate->getResult();
			if($validate->isValid()){
				$this->_model->saveItems($data, ['task' => $task]);
				header('location: index.php?module=backend&controller=group&action=index');
			}else{
				$this->_view->errors = $validate->showErrors();
			}		
		}
		$this->_view->data = $data;
		$this->_view->render($this->_arrParam['controller'].DS.'form');
	}
	
}