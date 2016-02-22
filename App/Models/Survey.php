<?php

namespace App\Models;

use Framework\Application\Database\DbModel;
use Framework\Application\Database\DbProperty;

class Survey extends DbModel
{
    private $id;
    private $name;

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

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    protected function loadMapping()
    {
        $this->map(new DbProperty('id', 'id', DbProperty::TYPE_INT, true));
        $this->map(new DbProperty('name', 'name', DbProperty::TYPE_VARCHAR));
    }
}