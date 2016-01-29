<?php

namespace Model;

class Survey
{
	private $id;
	private $name;
	private $items;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function addItem(SurveyItem $item)
	{
		$this->items[$item->getId()] = $item;
	}

	public function removeItem(SurveyItem $item)
	{
		foreach ($this->items as $key => $value)
		{
			if ($value->getId() == $item->getId())
			{
				unset($this->items[$key]);
				return;
			}
		}
	}
}

?>
