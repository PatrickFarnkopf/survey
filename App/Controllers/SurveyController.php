<?php

namespace App\Controllers;

use Framework\Application\BaseController;
use Framework\Http\Url;
use Framework\Http\Session;

use App\Models\Survey;
use App\Models\SurveyChoice;
use App\Models\User;
use App\Models\UserSurveyChoice;

class SurveyController extends BaseController
{
    public function index()
    {
        $datastore = new Survey();
        $surveys = $datastore->get();
        $this->viewData["surveys"] = $surveys->ToArray();
        return $this->view("Overview");
    }

    public function show($id)
    {
        $datastore = new Survey();
        $survey = $datastore->get(['id' => $id])->First();
        $this->viewData['survey'] = $survey;

        $datastore = new SurveyChoice();
        $choices = $datastore->get(['surveyId' => $id])->ToArray();
        $this->viewData['choices'] = $choices;

        $datastore = new UserSurveyChoice();
        $userChoice = $datastore->get(["surveyId" => $survey->getId(), "userId" => Session::instance()->Get("userId")])->First();

        if ($userChoice == null)
        {
            $this->viewData["userChoice"] = 0;
        }
        else
        {
            $this->viewData["userChoice"] = $userChoice->getChoiceId();
            $this->viewData["userChoiceStr"] = (new SurveyChoice())->get(["id" => $userChoice->getChoiceId()])->First()->getName();
        }

        return $this->view("Show");
    }

    public function vote($id)
    {
        $datastore = new SurveyChoice();
        $choice = $datastore->get(["id" => $id])->First();

        $datastore = new UserSurveyChoice();
        $userChoice = $datastore->get(["surveyId" => $choice->getSurveyId(), "userId" => Session::instance()->Get("userId")])->First();

        if ($userChoice == null)
        {
            $choice->incrementCount();
            $choice->save();

            $userId = Session::instance()->Get("userId");

            $userChoice = new UserSurveyChoice();
            $userChoice->setChoiceId($choice->getId());
            $userChoice->setUserId($userId);
            $userChoice->setSurveyId($choice->getSurveyId());

            $userChoice->save();
        }

        return $this->redirectAction("~/Survey/Result/" . $choice->getSurveyId());
    }

    public function result($id)
    {
        $datastore = new Survey();
        $survey = $datastore->get(['id' => $id])->First();
        $this->viewData['survey'] = $survey;

        $datastore = new SurveyChoice();
        $choices = $datastore->get(['surveyId' => $id])->ToArray();
        $this->viewData['choices'] = $choices;

        $voteCount = 0;
        foreach ($choices as $choice)
        {
            $voteCount += $choice->getCount();
        }

        $this->viewData['voteCount'] = $voteCount;
        
        return $this->view("Result");
    }
}