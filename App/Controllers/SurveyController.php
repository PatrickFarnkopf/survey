<?php

namespace App\Controllers;

use Framework\Application\BaseController;
use Framework\Http\Url;

use App\Models\Survey;
use App\Models\SurveyChoice;

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

        return $this->view("Show");
    }

    public function vote($id)
    {
        $datastore = new SurveyChoice();
        $choice = $datastore->get(["id" => $id])->First();
        $choice->incrementCount();
        $choice->save();

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
        
        return $this->view("Result");
    }
}