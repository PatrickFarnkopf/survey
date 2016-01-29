<?php

namespace Application;

class ViewLoader
{
	private $parameter;

	public function __construct($param)
	{
		$this->parameter = $param;
	}

	public function getViewPath()
	{
		return "./src/Views/" . $this->parameter . '.php';
	}
}

?>
