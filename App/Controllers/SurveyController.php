<?php

namespace App\Controllers;

use Framework\Application\BaseController;
use App\Models\Survey;

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
        
    }
}