<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		
	}
	
	public function loginAction(){
		$userInfo	= Session::get('user');
		
		if(@$userInfo['login'] == true && @$userInfo['time'] + TIME_LOGIN >= time()){
			URL::redirect('backend', 'dashboard', 'index');
		}
		$this->_templateObj->setFolderTemplate('backend/');
		$this->_templateObj->setFileTemplate('login.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['action']));
		
		if(@$this->_arrParam['form']['token'] > 0){
			$validate	= new Validate($this->_arrParam['form']);
			$username	= $this->_arrParam['form']['username'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$validate->addRule('username', 'existRecord', ['database' => $this->_model, 'query' => $query]);
			$validate->run();
			
			if($validate->isValid()==true){
				$infoUser		= $this->_model->infoItem($this->_arrParam);
				$arraySession	= [
					'login'		=> true,
					'info'		=> $infoUser,
					'time'		=> time(),
					'group_acp'	=> $infoUser['group_acp']
				];
				Session::set('user', $arraySession);
				$userInfo	= Session::get('user');
				// echo '<pre>';
				// print_r($userInfo);
				// echo '</pre>';
				// die('hi');
				URL::redirect(URL::createLink('backend', 'dashboard', 'index'));
			}else{
				$this->_view->errors	= $validate->showErrors();
			}
		}
		$this->_view->render($this->_arrParam['controller'].DS.'login');
	}
	
	public function logoutAction(){

		Session::delete('user');
		URL::redirect(URL::createLink('backend', 'index', 'login'));
	}
	
}