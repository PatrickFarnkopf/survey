<?php

namespace Model;

class SurveyItem
{
	private $id;
	private $text;
	private $surveyId;
	private $amount;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setText($text)
	{
		$this->text = $text;
	}

	public function getText()
	{
		return $this->text;
	}

	public function setSurveyId($id)
	{
		$this->surveyId = $id;
	}

	public function getSurveyId()
	{
		return $this->surveyId;
	}

	public function setAmount($amount)
	{
		$this->amount = $amount;
	}

	public function getAmount()
	{
		return $this->amount;
	}

	public function increment()
	{
		++$this->amount;
	}
}

?>
