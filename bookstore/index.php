<?php
	
	require_once 'define.php';
	require_once 'define_notice.php';

	
	function my_autoload($clasName){
		require_once LIBRARY_PATH . "{$clasName}.php";
	}
	spl_autoload_register("my_autoload");
	Session::init();
	$bootstrap = new Bootstrap();
	$bootstrap->init();