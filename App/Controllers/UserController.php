<?php

namespace App\Controllers;

use App\Middleware\Authentication;
use App\Models\User;

use Framework\Application\BaseController;
use Framework\Http\Session;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->viewData['errors'] = [];
    }

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
        $errors = [];

        $user = new User();
        $user->setUsername($this->request->getPost()['username']);
        $user->setPassword($this->request->getPost()['password']);

        if (!$user->get(['username' => $user->getUsername()])->IsEmpty())
        {
            $errors[] = "Benutzername existiert bereits!";
        }

        if ($user->getPassword() !== $this->request->getPost()['password_confirm'])
        {
            $errors[] = "Die eingegebenen Passwörter stimmen nicht überein!";
        }

        if (count($errors) === 0)
        {
            $user->save();
            Authentication::authenticate($user);
            return $this->redirectAction("~/Login");
        }

        $this->viewData['errors'] = $errors;

        return $this->view("Register");
    }
}