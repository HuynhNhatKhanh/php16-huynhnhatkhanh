<?php
class UserController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/');
		$this->_templateObj->setFileTemplate('register.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['controller']));
	}
	public function registerAction(){
		$task = 'user-register';
		$data = null;
		if(!empty($this->_arrParam['form'])){
			$data = $this->_arrParam['form'];

			$queryUserName	= "SELECT `id` FROM `".TB_USER."` WHERE `username` = '".$this->_arrParam['form']['username']."'";
			$queryEmail		= "SELECT `id` FROM `".TB_USER."` WHERE `email` = '".$this->_arrParam['form']['email']."'";
			$validate = new Validate($data);
			$validate->addRule('username', 'string-notExistRecord', ['database' => $this->_model, 'query' => $queryUserName, 'min' => 3, 'max' => 25])
					->addRule('password', 'password', ['action' => $task])
					->addRule('email', 'email-notExistRecord', ['database' => $this->_model, 'query' => $queryEmail]);
			$validate->run();
			$data = $validate->getResult();
			if($validate->isValid()){
				$this->_model->saveItems($data, ['task' => $task]);
				URL::redirect(URL::createLink($this->_arrParam['module'], 'index', 'notice', ['type' => 'register-success']));
			}else{
				$this->_view->errors = $validate->showErrorsRegister();
			}		
		}
		$this->_view->data = $data;
		$this->_view->render('user/register');
	}
	public function loginAction(){
		$this->_view->render('user/login');
	}
}