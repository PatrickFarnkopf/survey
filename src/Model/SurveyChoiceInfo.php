<?php

namespace Model;


class SurveyChoiceInfo
{
    private $surveyId;
    private $data = array();

    public function setSurveyId($id)
    {
        $this->surveyId = $id;
    }

    public function getSurveyId()
    {
        return $this->surveyId;
    }

    public function setData($d)
    {
        $this->data = $d;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTotalChoiceCount()
    {
        $counter = 0;
        foreach ($this->data as $value)
        {
            $counter += $value;
        }
        return $counter;
    }
}