<?php 

namespace App\Middleware;

use App\Models\User;
use Framework\Http\Session;

class Authentication
{
    public static function isAuthenticated()
    {
        return \Framework\Http\Session::instance()->ContainsKey("authenticated") && \Framework\Http\Session::instance()->Get("authenticated");
    }

    public static function authenticate(User $user)
    {
        $data = $user->get(["username" => $user->getUsername(), "password" => $user->getPassword()])->First();
        
        if ($data != null)
        {
            \Framework\Http\Session::instance()->Add("authenticated", true);
            \Framework\Http\Session::instance()->Add("userId", $data->getId());
            \Framework\Http\Session::instance()->Add("username", $data->getUsername());
        }
    }

    public static function logout()
    {
        \Framework\Http\Session::instance()->Remove("authenticated");
        \Framework\Http\Session::instance()->Remove("userId");
        \Framework\Http\Session::instance()->Remove("username");
    }
}