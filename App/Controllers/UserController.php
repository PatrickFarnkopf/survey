<?php

namespace App\Controllers;

use App\Middleware\Authentication;
use App\Models\User;

use Framework\Application\BaseController;
use Framework\Http\Session;

class UserController extends BaseController
{
    public function login()
    {
        return $this->view("Login");
    }

    public function processLogin()
    {
        $user = new User();
        $user->setUsername($this->request->getPost()['username']);
        $user->setPassword($this->request->getPost()['password']);

        Authentication::authenticate($user);
        return $this->redirectAction("~/");
    }

    public function logout()
    {
        Authentication::logout();
        return $this->redirectAction("~/");
    }

    public function register()
    {
        return $this->view("Register");
    }

    public function processRegistration()
    {
        $user = new User();
        $user->setUsername($this->request->getPost()['username']);

        if ($user->get($user->getUsername())->IsEmpty())
        {
            $user->setPassword($this->request->getPost()['password']);
            $user->save();

            Authentication::authenticate($user);
            return $this->redirectAction("~/");
        }

        return $this->redirectAction("~/Register")
    }
}