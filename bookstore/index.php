<?php
	
	require_once 'define.php';

	function my_autoload($clasName){
		require_once LIBRARY_PATH . "{$clasName}.php";
	}
	spl_autoload_register("my_autoload");
	
	$bootstrap = new Bootstrap();
	$bootstrap->init();