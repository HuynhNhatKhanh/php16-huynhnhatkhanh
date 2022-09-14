<?php
	
	// ====================== PATHS ===========================
	define ('DS'				, DIRECTORY_SEPARATOR);
	define ('ROOT_PATH'			, dirname(__FILE__));						// Định nghĩa đường dẫn đến thư mục gốc
	define ('LIBRARY_PATH'		, ROOT_PATH . DS . 'libs' . DS);			// Định nghĩa đường dẫn đến thư mục thư viện
	define ('PUBLIC_PATH'		, ROOT_PATH . DS . 'public' . DS);			// Định nghĩa đường dẫn đến thư mục public							
	define ('APPLICATION_PATH'	, ROOT_PATH . DS . 'application' . DS);		// Định nghĩa đường dẫn đến thư mục public							
	define ('TEMPLATE_PATH'		, PUBLIC_PATH . 'template' . DS);		// Định nghĩa đường dẫn đến thư mục public							
	
	define	('ROOT_URL'			, DS );
	define	('APPLICATION_URL'	, ROOT_URL . 'application' . DS);
	define	('PUBLIC_URL'		, ROOT_URL . 'public' . DS);
	define	('TEMPLATE_URL'		, PUBLIC_URL . 'template' . DS);
	
	define	('DEFAULT_MODULE'		, 'backend');
	define	('DEFAULT_CONTROLLER'	, 'group');
	define	('DEFAULT_ACTION'		, 'index');

	// ====================== DATABASE ===========================
	define ('DB_HOST'			, 'localhost');
	define ('DB_USER'			, 'root');						
	define ('DB_PASS'			, '');						
	define ('DB_NAME'			, 'php_bookstore_khanh');						
	define ('DB_TABLE'			, 'user');						
	// ====================== DATABASE TABLE ===========================
	define ('TB_GROUP'			, 'group');
	define ('TB_USER'			, 'user');
	define ('TB_PRIVELEGE'		, 'privilege');
	define ('TB_CATEGORY'		, 'category');
	define ('TB_BOOK'			, 'book');
	define ('TB_CART'			, 'cart');
	
	// ====================== CONFIG ===========================
	define ('TIME_LOGIN'		, 3600);