<?php

namespace App\Controllers;

use Framework\Application\BaseController;

class PortalController extends BaseController
{
    public function index()
    {
        return $this->view("Portal");
    }
}
