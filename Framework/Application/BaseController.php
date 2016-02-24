<?php

namespace Framework\Application;


use Framework\Http\Request;
use Framework\Http\Url;
use Framework\Kernel;
use Framework\Views\Patemp\Template;

use App\Middleware\Authentication;

abstract class BaseController
{
    protected $request;
    protected $route;
    public $viewData = [];

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function executeAction()
    {
        if ($this->route->isAuthRequired() && !Authentication::isAuthenticated())
        {
            $loginRoute = Route::findRoute(\Config\App\LOGIN_PAGE_ROUTE, Route::METHOD_GET);
            $obj = ControllerHandler::instance()->redirectToRoute($loginRoute, $this->request);
            $action = $loginRoute->getAction();
            $parameters = Route::getRouteParameters($this->route, $this->request);
            return call_user_method_array($action, $obj, $parameters);
        }

        $action = $this->route->getAction();
        $parameters = Route::getRouteParameters($this->route, $this->request);
        return call_user_method_array($action, $this, $parameters);
    }

    public function view($templateName)
    {
        $template = new Template();
        $template->setFile(Kernel::instance()->getApplicationRoot() . "/../App/Views/" . $templateName . ".phtml");
        return new ActionResult($template, $this);
    }

    public function setRoute(Route $route)
    {
        $this->route = $route;
    }

    public function redirectAction($url)
    {
        Url::Redirect($url);
    }
}