<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('frontend/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
		$this->_view->setTitle(ucfirst($this->_arrParam['controller']));
	}
	
	public function indexAction(){
		$this->_view->render('index/index');
	}
	public function noticeAction(){
		$this->_view->render('index/notice');
	}
	public function loginAction(){
		$userInfo	= Session::get('user');
		
		// if(@$userInfo['login'] == true && @$userInfo['time'] + TIME_LOGIN >= time()){
		// 	URL::redirect('backend', 'dashboard', 'index');
		// }
		
		if(@$this->_arrParam['form']['token'] > 0){
			$validate	= new Validate($this->_arrParam['form']);
			$email	= $this->_arrParam['form']['email'];
			$password	= md5($this->_arrParam['form']['password']);
			$query		= "SELECT `id` FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
			$validate->addRule('email', 'existRecord', ['database' => $this->_model, 'query' => $query]);
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
				URL::redirect(URL::createLink('default', 'index', 'index'));
			}else{
				$this->_view->errors	= $validate->showErrors();
			}
		}
		$this->_view->render('index/login');
	}
	public function logoutAction(){

		Session::delete('user');
		URL::redirect(URL::createLink('default', 'index', 'index'));
	}
	
}