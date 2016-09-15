<?php 

	header('Content-Type: text/html; charset=utf-8');

	error_reporting(E_ALL & ~ E_NOTICE);
	setlocale(LC_ALL, 'pt_BR');

	session_start();
	
	define('CONTROLLER', 'app/controllers/');
	define('VIEW', 'app/views/site/');
	define('MODEL', 'app/models/');
	define('HELPERS', 'system/helpers/');
	define('SYSTEM', 'system/');
	define('INCLUDES', 'app/views/layout/');

	require_once('system/config.php');
	require_once('system/system.php');
	require_once('system/controller.php');
	require_once('system/model.php');



	function __autoload($file){

		if(file_exists(MODEL . $file .".php")){
			require_once(MODEL . $file .".php");
		}else{
			die("Model não encontrado");
		}

	}

	$start = new System;
	$start->run();
	
?>