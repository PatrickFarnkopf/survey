<?php

namespace App\Models;

use Framework\Application\Database\DbModel;
use Framework\Application\Database\DbProperty;

class User extends DbModel
{
    private $id;
    private $username;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

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
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    protected function loadMapping()
    {
        $this->map(new DbProperty('id', 'id', DbProperty::TYPE_INT, true));
        $this->map(new DbProperty('username', 'username', DbProperty::TYPE_VARCHAR));
        $this->map(new DbProperty('password', 'password', DbProperty::TYPE_VARCHAR));
    }
}