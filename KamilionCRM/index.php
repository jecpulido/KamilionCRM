<?php
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://localhost:8082/KamilionCRM/trunk/KamilionCRM/");
	define('TEMPLATE', "C:/xampp/htdocs/KamilionCRM/trunk/KamilionCRM/Views/template/");
	require_once "Config/Autoload.php";
	Config\Autoload::run();
	require_once "Views/template.php";
	Config\Enrutador::run(new Config\Request());
?>
