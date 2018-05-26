<?php
	
	//directory_separator is a PHP predefined constant 
	// its (\ for windows and / for Unix )
	
	// defined('DS') ? null : define('DS', DIRECTORY_SEPARATOT);
	// defined('SITE_ROOT') ? null : define('SITE_ROOT', DS.'Users'.DS )

	require_once("database_config/config.php");
	require_once("database_object.php");
	require_once("functions.php");
	require_once("session.php");
	require_once("database.php");
	require_once("user.php");
	require_once("photograph.php");
	require_once("comment.php");
	require_once("pagination.php");

?>