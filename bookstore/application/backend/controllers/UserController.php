<?php
class UserController extends Controller{
	
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
		
		$totalItems					= $this->_model->countItem($this->_arrParam, null);
		$configPagination = ['totalItemsPerPage'	=> 4, 'pageRange' => 3];
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems['all'], $this->_pagination);

		$this->_view->itemsCount = $this->_model->countItem($this->_arrParam);
		$this->_view->items = $this->_model->listItems($this->_arrParam,  'select-all');
		$this->_view->itemsGroup = $this->_model->listItems($this->_arrParam, 'get-groupid-name');
		$this->_view->render($this->_arrParam['controller'].DS.'index');
	}
	
	public function changeStatusAction(){
		$result = $this->_model->changeStatus($this->_arrParam);
		echo $result;
		//URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
	}
	public function changeGroupAction(){
		$this->_model->changeGroup($this->_arrParam);
		//URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
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
		$title = ucfirst($this->_arrParam['controller']) . " Form :: Add";
		if(isset( $this->_arrParam['id'])){
			$data = $this->_model->getItem($this->_arrParam);
			$task ='edit';
			$title = ucfirst($this->_arrParam['controller']) . " Form :: Edit";
		}
		
		if(!empty($this->_arrParam['form'])){
			$data = $this->_arrParam['form'];
			$validate = new Validate($data);
			$validate->addRule('username', 'string', ['min' => 1, 'max' => 100])
					->addRule('password', 'password', ['action' => $task])
					->addRule('email', 'email')
					->addRule('status', 'status')
					->addRule('group_id', 'groupAcp');
			$validate->run();
			$data = $validate->getResult();
			if($validate->isValid()){
				$this->_model->saveItems($data, ['task' => $task]);
				URL::redirect(URL::createLink($this->_arrParam['module'], $this->_arrParam['controller'], 'index'));
			}else{
				$this->_view->errors = $validate->showErrors();
			}		
		}
		$this->_view->data = $data;
		$this->_view->pageTitle = $title;
		$this->_view->itemsGroup = $this->_model->listItems($this->_arrParam, 'get-groupid-name');
		$this->_view->render($this->_arrParam['controller'].DS.'form');
	}
	
}