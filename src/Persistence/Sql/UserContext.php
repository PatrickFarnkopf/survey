<?php

namespace Persistence\Sql;

class UserContext
{
	private $connection;

	public function __construct(\Pdo $pdoObject)
	{
		$this->connection = $pdoObject;
	}

	public function get($username, $password)
	{
		$hash = sha1($password);
		$stmt = $this->connection->prepare("SELECT * FROM user WHERE username = :username AND password_hash = :hash");
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':hash', $hash);
		$stmt->execute();

		if ($row = $stmt->fetch(\PDO::FETCH_ASSOC))
		{
			$user = new \Model\User();
			$user->setId($row['id']);
			$user->setUsername($username);
			$user->setPassword($password);
			$user->setEmail($row['email']);
			return $user;
		}

		return false;
	}

	public function add(\Model\User $user)
	{
		$stmt = $this->connection->prepare("INSERT INTO user (username, password_hash, email) VALUES (:username, :password, :email)");
		$stmt->bindParam(':username', $user->getUsername());
		$stmt->bindParam(':password', $user->getPassword());
		$stmt->bindParam(':email', $user->getEmail());
		$stmt->execute();
	}
}

?>
