<?php

namespace Application;

class SessionManager
{
	private static $instance;

	private function __construct()
	{ }

	public function login(\Model\User $user)
	{
		$_SESSION['user'] = serialize($user);
	}

	public function currentUser()
	{
		return unserialize($_SESSION['user']);
	}

	public function isAuthed()
	{
		return isset($_SESSION['user']);
	}

	public function loginRequired()
	{
		if (!$this->isAuthed())
		{
			\Main::Redirect('index.php?p=Login');
		}
	}

	public function logout()
	{
		unset($_SESSION['user']);
	}

	public static function instance()
	{
		if (SessionManager::$instance == null)
		{
			SessionManager::$instance = new SessionManager();
		}

		return SessionManager::$instance;
	}
}

?>
