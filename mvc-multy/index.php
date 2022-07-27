<?php
	
	require_once 'define.php';

	// function __autoload($clasName){
	// 	require_once LIBRARY_PATH . "{$clasName}.php";
	// }
	function my_autoloader($clasName) {
		require_once LIBRARY_PATH . "{$clasName}.php";
	}
	spl_autoload_register('my_autoloader');
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();