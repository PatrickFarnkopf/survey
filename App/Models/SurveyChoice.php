<?php

namespace App\Models;

use Framework\Application\Database\DbModel;
use Framework\Application\Database\DbProperty;

class SurveyChoice extends DbModel
{
    private $id;
    private $name;
    private $count;
    private $surveyId;

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

    public function incrementCount()
    {
        $this->count++;
    }

    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getSurveyId()
    {
        return $this->surveyId;
    }

    public function setSurveyId($id)
    {
        $this->surveyId = $id;
    }

    protected function loadMapping()
    {
        $this->map(new DbProperty('id', 'id', DbProperty::TYPE_INT, true));
        $this->map(new DbProperty('name', 'name', DbProperty::TYPE_VARCHAR));
        $this->map(new DbProperty('count', 'voteCount', DbProperty::TYPE_INT));
        $this->map(new DbProperty('surveyId', 'surveyId', DbProperty::TYPE_INT));
    }
}