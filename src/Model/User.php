<?php

namespace Model;

class User
{
	private $id;
	private $username;
	private $passwordHash;
	private $email;
	private $surveysDone = array();

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function setPassword($password)
	{
		$this->passwordHash = sha1($password);
	}

	public function getPassword()
	{
		return $this->passwordHash;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setSurveyStatus($surveyId, $isDone = true)
	{
		$this->surveysDone[$surveyId] = $isDone; 
	}

	public function isSurveyDone($surveyId)
	{
		return isset($this->surveysDone[$surveyId]) && $this->surveysDone[$surveyId] === true;
	}
}

?>
