<?php

namespace Application;

class ClassLoader
{
	private $namespace;

	public function __construct($namespace)
	{
		$this->namespace = $namespace;
	}

	public function getFilePath()
	{
		return "./src/" . str_replace("\\", "/", $this->namespace) . ".php";
	}
}

?>
