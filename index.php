<?php

session_start();

require_once "./src/Application/ClassLoader.php";
require_once "./src/Application/ViewLoader.php";
require_once "./config/MySQL.php";

function __autoload($namespace)
{
	$loader = new \Application\ClassLoader($namespace);
	require_once $loader->getFilePath();
}

Main::start($_POST, $_GET, $_SESSION);

?>
