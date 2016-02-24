<?php

namespace App\Models;

use Framework\Application\Database\DbModel;
use Framework\Application\Database\DbProperty;

class UserSurveyChoice extends DbModel
{
    private $choiceId;
    private $userId;
    private $surveyId;

    public function __construct()
    {
        parent::__construct();
    }

    public function setChoiceId($id)
    {
        $this->choiceId = $id;
    }

    public function getChoiceId()
    {
        return $this->choiceId;
    }

    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function getUserId()
    {
        return $this->userId;
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
        $this->map(new DbProperty('choiceId', 'choiceId', DbProperty::TYPE_INT));
        $this->map(new DbProperty('userId', 'userId', DbProperty::TYPE_INT));
        $this->map(new DbProperty('surveyId', 'surveyId', DbProperty::TYPE_INT));
    }
}