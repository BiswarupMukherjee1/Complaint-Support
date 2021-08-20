<?php
	ob_start(); //output buffering turned on , output is buffered first and then sent to the server.
	session_start();//turn on session
	//Assign constants in php
	//__FILE__ returns current file's directory
	//dirname returns path to the parent directory
	define("PRIVATE_PATH",dirname(__FILE__));
	define("PROJECT_PATH",dirname(PRIVATE_PATH));
	define("PUBLIC_PATH", PROJECT_PATH.'/public');
	define("SHARED_PATH", PRIVATE_PATH.'/shared');
	//these are hard drive paths
	//url parameter
	define("WWW_ROOT",'/cms/public');

	require_once('functions.php'); //single quotes to use static string
	require_once('database.php');
	require_once('query_functions.php');
	require_once('auth_functions.php');
	$db = db_connect();//connection variable
	//$errors='';
?>